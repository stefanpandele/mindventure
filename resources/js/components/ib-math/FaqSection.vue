<script setup lang="ts">
import AskQuestionModal from '@/components/modals/AskQuestionModal.vue';
import { useTranslations } from '@/composables/useTranslations';

interface Faq {
    question: string;
    answer: string;
}

const { t } = useTranslations();
const section = 'ib-math';

const faqs: Faq[] = [
    {
        question: t('pages.ib_math.faq.q_1.question'),
        answer: t('pages.ib_math.faq.q_1.answer'),
    },
    {
        question: t('pages.ib_math.faq.q_2.question'),
        answer: t('pages.ib_math.faq.q_2.answer'),
    },
    {
        question: t('pages.ib_math.faq.q_3.question'),
        answer: t('pages.ib_math.faq.q_3.answer'),
    },
    {
        question: t('pages.ib_math.faq.q_4.question'),
        answer: t('pages.ib_math.faq.q_4.answer'),
    },
    // {
    //     question: t('pages.ib_math.faq.q_5.question'),
    //     answer: t('pages.ib_math.faq.q_5.answer'),
    // },
    // {
    //     question: t('pages.ib_math.faq.q_6.question'),
    //     answer: t('pages.ib_math.faq.q_6.answer'),
    // },
    // {
    //     question: t('pages.ib_math.faq.q_7.question'),
    //     answer: t('pages.ib_math.faq.q_7.answer'),
    // },
];
</script>

<template>
    <section id="faq" class="py-[66px] md:py-24">
        <div
            class="mx-auto grid max-w-6xl gap-10 px-5 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:gap-14"
        >
            <!-- Intro + ask card -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    {{ t('pages.ib_math.faq.section_header') }}
                </span>
                <h2
                    class="mt-4 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.ib_math.faq.section_title') }}
                </h2>
                <p
                    class="mt-4 max-w-[32em] text-[16.5px] leading-relaxed text-brand-body"
                >
                    {{ t('pages.ib_math.faq.section_description') }}
                </p>

                <div
                    class="mt-8 rounded-[18px] bg-brand-indigo-dark-2 p-7 text-paper"
                >
                    <h3 class="text-[19px] font-bold">
                        {{ t('pages.ib_math.faq.ask_card.title') }}
                    </h3>
                    <p
                        class="mt-2 mb-5 text-[14px] leading-relaxed text-paper/65"
                    >
                        {{ t('pages.ib_math.faq.ask_card.description') }}
                    </p>

                    <AskQuestionModal :section="section" />

                    <div class="mt-3.5 text-center text-[13px] text-paper/65">
                        {{ t('pages.ib_math.faq.ask_card.mail_prefix') }}
                        <a
                            href="mailto:contact@mindventure.ro"
                            class="font-semibold text-brand-lime"
                        >
                            contact@mindventure.ro
                        </a>
                    </div>
                </div>
            </div>

            <!-- Accordion -->
            <div class="flex flex-col gap-3.5">
                <details
                    v-for="(faq, index) in faqs"
                    :key="faq.question"
                    :open="index === 0"
                    class="group rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-6 transition-[border-color,box-shadow] duration-200 open:border-brand-magenta/45 open:shadow-[0_18px_40px_-30px_rgba(192,38,211,0.4)]"
                >
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-4 py-5 text-[16.5px] font-semibold text-brand-indigo-dark-2 [&::-webkit-details-marker]:hidden"
                    >
                        {{ faq.question }}
                        <span
                            class="flex h-6 w-6 flex-none items-center justify-center rounded-[7px] bg-brand-indigo-dark-2/[0.06] text-[16px] leading-none font-bold transition duration-200 group-open:rotate-45 group-open:bg-brand-magenta group-open:text-white"
                        >
                            +
                        </span>
                    </summary>
                    <p
                        class="whitespace-pre-line leading-relaxed max-w-[44em] pb-[22px] text-[14.5px] text-brand-body"
                    >
                        {{ faq.answer }}
                    </p>
                </details>
            </div>
        </div>
    </section>
</template>
