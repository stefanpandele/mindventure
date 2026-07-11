<script setup lang="ts">
import { IconShieldCheck } from '@tabler/icons-vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Step {
    num: string;
    title: string;
    text: string;
}

const steps: Step[] = [
    {
        num: '01',
        title: t('pages.ib_ia.process_section.list_item_1.title'),
        text: t('pages.ib_ia.process_section.list_item_1.text'),
    },
    {
        num: '02',
        title: t('pages.ib_ia.process_section.list_item_2.title'),
        text: t('pages.ib_ia.process_section.list_item_2.text'),
    },
    {
        num: '03',
        title: t('pages.ib_ia.process_section.list_item_3.title'),
        text: t('pages.ib_ia.process_section.list_item_3.text'),
    },
    {
        num: '04',
        title: t('pages.ib_ia.process_section.list_item_4.title'),
        text: t('pages.ib_ia.process_section.list_item_4.text'),
    },
    {
        num: '05',
        title: t('pages.ib_ia.process_section.list_item_5.title'),
        text: t('pages.ib_ia.process_section.list_item_5.text'),
    },
];
</script>

<template>
    <section
        id="cum-lucram"
        class="bg-brand-indigo-dark-2 py-[60px] text-paper md:py-[88px]"
    >
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    {{ t('pages.ib_ia.process_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-white"
                >
                    {{ t('pages.ib_ia.process_section.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-paper/60">
                    {{ t('pages.ib_ia.process_section.description') }}
                </p>
            </div>

            <!-- Steps -->
            <div class="mt-11 flex flex-col">
                <div
                    v-for="step in steps"
                    :key="step.num"
                    class="grid gap-3 border-t border-[rgba(245,243,237,0.16)] py-[26px] last:border-b md:grid-cols-[88px_1fr] md:gap-7"
                >
                    <div
                        class="font-mono text-[30px] font-bold text-accent-teal"
                    >
                        {{ step.num }}
                    </div>
                    <div>
                        <h4 class="mb-2 text-[21px] font-bold text-white">
                            {{ step.title }}
                        </h4>
                        <p
                            class="max-w-[46em] text-[15px] leading-[1.6] text-paper/60"
                        >
                            {{ step.text }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Integrity callout -->
            <div
                class="mt-10 flex items-start gap-[15px] rounded-[18px] border border-accent-teal/30 bg-accent-teal/[0.08] px-7 py-6"
            >
                <span
                    class="flex h-[38px] w-[38px] shrink-0 items-center justify-center rounded-[10px] bg-accent-teal text-brand-indigo-dark-2"
                >
                    <IconShieldCheck :size="20" stroke="1.8" />
                </span>
                <p class="text-[15px] leading-[1.6] text-paper/90">
                    {{ t('pages.ib_ia.process_section.notice_1') }}
                    <b class="font-bold text-paper">
                        {{ t('pages.ib_ia.process_section.notice_2') }}
                    </b>
                    {{ t('pages.ib_ia.process_section.notice_3') }}
                </p>
            </div>
        </div>
    </section>
</template>
