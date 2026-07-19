<script setup lang="ts">
import { IconPlayerPlayFilled } from '@tabler/icons-vue';
import BookSessionModal from '@/components/modals/BookSessionModal.vue';
import { useTranslations } from '@/composables/useTranslations';
import { trackEvent } from '@/lib/gtm';

const { t } = useTranslations();
</script>

<template>
    <section class="border-b border-brand/10">
        <div
            class="
                mx-auto
                grid
                max-w-6xl
                items-center
                gap-10
                px-5
                py-12
                sm:px-6
                md:grid-cols-2
                md:py-16
            "
        >
            <div class="flex flex-col gap-4">
                <span
                    class="inline-flex w-fit items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-brand-indigo"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    {{ t('pages.ib_math.hero.badge_text') }}
                </span>

                <h1
                    class="text-4xl leading-[1.02] font-bold tracking-[-0.025em] text-brand-indigo-dark-2 sm:text-6xl"
                >
                    {{ t('pages.ib_math.hero.title_1') }}
                    <span class="relative inline-block text-brand-magenta">
                        <span class="relative z-10">{{
                            t('pages.ib_math.hero.title_2')
                        }}</span>
                        <span
                            class="absolute -right-1.5 bottom-[0.08em] -left-1.5 h-[0.34em] -rotate-[1.5deg] rounded-[3px] bg-brand-lime"
                        />
                    </span>
                    <span class="relative z-11">.</span>
                </h1>

                <p
                    class="max-w-xl text-justify text-[17px] leading-relaxed text-brand-body/90"
                >
                    {{ t('pages.ib_math.hero.description') }}
                </p>

                <div class="mt-2 flex flex-wrap gap-3">
                    <BookSessionModal
                        section="ib-math"
                        :name="t('buttons.cta.book_session')"
                        trigger-class="rounded-md bg-brand-indigo px-5 py-2.5 text-[15px] font-semibold text-white transition-opacity hover:opacity-90"
                        @open="trackEvent('cta_click', { location: 'hero_section' })"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
