<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>

<template>
    <section
        class="relative overflow-hidden bg-brand-indigo-dark-2 py-24 text-paper before:absolute before:-top-[30%] before:-right-[10%] before:h-[160%] before:w-[60%] before:bg-[radial-gradient(circle,rgba(218,26,125,0.22),transparent_60%)] before:content-['']"
    >
        <div class="relative z-[2] mx-auto max-w-6xl px-5 sm:px-6">
            <div class="max-w-[30em]">
                <div
                    class="h-10 font-mono text-[80px] leading-[0.5] font-extrabold text-brand-magenta"
                >
                    &ldquo;
                </div>
                <blockquote
                    class="my-6 text-[clamp(24px,3.2vw,38px)] leading-[1.22] font-semibold tracking-[-0.02em]"
                >
                    {{ t('pages.about.quote_section.quote_1') }}
                    <em class="text-brand-lime not-italic">
                        {{ t('pages.about.quote_section.quote_2') }} </em
                    >.
                </blockquote>
                <div class="text-[15px] text-paper/[0.62]">
                    {{ t('pages.about.quote_section.sub_quote_1') }}
                    <b class="font-semibold text-paper">
                        {{ t('pages.about.quote_section.sub_quote_2') }}
                    </b>
                </div>
            </div>
        </div>
    </section>
</template>
