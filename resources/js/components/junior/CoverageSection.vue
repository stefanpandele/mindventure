<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Stage {
    label: string;
    title: string;
    range: string;
    items: string[];
    topBar: string;
    checkBg: string;
}

const stages: Stage[] = [
    {
        label: t('pages.junior.coverage_section.stage_item.label_1'),
        title: t('pages.junior.coverage_section.stage_item.title_1'),
        range: t('pages.junior.coverage_section.stage_item.range_1'),
        items: [
            t('pages.junior.coverage_section.stage_item.sub_item_1.value_1'),
            t('pages.junior.coverage_section.stage_item.sub_item_1.value_2'),
            t('pages.junior.coverage_section.stage_item.sub_item_1.value_3'),
            t('pages.junior.coverage_section.stage_item.sub_item_1.value_4'),
        ],
        topBar: 'bg-brand-lime',
        checkBg: 'bg-brand-lime/25',
    },
    {
        label: t('pages.junior.coverage_section.stage_item.label_2'),
        title: t('pages.junior.coverage_section.stage_item.title_2'),
        range: t('pages.junior.coverage_section.stage_item.range_2'),
        items: [
            t('pages.junior.coverage_section.stage_item.sub_item_2.value_1'),
            t('pages.junior.coverage_section.stage_item.sub_item_2.value_2'),
            t('pages.junior.coverage_section.stage_item.sub_item_2.value_3'),
            t('pages.junior.coverage_section.stage_item.sub_item_2.value_4'),
        ],
        topBar: 'bg-accent-teal',
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
            <div class="mt-11 grid gap-[22px] md:grid-cols-2">
                <article
                    v-for="stage in stages"
                    :key="stage.title"
                    class="relative overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-8"
                >
                    <span
                        class="absolute top-0 right-0 left-0 h-[5px]"
                        :class="stage.topBar"
                    />
                    <div
                        class="font-mono text-[12px] font-bold tracking-[0.08em] text-brand-muted uppercase"
                    >
                        {{ stage.label }}
                    </div>
                    <h3
                        class="mt-2.5 text-[26px] font-extrabold text-brand-indigo-dark-2"
                    >
                        {{ stage.title }}
                    </h3>
                    <div
                        class="mb-[18px] text-[14.5px] font-semibold text-brand-muted"
                    >
                        {{ stage.range }}
                    </div>
                    <ul class="flex flex-col gap-[11px]">
                        <li
                            v-for="item in stage.items"
                            :key="item"
                            class="flex items-start gap-[11px] text-[14.5px] leading-[1.5] text-brand-body"
                        >
                            <span
                                class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-md text-[12px] text-brand-indigo-dark-2"
                                :class="stage.checkBg"
                            >
                                ✓
                            </span>
                            {{ item }}
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
</template>
