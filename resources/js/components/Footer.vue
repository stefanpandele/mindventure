<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    IconBrandYoutubeFilled,
    IconBrandInstagramFilled,
    IconBrandFacebookFilled,
    IconBrandTiktokFilled,
} from '@tabler/icons-vue';
import type { Component } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

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
    IconBrandYoutubeFilled,
    IconBrandInstagramFilled,
    IconBrandFacebookFilled,
    IconBrandTiktokFilled,
];
</script>

<template>
    <footer class="bg-brand-indigo-dark-2 text-white">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-5 py-8 sm:px-6 md:grid-cols-[1.5fr_1fr_1fr_1fr]"
        >
            <!-- Brand column -->
            <div class="col-span-2 md:col-span-1">
                <div class="mb-2 flex items-center gap-2">
                    <Link href="/public" class="flex items-center gap-2.5">
                        <img
                            alt="logo"
                            src="/images/mindventure-logo.png"
                            class="h-10 w-auto rounded-sm"
                        />
                        <span class="text-[17px] font-semibold text-white">
                            Mindventure
                        </span>
                    </Link>
                </div>
                <p class="mb-2.5 text-[15px] leading-relaxed text-white/55">
                    Pregătire specializată de matematică IB pentru liceeni.
                    Analysis & Approaches și Applications & Interpretation, SL
                    și HL.
                </p>
                <div class="flex gap-2 mt-4">
                    <a
                        v-for="(social, i) in socials"
                        :key="i"
                        href="#"
                        class="flex h-[40px] w-[40px] items-center justify-center rounded-xl bg-white/10 text-white/75 transition-colors hover:bg-white/20"
                    >
                        <component :is="social" :size="21" :stroke="2" />
                    </a>
                </div>
            </div>

            <!-- Link columns -->
            <div v-for="col in columns" :key="col.title">
                <div class="mb-2 text-xs font-semibold uppercase">{{ col.title }}</div>
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
        <div class="border-t border-current/20">
            <div
                class="mx-auto flex max-w-6xl justify-between gap-6 px-5 py-4 text-[13px] text-white/55 sm:px-6"
            >
                <span>© 2026 Mindventure.
                    <span class="block sm:inline">
                        {{ t('all_rights_reserved') }}
                    </span>
                </span>
                <span
                    >Made with 🤍
                    <span class="block sm:inline"> by NETmeON! </span>
                </span>
            </div>
        </div>
    </footer>
</template>
