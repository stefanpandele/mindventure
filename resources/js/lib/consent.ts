import { computed, ref } from 'vue';

export type ConsentChoice = 'granted' | 'denied';

/**
 * Plain (unencrypted) cookie so both this script and the server can read it.
 * It is listed in `encryptCookies(except: ...)` in `bootstrap/app.php` for the
 * same reason the Meta pixel cookies are.
 */
const COOKIE_NAME = 'mv_consent';

/** Six months, the usual re-ask interval for analytics consent. */
const COOKIE_MAX_AGE = 60 * 60 * 24 * 180;

/**
 * Cookies written by the tags we gate. Removed when consent is withdrawn so a
 * refusal doesn't leave the previous session's identifiers behind.
 */
const TRACKING_COOKIE_PREFIXES = ['_ga', '_gid', '_gcl', '_fbp', '_fbc'];

function readChoice(): ConsentChoice | null {
    const match = document.cookie.match(
        new RegExp(`(?:^|;\\s*)${COOKIE_NAME}=(granted|denied)(?:;|$)`),
    );

    return (match?.[1] as ConsentChoice) ?? null;
}

function writeCookie(name: string, value: string, maxAge: number): void {
    const secure = window.location.protocol === 'https:' ? '; Secure' : '';

    document.cookie = `${name}=${value}; path=/; max-age=${maxAge}; SameSite=Lax${secure}`;
}

/**
 * Best-effort removal of the tags' own cookies. Anything set on a different
 * domain or path than the one we write here survives; browsers give no way to
 * enumerate those.
 *
 * @return How many cookies were found, which doubles as "the tags had already
 *         run in this browser".
 */
function clearTrackingCookies(): number {
    const names = document.cookie
        .split(';')
        .map((pair) => pair.split('=')[0]?.trim())
        .filter((name): name is string =>
            Boolean(
                name &&
                TRACKING_COOKIE_PREFIXES.some((prefix) =>
                    name.startsWith(prefix),
                ),
            ),
        );

    const domain = window.location.hostname.replace(/^www\./, '');

    for (const name of names) {
        writeCookie(name, '', 0);
        document.cookie = `${name}=; path=/; domain=.${domain}; max-age=0`;
    }

    return names.length;
}

/**
 * Server-side rendering evaluates this module in Node, where there is no
 * document to read. Nobody has answered the banner there by definition, so it
 * starts undecided and the browser reads the real answer once it takes over.
 */
const choice = ref<ConsentChoice | null>(
    import.meta.env.SSR ? null : readChoice(),
);

/** The visitor's stored answer, or `null` while they haven't answered yet. */
export const consentChoice = computed(() => choice.value);

/** Whether the banner still needs an answer. */
export const consentIsPending = computed(() => choice.value === null);

export function grantConsent(): void {
    writeCookie(COOKIE_NAME, 'granted', COOKIE_MAX_AGE);
    choice.value = 'granted';
}

/**
 * Tags already injected into the page cannot be unloaded, so withdrawing a
 * previously granted consent drops their cookies and reloads into a clean
 * document instead of merely flipping the flag.
 */
export function denyConsent(): void {
    writeCookie(COOKIE_NAME, 'denied', COOKIE_MAX_AGE);
    choice.value = 'denied';

    if (clearTrackingCookies() > 0) {
        window.location.reload();
    }
}

/** Bring the banner back so the visitor can change their answer. */
export function reopenConsentBanner(): void {
    writeCookie(COOKIE_NAME, '', 0);
    choice.value = null;
}
