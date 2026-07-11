<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Fact {
    value: string;
    label: string;
}

const facts: Fact[] = [
    {
        value: t('pages.ib_ia.fact_strip_section.stat_1.value'),
        label: t('pages.ib_ia.fact_strip_section.stat_1.label'),
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_2.value'),
        label: t('pages.ib_ia.fact_strip_section.stat_2.label'),
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_3.value'),
        label: t('pages.ib_ia.fact_strip_section.stat_3.label'),
    },
    {
        value: t('pages.ib_ia.fact_strip_section.stat_4.value'),
        label: t('pages.ib_ia.fact_strip_section.stat_4.label'),
    },
];
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-10 text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-7 px-5 sm:px-6 md:grid-cols-5 md:gap-5"
        >
            <div v-for="fact in facts" :key="fact.label" class="relative pl-4">
                <span
                    class="absolute top-[5px] bottom-[5px] left-0 w-[3px] rounded-[2px] bg-accent-teal"
                />
                <div
                    class="font-mono text-[clamp(18px,2.4vw,22px)] leading-none font-bold"
                >
                    {{ fact.value }}
                </div>
                <div class="mt-[7px] text-[12.5px] text-paper/60">
                    {{ fact.label }}
                </div>
            </div>
        </div>
    </section>
</template>
