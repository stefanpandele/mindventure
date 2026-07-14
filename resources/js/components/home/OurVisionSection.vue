<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
</script>
<template>
    <section id="viziune" class="py-[64px] md:py-[90px]">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 sm:px-6 md:grid-cols-[380px_1fr]"
        >
            <!-- Photo -->
            <div
                class="relative mx-auto aspect-[4/5] w-full max-w-[380px] overflow-hidden rounded-[20px] shadow-[0_30px_60px_-34px_rgba(52,44,129,0.7)]"
            >
                <img
                    src="/images/20251126_181454.webp"
                    alt="Spațiul de învățare Mindventure, Pipera"
                    class="h-full w-full object-cover"
                />
            </div>

            <!-- Body -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    {{ t('pages.home.our_vision.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.2vw,38px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.home.our_vision.title') }}
                </h2>
                <p
                    class="mt-[18px] max-w-[46em] text-[17px] leading-[1.65] text-brand-body"
                >
                    {{ t('pages.home.our_vision.description') }}
                </p>
            </div>
        </div>
    </section>
</template>
