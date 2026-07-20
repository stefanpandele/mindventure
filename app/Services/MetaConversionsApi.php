<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Sends conversion events to Meta server-side, so leads still register when the
 * browser pixel is blocked by ITP, ad blockers or tracking protection.
 *
 * Events carry the same `event_id` as their browser counterpart; Meta uses that
 * to collapse the two into one conversion instead of counting it twice.
 */
class MetaConversionsApi
{
    /**
     * Deliver one event to the Meta dataset.
     *
     * Never throws: a lead the visitor already submitted successfully must not
     * surface as an error because an analytics call went wrong. Failures are
     * logged instead, since a silent no-op here is hard to notice later.
     *
     * @param  array{email?: string, phone?: string, name?: string}  $userData  Raw values; hashed before sending.
     * @param  array{event_source_url?: string, client_ip_address?: string, client_user_agent?: string, fbp?: string, fbc?: string}  $context
     * @param  array<string, mixed>  $customData
     */
    public function send(string $eventName, string $eventId, array $userData, array $context, array $customData = []): void
    {
        if (! config('services.meta.enabled')) {
            return;
        }

        $pixelId = config('services.meta.pixel_id');
        $token = config('services.meta.capi_token');

        if (blank($pixelId) || blank($token)) {
            Log::warning('Meta CAPI is enabled but not configured; skipping event.', [
                'event_name' => $eventName,
            ]);

            return;
        }

        $payload = [
            'data' => [[
                'event_name' => $eventName,
                'event_time' => time(),
                'event_id' => $eventId,
                'event_source_url' => $context['event_source_url'] ?? null,
                'action_source' => 'website',
                'user_data' => $this->buildUserData($userData, $context),
                'custom_data' => $customData,
            ]],
            // Sent in the body rather than the query string so the token stays
            // out of access logs and proxy caches.
            'access_token' => $token,
        ];

        if (filled($testEventCode = config('services.meta.test_event_code'))) {
            $payload['test_event_code'] = $testEventCode;
        }

        try {
            $response = Http::timeout(5)->post($this->endpoint($pixelId), $payload);

            if ($response->failed()) {
                Log::warning('Meta CAPI rejected an event.', [
                    'event_name' => $eventName,
                    'status' => $response->status(),
                    'body' => $response->json(),
                ]);
            }
        } catch (Throwable $e) {
            Log::warning('Meta CAPI request failed.', [
                'event_name' => $eventName,
                'exception' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Hash the personal identifiers and attach the browser-side signals Meta
     * uses to match an event to an account.
     *
     * @param  array{email?: string, phone?: string, name?: string}  $userData
     * @param  array{client_ip_address?: string, client_user_agent?: string, fbp?: string, fbc?: string}  $context
     * @return array<string, mixed>
     */
    private function buildUserData(array $userData, array $context): array
    {
        [$firstName, $lastName] = $this->splitName($userData['name'] ?? '');

        return array_filter([
            'em' => $this->hash(mb_strtolower(trim($userData['email'] ?? ''))),
            'ph' => $this->hash($this->normalizePhone($userData['phone'] ?? '')),
            'fn' => $this->hash($firstName),
            'ln' => $this->hash($lastName),
            // The _fbp / _fbc cookies tie this server event back to the same
            // browser the pixel saw, which lifts match quality substantially.
            'fbp' => $context['fbp'] ?? null,
            'fbc' => $context['fbc'] ?? null,
            'client_ip_address' => $context['client_ip_address'] ?? null,
            'client_user_agent' => $context['client_user_agent'] ?? null,
        ]);
    }

    /**
     * Meta expects each identifier as an array of SHA-256 hashes, normalized
     * beforehand so the same person hashes identically on every channel.
     *
     * @return array<int, string>|null
     */
    private function hash(string $value): ?array
    {
        if ($value === '') {
            return null;
        }

        return [hash('sha256', $value)];
    }

    /**
     * Reduce a phone number to international digits without the leading plus.
     */
    private function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone) ?? '';

        // Romanian numbers are usually typed in trunk form (07xx xxx xxx);
        // Meta only matches them when the country code is present instead.
        if (strlen($digits) === 10 && str_starts_with($digits, '0')) {
            return '40'.substr($digits, 1);
        }

        return $digits;
    }

    /**
     * Split the single name field the forms collect into the first/last pair
     * Meta matches on.
     *
     * @return array{0: string, 1: string}
     */
    private function splitName(string $name): array
    {
        $parts = preg_split('/\s+/', mb_strtolower(trim($name)), 2) ?: [];

        return [$parts[0] ?? '', $parts[1] ?? ''];
    }

    private function endpoint(string $pixelId): string
    {
        return sprintf(
            'https://graph.facebook.com/%s/%s/events',
            config('services.meta.api_version'),
            $pixelId,
        );
    }
}
