<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

interface Stat {
    value: string;
    // label: string;
    word?: boolean;
    barColor: string;
}

const { t } = useTranslations();

const stats: Stat[] = [
    {
        value: t('pages.ib_math.results_bar.stat_1.value'),
        // label: t('pages.ib_math.results_bar.stat_1.label'),
        word: true,
        barColor: 'bg-brand-magenta',
    },
    {
        value: t('pages.ib_math.results_bar.stat_2.value'),
        // label: t('pages.ib_math.results_bar.stat_2.label'),
        word: true,
        barColor: 'bg-brand-lime',
    },
    {
        value: t('pages.ib_math.results_bar.stat_3.value'),
        // label: t('pages.ib_math.results_bar.stat_3.label'),
        word: true,
        barColor: 'bg-accent-teal',
    },
    {
        value: t('pages.ib_math.results_bar.stat_4.value'),
        // label: t('pages.ib_math.results_bar.stat_4.label'),
        word: true,
        barColor: 'bg-brand',
    },
];
</script>

<template>
    <section id="rezultate" class="bg-brand-indigo-dark-2 py-[46px] text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-8 px-5 sm:px-6 md:grid-cols-4 md:gap-6"
        >
            <div
                v-for="(stat, i) in stats"
                :key="i"
                class="relative pl-[18px]"
            >
                <span
                    class="absolute top-1.5 bottom-1.5 left-0 w-[3px] rounded-[2px]"
                    :class="stat.barColor"
                />
                <div
                    class="font-bold"
                    :class="
                        stat.word
                            ? 'text-[clamp(20px,2.3vw,27px)] leading-[1.08] tracking-[-0.01em]'
                            : 'font-mono text-[clamp(32px,3.6vw,44px)] leading-none tracking-[-0.02em]'
                    "
                >
                    {{ stat.value }}
                </div>
<!--                <div class="mt-[9px] max-w-[14em] text-[14px] text-paper/60">-->
<!--                    {{ stat.label }}-->
<!--                </div>-->
            </div>
        </div>
    </section>
</template>
