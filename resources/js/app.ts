import { createInertiaApp } from '@inertiajs/vue3';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Recover from stale code-split chunks after a deploy: if a lazy page chunk
// fails to load because it was renamed by a new build, reload to fetch the
// fresh HTML with the up-to-date asset references.
window.addEventListener('vite:preloadError', () => {
    window.location.reload();
});

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    progress: {
        color: '#4B5563',
    },
});
