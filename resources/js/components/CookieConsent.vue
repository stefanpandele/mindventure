<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import { useTranslations } from '@/composables/useTranslations';
import { consentIsPending, denyConsent, grantConsent } from '@/lib/consent';
import { privacyPolicy } from '@/routes';

const { t } = useTranslations();
</script>

<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="translate-y-full opacity-0"
            leave-active-class="transition duration-200 ease-in"
            leave-to-class="translate-y-full opacity-0"
        >
            <div
                v-if="consentIsPending"
                role="dialog"
                aria-modal="false"
                :aria-label="t('cookies.aria_label')"
                class="fixed inset-x-0 bottom-0 z-50 border-t border-white/10 bg-brand-indigo-dark-2/95 backdrop-blur-sm"
            >
                <div
                    class="mx-auto flex max-w-6xl flex-col gap-4 px-5 py-5 sm:px-6 md:flex-row md:items-center md:justify-between"
                >
                    <p class="text-[14px] leading-relaxed text-white/70">
                        {{ t('cookies.message') }}
                        <Link
                            :href="privacyPolicy.url()"
                            class="font-medium text-brand-lime underline underline-offset-2 transition-colors hover:text-white"
                        >
                            {{ t('cookies.policy_link') }}
                        </Link>
                    </p>

                    <div class="flex shrink-0 gap-2.5">
                        <button
                            type="button"
                            class="rounded-full px-5 py-2.5 text-[14px] font-medium text-white/70 ring-1 ring-white/20 transition-colors hover:bg-white/10 hover:text-white"
                            @click="denyConsent"
                        >
                            {{ t('cookies.deny') }}
                        </button>
                        <button
                            type="button"
                            class="rounded-full bg-brand-lime px-5 py-2.5 text-[14px] font-semibold text-brand-indigo-dark-2 transition-transform hover:scale-[1.03]"
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
