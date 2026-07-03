<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';
import { IconArrowRight } from '@tabler/icons-vue';

const tags = ['Profesor IB', '10+ ani', 'AA & AI · SL & HL'];

const { t } = useTranslations();
</script>

<template>
    <section id="despre" class="bg-[#edeae0] py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Photo -->
            <div
                class="relative mb-6 aspect-square w-full overflow-hidden rounded-[20px] shadow-[0_30px_60px_-34px_rgba(52,44,129,0.7)] md:float-left md:mr-10 md:mb-4 md:w-[440px]"
            >
                <img
                    src="/images/20251126_183442.webp"
                    alt="Profesorul de matematică IB"
                    class="h-full w-full object-cover"
                />
            </div>

            <!-- Body -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand"
                    />
                    {{ t('pages.ib_math.trainer.section_header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.2vw,38px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.ib_math.trainer.section_title_1') }}
                </h2>
                <h3
                    class="mt-3.5 text-[clamp(18px,3.2vw,20px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.ib_math.trainer.section_title_2') }}
                </h3>
                <p
                    class="mt-[18px] text-justify text-[17px] leading-[1.65] whitespace-pre-line text-brand-body"
                >
                    {{ t('pages.ib_math.trainer.section_description') }}
                </p>

                <p
                    class="mt-[18px] text-justify text-[17px] leading-[1.65] text-brand-body"
                >
                    {{ t('pages.ib_math.trainer.cv_1') }}
                    <a
                        href="https://cs.unibuc.ro/~ddiaconescu"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 text-[14.5px] font-semibold text-brand transition-all hover:gap-[11px]"
                    >
                        {{ t('pages.ib_math.trainer.cv_2') }}
                    </a>
                </p>
                <div class="mt-6 flex flex-wrap gap-2.5">
                    <span
                        v-for="tag in tags"
                        :key="tag"
                        class="rounded-full border-[1.5px] border-brand-indigo-dark-2 px-3.5 py-2 font-mono text-[12px] font-bold tracking-[0.04em] text-brand-indigo-dark-2"
                    >
                        {{ tag }}
                    </span>
                </div>
            </div>
            <div class="clear-both" />
        </div>
    </section>
</template>
