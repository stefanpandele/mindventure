<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section class="border-b border-brand-indigo-dark-2/10">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 pt-16 pb-14 sm:px-6 md:grid-cols-[1.05fr_0.95fr] md:pt-[66px] md:pb-14"
        >
            <!-- Copy -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-brand-indigo"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-indigo"
                    />
                    {{ t('pages.contact.hero.badge_text') }}
                </span>

                <h1
                    class="mt-[22px] text-[clamp(40px,5.2vw,62px)] leading-[1.03] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.contact.hero.title') }}
                </h1>

                <p
                    class="mt-[22px] max-w-[31em] text-[18px] leading-relaxed text-brand-muted"
                >
                    {{ t('pages.contact.hero.description') }}
                </p>
            </div>

            <!-- Photo -->
            <div class="relative mx-auto w-full max-w-[460px] md:ml-auto">
                <span
                    class="absolute -bottom-[18px] -left-[18px] -z-10 h-1/2 w-1/2 rounded-[18px] bg-brand-lime"
                />
                <figure
                    class="relative overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/[0.06] shadow-[0_30px_60px_-34px_rgba(17,14,43,0.5)]"
                >
                    <img
                        src="/images/contact-hero.webp"
                        alt="Studioul Mindventure din Voluntari"
                        class="block w-full"
                    />
                </figure>
            </div>
        </div>
    </section>
</template>
