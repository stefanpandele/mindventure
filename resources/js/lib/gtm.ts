import { watch } from 'vue';

import { consentChoice } from '@/lib/consent';

declare global {
    interface Window {
        dataLayer?: Record<string, unknown>[];
    }
}

/**
 * Events raised before the visitor answered the cookie banner. They are held
 * rather than dropped so a lead submitted while the banner is still up is not
 * lost the moment the visitor then accepts. Bounded because a visitor who never
 * answers keeps browsing.
 */
const pendingEvents: Record<string, unknown>[] = [];
const MAX_PENDING_EVENTS = 20;

let gtmLoaded = false;

/**
 * The container id is rendered as a meta tag by `app.blade.php` instead of an
 * inline loader, so nothing reaches Google or Meta until `loadGtm()` runs.
 */
function gtmContainerId(): string | null {
    const meta = document.querySelector<HTMLMetaElement>('meta[name="gtm-id"]');

    return meta?.content || null;
}

function loadGtm(): void {
    if (gtmLoaded) {
        return;
    }

    const containerId = gtmContainerId();

    if (!containerId) {
        return;
    }

    gtmLoaded = true;

    push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });

    const script = document.createElement('script');
    script.async = true;
    script.src = `https://www.googletagmanager.com/gtm.js?id=${encodeURIComponent(containerId)}`;
    document.head.appendChild(script);
}

function push(payload: Record<string, unknown>): void {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(payload);
}

/**
 * Push a custom event into GTM's dataLayer.
 *
 * Nothing is pushed until the visitor accepts cookies: GTM itself is only
 * loaded on acceptance, and a refusal drops events on the floor. In GTM, create
 * a Custom Event trigger whose event name matches `event`, then wire it to a
 * GA4 Event tag. Any `params` become GA4 event parameters via Data Layer
 * Variables.
 *
 * @param event  GA4-style snake_case event name, e.g. `cta_click`, `form_submit`.
 * @param params Extra data for the event, e.g. `{ form: 'club_application' }`.
 */
export function trackEvent(
    event: string,
    params: Record<string, unknown> = {},
): void {
    const payload = { event, ...params };

    if (consentChoice.value === 'granted') {
        push(payload);

        return;
    }

    if (
        consentChoice.value === null &&
        pendingEvents.length < MAX_PENDING_EVENTS
    ) {
        pendingEvents.push(payload);
    }
}

/**
 * Wire analytics to the visitor's consent. Runs immediately so a returning
 * visitor who already accepted gets GTM on this page load too.
 */
export function initAnalytics(): void {
    watch(
        consentChoice,
        (choice) => {
            if (choice !== 'granted') {
                return;
            }

            loadGtm();
            pendingEvents.splice(0).forEach(push);
        },
        { immediate: true },
    );
}
