<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface MethodCard {
    num: string;
    title: string;
    text: string;
    image: string;
    alt: string;
    numBg: string;
}

const cards: MethodCard[] = [
    {
        num: '01',
        title: t('pages.junior.statement_section.card_item.title_1'),
        text: t('pages.junior.statement_section.card_item.text_1'),
        image: '/images/junior/method-1.webp',
        alt: t('pages.junior.statement_section.card_item.alt_text_1'),
        numBg: 'bg-brand-lime text-brand-indigo-dark-2',
    },
    {
        num: '02',
        title: t('pages.junior.statement_section.card_item.title_2'),
        text: t('pages.junior.statement_section.card_item.text_2'),
        image: '/images/junior/method-2.webp',
        alt: t('pages.junior.statement_section.card_item.alt_text_2'),
        numBg: 'bg-brand-magenta text-white',
    },
    {
        num: '03',
        title: t('pages.junior.statement_section.card_item.title_3'),
        text: t('pages.junior.statement_section.card_item.text_3'),
        image: '/images/junior/method-3.webp',
        alt: t('pages.junior.statement_section.card_item.alt_text_3'),
        numBg: 'bg-accent-teal text-brand-indigo-dark-2',
    },
];
</script>

<template>
    <section id="cum-lucram" class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-lime"
                    />
                    {{ t('pages.junior.method_section.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.junior.method_section.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    {{ t('pages.junior.method_section.description') }}
                </p>
            </div>

            <!-- Photo method cards -->
            <div class="mt-11 grid gap-6 md:grid-cols-3">
                <article
                    v-for="card in cards"
                    :key="card.num"
                    class="group overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/12 bg-white transition-transform duration-200 hover:-translate-y-1.5 hover:shadow-[0_26px_50px_-30px_rgba(17,14,43,0.4)]"
                >
                    <div class="relative h-[190px] overflow-hidden">
                        <span
                            class="absolute top-3.5 left-3.5 z-[2] rounded-lg px-2.5 py-[5px] font-mono text-[12px] font-bold"
                            :class="card.numBg"
                        >
                            {{ card.num }}
                        </span>
                        <img
                            :src="card.image"
                            :alt="card.alt"
                            class="h-full w-full object-cover transition-transform duration-[400ms] group-hover:scale-105"
                        />
                    </div>
                    <div class="px-[26px] pt-6 pb-7">
                        <h4
                            class="mb-2 text-[20px] font-bold text-brand-indigo-dark-2"
                        >
                            {{ card.title }}
                        </h4>
                        <p class="text-[14.5px] leading-[1.6] text-brand-muted">
                            {{ card.text }}
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>
