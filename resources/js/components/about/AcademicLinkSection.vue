<script setup lang="ts">
import { IconArrowRight } from '@tabler/icons-vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section class="bg-[#edeae0] py-16 md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <div
                class="flex flex-wrap items-center justify-between gap-7 rounded-[18px] border border-brand-indigo-dark-2/12 bg-white px-[38px] py-[34px]"
            >
                <div>
                    <h3
                        class="mb-1.5 text-[22px] font-bold text-brand-indigo-dark-2"
                    >
                        {{ t('pages.about.academic_section.title') }}
                    </h3>
                    <p class="max-w-[40em] text-[15px] text-brand-muted">
                        {{ t('pages.about.academic_section.text') }}
                    </p>
                </div>
                <a
                    href="https://cs.unibuc.ro/~ddiaconescu/"
                    target="_blank"
                    rel="noopener"
                    class="group inline-flex items-center gap-2 text-[15px] font-semibold whitespace-nowrap text-brand-magenta"
                >
                    {{ t('pages.about.academic_section.link_text') }}
                    <IconArrowRight
                        :size="16"
                        stroke="1.6"
                        class="transition-transform group-hover:translate-x-1"
                    />
                </a>
            </div>
        </div>
    </section>
</template>
