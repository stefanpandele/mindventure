<script setup lang="ts">
import {
    IconActivity,
    IconAward,
    IconClipboardList,
    IconFileCheck,
    IconShieldCheck,
} from '@tabler/icons-vue';
import type { Component } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Deliverable {
    icon: Component;
    iconColor: string;
    title: string;
    text: string;
}

const deliverables: Deliverable[] = [
    {
        icon: IconFileCheck,
        iconColor: 'text-brand-indigo',
        title: t('pages.ib_ia.deliverables_section.list_item_1.title'),
        text: t('pages.ib_ia.deliverables_section.list_item_1.text'),
    },
    {
        icon: IconClipboardList,
        iconColor: 'text-brand-magenta',
        title: t('pages.ib_ia.deliverables_section.list_item_2.title'),
        text: t('pages.ib_ia.deliverables_section.list_item_2.text'),
    },
    {
        icon: IconActivity,
        iconColor: 'text-accent-teal',
        title: t('pages.ib_ia.deliverables_section.list_item_3.title'),
        text: t('pages.ib_ia.deliverables_section.list_item_3.text'),
    },
    {
        icon: IconShieldCheck,
        iconColor: 'text-accent-lime',
        title: t('pages.ib_ia.deliverables_section.list_item_4.title'),
        text: t('pages.ib_ia.deliverables_section.list_item_4.text'),
    },
    {
        icon: IconAward,
        iconColor: 'text-accent-lime',
        title: t('pages.ib_ia.deliverables_section.list_item_5.title'),
        text: t('pages.ib_ia.deliverables_section.list_item_5.text'),
    },
];
</script>

<template>
    <section id="ce-primesti" class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    {{ t('pages.ib_ia.deliverables_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.ib_ia.deliverables_section.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-paper/60">
                    {{ t('pages.ib_ia.deliverables_section.description') }}
                </p>
            </div>

            <!-- Cards -->
            <div class="mt-11 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <article
                    v-for="deliverable in deliverables"
                    :key="deliverable.title"
                    class="rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-[26px] transition duration-200 hover:-translate-y-1 hover:shadow-[0_24px_44px_-30px_rgba(17,14,43,0.4)]"
                >
                    <div
                        class="mb-4 flex h-[42px] w-[42px] items-center justify-center rounded-[11px] bg-[#edeae0]"
                    >
                        <component
                            :is="deliverable.icon"
                            :size="20"
                            stroke="1.7"
                            :class="deliverable.iconColor"
                        />
                    </div>
                    <h4
                        class="mb-[7px] text-[17px] font-bold text-brand-indigo-dark-2"
                    >
                        {{ deliverable.title }}
                    </h4>
                    <p class="text-[13.5px] leading-[1.55] text-brand-muted">
                        {{ deliverable.text }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>
