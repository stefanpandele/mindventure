<script setup lang="ts">
import { IconArrowRight, IconMapPin } from '@tabler/icons-vue';
import BookSessionModal from '@/components/modals/BookSessionModal.vue';
import { useTranslations } from '@/composables/useTranslations';
import { trackEvent } from '@/lib/gtm';

const { t } = useTranslations();
const section = 'homepage';
</script>

<template>
    <section
        id="rezerva"
        class="relative overflow-hidden bg-brand-indigo px-5 py-18 before:absolute before:top-[-40%] before:left-1/2 before:h-[190%] before:w-[190%] before:-translate-x-1/2 before:bg-[radial-gradient(circle,rgba(74,63,212,0.7),transparent_55%)] before:opacity-80 before:content-[''] sm:px-6"
    >
        <div
            class="relative z-10 mx-auto grid max-w-6xl items-center gap-10 lg:grid-cols-3 lg:gap-12"
        >
            <div class="text-center lg:col-span-2 lg:text-left">
                <h2 class="mb-4 text-5xl font-semibold text-white">
                    {{ t('pages.home.cta.title') }}
                </h2>
                <p
                    class="mx-auto mb-6 max-w-md text-[17px] leading-relaxed text-white/60 lg:mx-0"
                >
                    {{ t('pages.home.cta.description') }}
                </p>
                <BookSessionModal
                    :section="section"
                    :name="t('buttons.cta.book_session')"
                    trigger-class="inline-block rounded-xl bg-brand-lime px-6 py-3 text-[15px] font-semibold text-brand-indigo-dark-2 transition-opacity hover:opacity-90"
                    @open="trackEvent('cta_click', { location: 'cta_section' })"
                />
            </div>

            <div class="lg:col-span-1">
                <div class="mt-4 mb-4 flex items-start gap-3 text-left">
                    <IconMapPin
                        :size="20"
                        stroke="1.7"
                        class="mt-[3px] flex-none text-brand-lime"
                    />
                    <div>
                        <div
                            class="text-[15px] leading-[1.4] font-semibold text-white"
                        >
                            {{ t('pages.home.cta.map.address_line_1') }}
                        </div>
                        <div class="mt-[3px] text-[13px] text-white/60">
                            {{ t('pages.home.cta.map.address_line_2') }}
                        </div>
                    </div>
                </div>

                <div
                    class="relative h-[230px] overflow-hidden rounded-2xl border border-white/15 bg-paper"
                >
                    <iframe
                        src="https://maps.google.com/maps?q=Strada%20Erou%20Iancu%20Nicolae%20122%2C%20Voluntari&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        :title="t('pages.home.cta.map.title')"
                        class="block h-full w-full border-0 saturate-[1.05]"
                    />
                </div>

                <a
                    href="https://www.google.com/maps/dir//Strada+Erou+Iancu+Nicolae+122+Voluntari+077190/"
                    target="_blank"
                    rel="noopener"
                    class="group mt-3 inline-flex items-center gap-[7px] text-[14px] font-semibold text-brand-lime transition-all"
                >
                    {{ t('pages.home.cta.map.open_route') }}
                    <IconArrowRight
                        :size="15"
                        stroke="2"
                        class="transition-transform group-hover:translate-x-1"
                    />
                </a>
            </div>
        </div>
    </section>
</template>
