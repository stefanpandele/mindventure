<script setup lang="ts">
import {
    IconBrandYoutube,
    IconBrandInstagram,
    IconBrandFacebook,
} from '@tabler/icons-vue';
import type { Component } from 'vue';

interface FooterColumn {
    title: string;
    items: string[];
}

const columns: FooterColumn[] = [
    { title: 'Program', items: ['AA SL', 'AA HL', 'AI SL', 'AI HL'] },
    {
        title: 'Resurse',
        items: ['Lecții YouTube', 'Blog', 'Întrebări frecvente'],
    },
    { title: 'Contact', items: ['Email', 'WhatsApp', 'Formular'] },
];

const socials: Component[] = [
    IconBrandYoutube,
    IconBrandInstagram,
    IconBrandFacebook,
];
</script>

<template>
    <footer class="bg-brand-dark text-white">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-5 py-8 sm:px-6 md:grid-cols-[1.5fr_1fr_1fr_1fr]"
        >
            <!-- Brand column -->
            <div class="col-span-2 md:col-span-1">
                <div class="mb-2 flex items-center gap-2">
                    <span
                        class="grid h-[22px] w-[22px] grid-cols-2 grid-rows-2 overflow-hidden rounded"
                    >
                        <span class="bg-logo-indigo" />
                        <span class="bg-logo-teal" />
                        <span class="bg-logo-lime" />
                        <span class="bg-logo-magenta" />
                    </span>
                    <span class="text-[13px] font-semibold">Mindventure</span>
                </div>
                <p class="mb-2.5 text-[11px] leading-relaxed text-white/55">
                    Pregătire specializată de matematică IB pentru liceeni.
                </p>
                <div class="flex gap-2">
                    <a
                        v-for="(social, i) in socials"
                        :key="i"
                        href="#"
                        class="flex h-[22px] w-[22px] items-center justify-center rounded-full bg-white/10 text-white/75 transition-colors hover:bg-white/20"
                    >
                        <component :is="social" :size="13" :stroke="2" />
                    </a>
                </div>
            </div>

            <!-- Link columns -->
            <div v-for="col in columns" :key="col.title">
                <div class="mb-2 text-xs font-semibold">{{ col.title }}</div>
                <ul class="space-y-1.5">
                    <li v-for="item in col.items" :key="item">
                        <a
                            href="#"
                            class="text-[11px] text-white/60 transition-colors hover:text-white"
                        >
                            {{ item }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>
