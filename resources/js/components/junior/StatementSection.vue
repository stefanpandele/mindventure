<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-[60px] text-paper md:py-[78px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <p
                class="max-w-[16em] text-[clamp(28px,4vw,46px)] leading-[1.08] font-bold tracking-[-0.02em]"
            >
                {{ t('pages.junior.statement_section.title_1') }}
                <span class="text-brand-lime">
                    {{ t('pages.junior.statement_section.title_2') }} </span
                >.
            </p>
            <p
                class="mt-[22px] max-w-[40em] text-[17px] leading-[1.65] text-paper/60"
            >
                {{ t('pages.junior.statement_section.description') }}
            </p>
        </div>
    </section>
</template>
