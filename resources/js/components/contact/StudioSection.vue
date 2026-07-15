<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-14 text-paper md:py-20">
        <div
            class="mx-auto grid max-w-6xl items-center gap-8 px-5 sm:px-6 md:grid-cols-2 md:gap-[50px]"
        >
            <!-- Photo -->
            <figure
                class="overflow-hidden rounded-[18px] border border-paper/15 shadow-[0_30px_60px_-34px_rgba(0,0,0,0.6)]"
            >
                <img
                    src="/images/contact-studio.webp"
                    alt="Interiorul studioului Mindventure"
                    class="block w-full"
                />
            </figure>

            <!-- Copy -->
            <div>
                <span
                    class="mb-4 inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-paper uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-lime"
                    />
                    {{ t('pages.contact.studio_section.badge_text') }}
                </span>

                <h2
                    class="mb-[18px] text-[clamp(28px,3.4vw,40px)] leading-[1.05] font-bold tracking-[-0.025em]"
                >
                    {{ t('pages.contact.studio_section.title') }}
                </h2>

                <p
                    class="mb-[18px] max-w-[34em] text-[16.5px] leading-[1.7] text-paper/[0.62]"
                >
                    {{ t('pages.contact.studio_section.description') }}
                </p>

                <div
                    class="font-mono text-[12px] font-bold tracking-[0.1em] text-brand-lime uppercase"
                >
                    {{ t('pages.contact.studio_section.section_footer') }}
                </div>
            </div>
        </div>
    </section>
</template>
