<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Fact {
    value: string;
    // label: string;
    word: true;
    barColor: string;
}

const facts: Fact[] = [
    {
        value: t('pages.ib_ia.fact_strip_section.stat_1.value'),
        // label: t('pages.ib_ia.fact_strip_section.stat_1.label'),
        word: true,
        barColor: 'bg-brand-magenta',
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_2.value'),
        // label: t('pages.ib_ia.fact_strip_section.stat_2.label'),
        word: true,
        barColor: 'bg-brand-lime',
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_3.value'),
        // label: t('pages.ib_ia.fact_strip_section.stat_3.label'),
        word: true,
        barColor: 'bg-accent-teal',
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_4.value'),
        // label: t('pages.ib_ia.fact_strip_section.stat_4.label'),
        word: true,
        barColor: 'bg-brand',
    },
];
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-10 text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-7 px-5 sm:px-6 md:grid-cols-5 md:gap-5"
        >
            <div
                v-for="(fact, i) in facts"
                :key="i"
                class="relative pl-[18px]"
            >
                <span
                    class="absolute top-1.5 bottom-1.5 left-0 w-[3px] rounded-[2px]"
                    :class="fact.barColor"
                />
                <div
                    class="font-bold"
                    :class="
                        fact.word
                            ? 'text-[clamp(20px,2.3vw,27px)] leading-[1.08] tracking-[-0.01em]'
                            : 'font-mono text-[clamp(32px,3.6vw,44px)] leading-none tracking-[-0.02em]'
                    "
                >
                    {{ fact.value }}
                </div>
            </div>
        </div>
    </section>
</template>
