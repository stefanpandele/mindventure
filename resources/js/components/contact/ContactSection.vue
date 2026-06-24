<script setup lang="ts">
import {
    IconMapPin,
    IconPhone,
    IconBrandWhatsapp,
    IconMail,
    IconArrowRight,
    IconBrandYoutubeFilled,
    IconBrandInstagramFilled,
    IconBrandFacebookFilled,
    IconBrandTiktokFilled,
} from '@tabler/icons-vue';
import type { Component } from 'vue';

import ContactForm from './ContactForm.vue';

interface Social {
    label: string;
    icon: Component;
    hover: string;
}

const socials: Social[] = [
    {
        label: 'YouTube',
        icon: IconBrandYoutubeFilled,
        hover: 'hover:border-[#FF0000] hover:bg-[#FF0000]',
    },
    {
        label: 'Instagram',
        icon: IconBrandInstagramFilled,
        hover: 'hover:border-brand-magenta hover:bg-brand-magenta',
    },
    {
        label: 'Facebook',
        icon: IconBrandFacebookFilled,
        hover: 'hover:border-[#1877F2] hover:bg-[#1877F2]',
    },
    {
        label: 'TikTok',
        icon: IconBrandTiktokFilled,
        hover: 'hover:border-[#111] hover:bg-[#111]',
    },
];
</script>

<template>
    <section id="contact" class="py-14 md:py-20">
        <div
            class="mx-auto grid max-w-6xl items-start gap-12 px-5 sm:px-6 md:grid-cols-[0.92fr_1.08fr]"
        >
            <!-- INFO + MAP -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-ink uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-indigo"
                    />
                    Date de contact
                </span>

                <div class="mt-2 flex flex-col gap-3.5">
                    <!-- Address -->
                    <div
                        class="flex items-start gap-4 rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-[22px] py-5 transition hover:shadow-[0_18px_36px_-28px_rgba(17,14,43,0.4)]"
                    >
                        <div
                            class="flex h-[46px] w-[46px] flex-none items-center justify-center rounded-xl bg-brand-magenta/12 text-brand-magenta"
                        >
                            <IconMapPin :size="22" stroke="1.7" />
                        </div>
                        <div>
                            <div
                                class="font-mono text-[11px] font-bold tracking-[0.1em] text-brand-muted uppercase"
                            >
                                Adresă
                            </div>
                            <div
                                class="mt-[5px] text-[16px] leading-[1.4] font-semibold"
                            >
                                Erou Iancu Nicolae 122, H8 Residence 5
                            </div>
                            <div class="mt-[3px] text-[13px] text-brand-muted">
                                Voluntari, Ilfov
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div
                        class="flex items-start gap-4 rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-[22px] py-5 transition hover:shadow-[0_18px_36px_-28px_rgba(17,14,43,0.4)]"
                    >
                        <div
                            class="flex h-[46px] w-[46px] flex-none items-center justify-center rounded-xl bg-brand-teal/15 text-brand-teal"
                        >
                            <IconPhone :size="22" stroke="1.7" />
                        </div>
                        <div>
                            <div
                                class="font-mono text-[11px] font-bold tracking-[0.1em] text-brand-muted uppercase"
                            >
                                Telefon
                            </div>
                            <div
                                class="mt-[5px] text-[16px] leading-[1.4] font-semibold"
                            >
                                <a
                                    href="tel:+40720171700"
                                    class="transition-colors hover:text-brand-magenta"
                                    >(+40) 720 17 17 00</a
                                >
                            </div>
                            <div class="mt-[3px] text-[13px] text-brand-muted">
                                Apel direct, în program
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div
                        class="flex items-start gap-4 rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-[22px] py-5 transition hover:shadow-[0_18px_36px_-28px_rgba(17,14,43,0.4)]"
                    >
                        <div
                            class="flex h-[46px] w-[46px] flex-none items-center justify-center rounded-xl bg-brand-lime/20 text-[#1FA855]"
                        >
                            <IconBrandWhatsapp :size="22" stroke="1.7" />
                        </div>
                        <div>
                            <div
                                class="font-mono text-[11px] font-bold tracking-[0.1em] text-brand-muted uppercase"
                            >
                                WhatsApp
                            </div>
                            <div
                                class="mt-[5px] text-[16px] leading-[1.4] font-semibold"
                            >
                                <a
                                    href="https://wa.me/40720171700"
                                    target="_blank"
                                    rel="noopener"
                                    class="transition-colors hover:text-brand-magenta"
                                    >(+40) 720 17 17 00</a
                                >
                            </div>
                            <div class="mt-[3px] text-[13px] text-brand-muted">
                                Scrie-ne, răspundem rapid
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div
                        class="flex items-start gap-4 rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-[22px] py-5 transition hover:shadow-[0_18px_36px_-28px_rgba(17,14,43,0.4)]"
                    >
                        <div
                            class="flex h-[46px] w-[46px] flex-none items-center justify-center rounded-xl bg-brand-indigo/10 text-brand-indigo"
                        >
                            <IconMail :size="22" stroke="1.7" />
                        </div>
                        <div>
                            <div
                                class="font-mono text-[11px] font-bold tracking-[0.1em] text-brand-muted uppercase"
                            >
                                Email
                            </div>
                            <div
                                class="mt-[5px] text-[16px] leading-[1.4] font-semibold"
                            >
                                <a
                                    href="mailto:contact@mindventure.ro"
                                    class="transition-colors hover:text-brand-magenta"
                                    >contact@mindventure.ro</a
                                >
                            </div>
                            <div class="mt-[3px] text-[13px] text-brand-muted">
                                Răspundem în aceeași zi lucrătoare
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div
                    class="relative mt-[18px] h-[230px] overflow-hidden rounded-2xl border border-brand-indigo-dark-2/12 bg-paper"
                >
                    <iframe
                        src="https://maps.google.com/maps?q=Strada%20Erou%20Iancu%20Nicolae%20122%2C%20Voluntari&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Harta Mindventure"
                        class="block h-full w-full border-0 saturate-[1.05]"
                    />
                </div>
                <a
                    href="https://www.google.com/maps/dir//Strada+Erou+Iancu+Nicolae+122+Voluntari+077190/"
                    target="_blank"
                    rel="noopener"
                    class="group mt-3 inline-flex items-center gap-[7px] text-[14px] font-semibold text-brand transition-all"
                >
                    Deschide ruta în Google Maps
                    <IconArrowRight
                        :size="15"
                        stroke="2"
                        class="transition-transform group-hover:translate-x-1"
                    />
                </a>

                <!-- Social -->
                <div
                    class="mt-[26px] rounded-2xl border border-brand-indigo-dark-2/12 bg-white px-[26px] py-6"
                >
                    <span
                        class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-ink uppercase"
                    >
                        <span
                            class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                        />
                        Social media
                    </span>
                    <h4
                        class="mt-2 mb-1 text-[19px] font-bold tracking-[-0.02em] text-brand-indigo-dark-2"
                    >
                        Urmărește-ne
                    </h4>
                    <div class="mb-[18px] text-[14px] text-brand-muted">
                        Lecții, exerciții și din culisele studioului.
                    </div>
                    <div class="flex flex-wrap gap-2.5">
                        <a
                            v-for="social in socials"
                            :key="social.label"
                            href="#"
                            target="_blank"
                            rel="noopener"
                            :class="[
                                'inline-flex items-center gap-[9px] rounded-[11px] border-[1.5px] border-brand-indigo-dark-2/12 px-[15px] py-2.5 text-[14px] font-semibold text-brand-ink transition hover:-translate-y-0.5 hover:text-white',
                                social.hover,
                            ]"
                        >
                            <component :is="social.icon" :size="18" />
                            {{ social.label }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <ContactForm />
        </div>
    </section>
</template>
