<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Criterion {
    letter: string;
    name: string;
    what: string;
    width: string;
    mark: number;
    key: boolean;
}

const criteria: Criterion[] = [
    {
        letter: 'A',
        name: t('pages.ib_ia.criteria_section.list_item_1.name'),
        what: t('pages.ib_ia.criteria_section.list_item_1.what'),
        width: '66%',
        mark: 4,
        key: false,
    },
    {
        letter: 'B',
        name: t('pages.ib_ia.criteria_section.list_item_2.name'),
        what: t('pages.ib_ia.criteria_section.list_item_2.what'),
        width: '66%',
        mark: 4,
        key: true,
    },
    {
        letter: 'C',
        name: t('pages.ib_ia.criteria_section.list_item_3.name'),
        what: t('pages.ib_ia.criteria_section.list_item_3.what'),
        width: '50%',
        mark: 3,
        key: true,
    },
    {
        letter: 'D',
        name: t('pages.ib_ia.criteria_section.list_item_4.name'),
        what: t('pages.ib_ia.criteria_section.list_item_4.what'),
        width: '50%',
        mark: 3,
        key: true,
    },
    {
        letter: 'E',
        name: t('pages.ib_ia.criteria_section.list_item_5.name'),
        what: t('pages.ib_ia.criteria_section.list_item_5.what'),
        width: '100%',
        mark: 6,
        key: false,
    },
];
</script>

<template>
    <section id="criterii" class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    {{ t('pages.ib_ia.criteria_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.ib_ia.criteria_section.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    {{ t('pages.ib_ia.criteria_section.description') }}
                </p>
            </div>

            <!-- Criteria rows -->
            <div class="mt-11 flex flex-col gap-3.5">
                <div
                    v-for="criterion in criteria"
                    :key="criterion.letter"
                    class="grid grid-cols-[30px_1fr_auto] items-center gap-x-3.5 gap-y-2 rounded-[14px] border px-6 py-5 transition hover:shadow-[0_18px_36px_-28px_rgba(17,14,43,0.4)] md:grid-cols-[38px_1.1fr_2fr_auto] md:gap-5"
                    :class="
                        criterion.key
                            ? 'border-accent-teal/50 bg-accent-teal/5'
                            : 'border-brand-indigo-dark-2/12 bg-white'
                    "
                >
                    <div
                        class="text-[22px] font-extrabold"
                        :class="
                            criterion.key
                                ? 'text-accent-teal'
                                : 'text-brand-muted'
                        "
                    >
                        {{ criterion.letter }}
                    </div>
                    <div
                        class="text-[16px] font-semibold text-brand-indigo-dark-2"
                    >
                        {{ criterion.name }}
                        <span
                            class="mt-0.5 block text-[13px] font-normal text-brand-muted"
                        >
                            {{ criterion.what }}
                        </span>
                    </div>
                    <div
                        class="order-last col-span-full h-2.5 overflow-hidden rounded-[5px] bg-[#edeae0] md:order-none md:col-span-1"
                    >
                        <div
                            class="h-full rounded-[5px]"
                            :class="
                                criterion.key
                                    ? 'bg-accent-teal'
                                    : 'bg-brand-indigo-dark-2/25'
                            "
                            :style="{ width: criterion.width }"
                        />
                    </div>
                    <div
                        class="font-mono text-[16px] font-bold whitespace-nowrap text-brand-indigo-dark-2"
                    >
                        {{ criterion.mark }}
                        <span class="text-[11px] font-medium text-brand-muted">
                            p
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="mt-1.5 flex items-baseline justify-end gap-2.5 pr-6">
                <span class="text-[13px] text-brand-muted">Total</span>
                <span
                    class="font-mono text-[18px] font-bold text-brand-indigo-dark-2"
                >
                    20 p
                </span>
            </div>

            <!-- Insight callout -->
            <div
                class="mt-6 flex items-start gap-4 rounded-[18px] bg-brand-indigo-dark-2 px-[30px] py-[26px] text-paper"
            >
                <span
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-[11px] bg-brand-lime text-[20px] font-extrabold text-brand-indigo-dark-2"
                >
                    !
                </span>
                <p class="text-[15.5px] leading-[1.6] text-paper/90">
                    {{ t('pages.ib_ia.criteria_section.notice') }}
                </p>
            </div>
        </div>
    </section>
</template>
