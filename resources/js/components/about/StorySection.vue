<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section class="py-16 md:py-[90px]">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 sm:px-6 md:grid-cols-[1fr_0.85fr] md:gap-[60px]"
        >
            <!-- Text -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    {{ t('pages.about.story_section.header') }}
                </span>
                <h2
                    class="mt-4 mb-[22px] text-[clamp(28px,3.4vw,40px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.about.story_section.title') }}
                </h2>
                <p
                    class="mb-[18px] max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    {{ t('pages.about.story_section.description_1') }}
                </p>
                <p
                    class="mb-[18px] max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    {{ t('pages.about.story_section.description_2') }}
                    <strong class="font-semibold text-brand-indigo-dark-2">
                        {{ t('pages.about.story_section.description_3') }}
                    </strong>
                </p>
                <p
                    class="max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    {{ t('pages.about.story_section.description_4') }}
                </p>
            </div>

            <!-- Photo -->
            <div class="relative">
                <figure
                    class="rotate-[1.5deg] overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/[0.06] shadow-[0_30px_60px_-34px_rgba(17,14,43,0.5)]"
                >
                    <img
                        src="/images/20251126_162502.webp"
                        alt="Denisa Diaconescu la lucru"
                        class="block w-full object-cover"
                    />
                </figure>
            </div>
        </div>
    </section>
</template>
