<script setup lang="ts">
import {
    IconChartLine,
    IconHeart,
    IconStar,
    IconUsers,
} from '@tabler/icons-vue';
import type { Component } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface ParentPoint {
    icon: Component;
    iconColor: string;
    title: string;
    text: string;
}

const points: ParentPoint[] = [
    {
        icon: IconUsers,
        iconColor: 'text-brand-magenta',
        title: t('pages.junior.parents_section.list_item.title_1'),
        text: t('pages.junior.parents_section.list_item.text_1'),
    },
    {
        icon: IconChartLine,
        iconColor: 'text-brand-indigo',
        title: t('pages.junior.parents_section.list_item.title_2'),
        text: t('pages.junior.parents_section.list_item.text_2'),
    },
    {
        icon: IconHeart,
        iconColor: 'text-accent-teal',
        title: t('pages.junior.parents_section.list_item.title_3'),
        text: t('pages.junior.parents_section.list_item.text_3'),
    },
    {
        icon: IconStar,
        iconColor: 'text-accent-lime',
        title: t('pages.junior.parents_section.list_item.title_4'),
        text: t('pages.junior.parents_section.list_item.text_4'),
    },
];
</script>

<template>
    <section id="parinti" class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    {{ t('pages.junior.parents_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.junior.parents_section.title') }}
                </h2>
            </div>

            <!-- Points -->
            <div class="mt-11 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="point in points"
                    :key="point.title"
                    class="rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-[26px] transition duration-200 hover:-translate-y-1 hover:shadow-[0_22px_44px_-30px_rgba(17,14,43,0.4)]"
                >
                    <div
                        class="mb-4 flex h-[42px] w-[42px] items-center justify-center rounded-[11px] bg-[#edeae0]"
                    >
                        <component
                            :is="point.icon"
                            :size="20"
                            stroke="1.7"
                            :class="point.iconColor"
                        />
                    </div>
                    <h4
                        class="mb-[7px] text-[16px] font-bold text-brand-indigo-dark-2"
                    >
                        {{ point.title }}
                    </h4>
                    <p class="text-[13.5px] leading-[1.55] text-brand-muted">
                        {{ point.text }}
                    </p>
                </article>
            </div>

            <!-- Path note -->
<!--            <div-->
<!--                class="mt-[38px] flex flex-wrap items-center gap-4 rounded-[18px] bg-brand-indigo-dark-2 px-[30px] py-[26px] text-paper"-->
<!--            >-->
<!--                <span-->
<!--                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-lime font-mono text-[18px] font-bold text-brand-indigo-dark-2"-->
<!--                >-->
<!--                    7-->
<!--                </span>-->
<!--                <p-->
<!--                    class="min-w-[240px] flex-1 text-[15.5px] leading-[1.55] text-paper/90"-->
<!--                >-->
<!--                    <b class="font-bold text-brand-lime">-->
<!--                        {{ t('pages.junior.parents_section.notice_1') }}-->
<!--                    </b>-->
<!--                    {{ t('pages.junior.parents_section.notice_2') }}-->
<!--                </p>-->
<!--            </div>-->
        </div>
    </section>
</template>
