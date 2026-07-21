import { createInertiaApp, router } from '@inertiajs/vue3';

import { trackEvent } from '@/lib/gtm';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Recover from stale code-split chunks after a deploy: if a lazy page chunk
// fails to load because it was renamed by a new build, reload to fetch the
// fresh HTML with the up-to-date asset references.
window.addEventListener('vite:preloadError', () => {
    window.location.reload();
});

// Report client-side page changes to analytics tags that only ever see the
// first URL otherwise. GTM's built-in history events are unusable here: Inertia
// calls `replaceState` at the *start* of a visit to save scroll position, so
// they fire while `location` still points at the previous page. `navigate` runs
// after the visit settles, once the URL is the new one.
//
// Seeded with the current URL so the initial page load is skipped — the tag on
// the page-load event already reported it.
let lastTrackedUrl = window.location.href;

router.on('navigate', () => {
    if (window.location.href === lastTrackedUrl) {
        return;
    }

    lastTrackedUrl = window.location.href;
    trackEvent('spa_pageview');
});

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    progress: {
        color: '#4B5563',
    },
});
