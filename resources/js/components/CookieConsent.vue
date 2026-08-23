<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { nextTick, onBeforeUnmount, onMounted, ref, watch } from 'vue';

import { useTranslations } from '@/composables/useTranslations';
import { consentIsPending, denyConsent, grantConsent } from '@/lib/consent';
import { privacyPolicy } from '@/routes';

const { t } = useTranslations();

const dialog = ref<HTMLElement | null>(null);

/**
 * Nothing here renders on the server. The banner's state lives in a cookie the
 * server cannot read from Node, so SSR would always guess "undecided" and then
 * disagree with a returning visitor's browser on hydration. Waiting for the
 * mount is also what the modals in this application do.
 */
const isMounted = ref(false);

/**
 * Keep Tab inside the banner while it is up.
 *
 * Deliberately no Escape handler. The banner offers no outcome besides the two
 * choices, so dismissing it would drop the visitor back into the undecided
 * state the scrim exists to end — and an undecided visitor is the one case that
 * reports nothing at all, in the browser or through the Conversions API. Both
 * buttons stay one keystroke away, so this contains focus without trapping it.
 */
function onKeydown(event: KeyboardEvent): void {
    if (event.key !== 'Tab' || !consentIsPending.value || !dialog.value) {
        return;
    }

    const focusable =
        dialog.value.querySelectorAll<HTMLElement>('a[href], button');

    if (focusable.length === 0) {
        return;
    }

    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    const active = document.activeElement;

    if (event.shiftKey && (active === first || active === dialog.value)) {
        event.preventDefault();
        last.focus();

        return;
    }

    if (!event.shiftKey && active === last) {
        event.preventDefault();
        first.focus();
    }
}

/**
 * Hold the page still while the banner is up, and put focus on the panel — not
 * on Accept, since starting on the primary button would nudge the choice and
 * consent has to stay freely given.
 */
function syncPageToBanner(pending: boolean): void {
    document.body.style.overflow = pending ? 'hidden' : '';

    if (pending) {
        nextTick(() => dialog.value?.focus());
    }
}

onMounted(() => {
    isMounted.value = true;
    window.addEventListener('keydown', onKeydown);

    // Applied here rather than through an immediate watcher: an immediate
    // watcher fires during setup, which on the server means writing to a
    // `document` that does not exist.
    syncPageToBanner(consentIsPending.value);
});

onBeforeUnmount(() => {
    window.removeEventListener('keydown', onKeydown);
    document.body.style.overflow = '';
});

watch(consentIsPending, syncPageToBanner);
</script>

<template>
    <Teleport v-if="isMounted" to="body">
        <!--
            Dims the page rather than merely sitting on top of it, so ignoring
            the banner stops being the path of least resistance. It covers the
            header (`z-30`) too, which is what keeps the booking modal from
            being opened underneath and fighting over `body.overflow`.
        -->
        <Transition
            enter-active-class="transition-opacity duration-300 ease-out"
            enter-from-class="opacity-0"
            leave-active-class="transition-opacity duration-200 ease-in"
            leave-to-class="opacity-0"
        >
            <div
                v-if="consentIsPending"
                class="fixed inset-0 z-40 bg-brand-indigo-dark-2/70 backdrop-blur-xs"
            />
        </Transition>

        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="translate-y-full opacity-0"
            leave-active-class="transition duration-200 ease-in"
            leave-to-class="translate-y-full opacity-0"
        >
            <div
                v-if="consentIsPending"
                ref="dialog"
                role="dialog"
                aria-modal="true"
                aria-labelledby="cookie-consent-title"
                aria-describedby="cookie-consent-message"
                tabindex="-1"
                class="fixed inset-x-0 bottom-0 z-50 border-t border-white/10 bg-brand/95 backdrop-blur-sm outline-none"
            >
                <!--
                    A third of the viewport on phones, a quarter from `md` up.
                    The type scales with it: at desktop sizes the row would
                    otherwise float as a thin line in a mostly empty panel.
                -->
                <div
                    class="flex min-h-[33dvh] flex-col justify-center gap-5 px-4 py-6 sm:px-6 md:min-h-[25dvh] md:flex-row md:items-center md:justify-between md:gap-8 md:py-12 lg:px-8"
                >
                    <!-- Capped so the message keeps a readable measure once the bar spans the full width. -->
                    <div class="flex flex-col gap-1.5 md:max-w-xl md:gap-3">
                        <h2
                            id="cookie-consent-title"
                            class="text-[16px] font-semibold text-white md:text-[24px]"
                        >
                            {{ t('cookies.preferences') }}
                        </h2>

                        <!--
                            85% rather than 70%: against the lighter indigo the
                            dimmer white measures 3.6:1, under the 4.5:1 AA
                            floor for text this size. 85% is the first step that
                            clears it, at 4.63:1.
                        -->
                        <p
                            id="cookie-consent-message"
                            class="text-[14px] leading-relaxed text-white/85 md:text-[16px]"
                        >
                            {{ t('cookies.message') }}
                            <Link
                                :href="privacyPolicy.url()"
                                class="font-medium text-chip-lime underline underline-offset-2 transition-colors hover:text-white"
                            >
                                {{ t('cookies.policy_link') }}
                            </Link>
                        </p>
                    </div>

                    <!--
                        Reversed on phones so Accept sits on top, the way the
                        primary action does in a stacked sheet. The row keeps
                        its original left-to-right order from `md` up.
                    -->
                    <div
                        class="flex flex-col-reverse gap-2.5 md:shrink-0 md:flex-row"
                    >
                        <button
                            type="button"
                            class="w-full rounded-full px-5 py-3 text-[14px] font-medium text-white/85 ring-1 ring-white/60 transition-colors hover:bg-white/10 hover:text-white md:w-auto md:px-7 md:text-[15px]"
                            @click="denyConsent"
                        >
                            {{ t('cookies.deny') }}
                        </button>
                        <button
                            type="button"
                            class="w-full rounded-full bg-brand-lime px-5 py-3 text-[14px] font-semibold text-brand-indigo-dark-2 transition-transform hover:scale-[1.03] md:w-auto md:px-7 md:text-[15px]"
                            @click="grantConsent"
                        >
                            {{ t('cookies.accept') }}
                        </button>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
