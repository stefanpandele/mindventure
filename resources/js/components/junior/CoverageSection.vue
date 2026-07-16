<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Stage {
    title: string;
    range: string;
    topBar: string;
    checkBg: string;
}

const stages: Stage[] = [
    {
        title: t('pages.junior.coverage_section.stage_item_1.title'),
        range: t('pages.junior.coverage_section.stage_item_1.range'),
        topBar: 'bg-brand-magenta',
        checkBg: 'bg-brand-lime/25',
    },
    {
        title: t('pages.junior.coverage_section.stage_item_2.title'),
        range: t('pages.junior.coverage_section.stage_item_2.range'),
        topBar: 'bg-brand-indigo',
        checkBg: 'bg-accent-teal/20',
    },
    {
        title: t('pages.junior.coverage_section.stage_item_3.title'),
        range: t('pages.junior.coverage_section.stage_item_3.range'),
        topBar: 'bg-accent-teal',
        checkBg: 'bg-brand-lime/25',
    },
    {
        title: t('pages.junior.coverage_section.stage_item_4.title'),
        range: t('pages.junior.coverage_section.stage_item_4.range'),
        topBar: 'bg-accent-lime',
        checkBg: 'bg-accent-teal/20',
    },
];
</script>

<template>
    <section id="ce-acoperim" class="bg-[#edeae0] py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    {{ t('pages.junior.coverage_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.junior.coverage_section.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    {{ t('pages.junior.coverage_section.description') }}
                </p>
            </div>

            <!-- Stages -->
            <div class="mt-11 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="stage in stages"
                    :key="stage.title"
                    class="relative overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-8"
                >
                    <span
                        class="absolute top-0 right-0 left-0 h-[5px]"
                        :class="stage.topBar"
                    />
                    <h3
                        class="mt-2.5 mb-4 text-card-title font-extrabold text-brand-indigo-dark-2"
                    >
                        {{ stage.title }}
                    </h3>
                    <div
                        class="text-[14.5px] text-brand-muted"
                    >
                        {{ stage.range }}
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>
