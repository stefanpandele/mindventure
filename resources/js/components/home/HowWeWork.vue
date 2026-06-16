<script setup lang="ts">
import {
    IconFileText,
    IconNotebook,
    IconChecklist,
    IconReport,
} from '@tabler/icons-vue';
import type { Component } from 'vue';

interface Pillar {
    title: string;
    text: string;
    icon: Component;
    chip: string;
    iconColor: string;
}

const pillars: Pillar[] = [
    {
        title: 'Past papers',
        text: 'Antrenament pe subiecte reale din anii anteriori.',
        icon: IconFileText,
        chip: 'bg-chip-indigo',
        iconColor: 'text-brand',
    },
    {
        title: 'Internal Assessment',
        text: 'Îndrumare pas cu pas la IA.',
        icon: IconNotebook,
        chip: 'bg-chip-teal',
        iconColor: 'text-accent-teal',
    },
    {
        title: 'Simulări examen',
        text: 'Examene de probă, corectate pe barem.',
        icon: IconChecklist,
        chip: 'bg-chip-magenta',
        iconColor: 'text-accent-magenta',
    },
    {
        title: 'Rapoarte progres',
        text: 'Vedeți clar unde e copilul și ce urmează.',
        icon: IconReport,
        chip: 'bg-chip-lime',
        iconColor: 'text-accent-lime',
    },
];
</script>

<template>
    <section class="border-brand/10 bg-brand-tint border-b">
        <div class="mx-auto max-w-6xl px-5 py-12 sm:px-6">
            <h2 class="text-brand-ink mb-5 text-center text-xl font-semibold">
                Cum lucrăm
            </h2>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="pillar in pillars"
                    :key="pillar.title"
                    class="border-brand/15 rounded-xl border bg-white p-3.5 text-center"
                >
                    <span
                        class="mb-2 inline-flex h-9 w-9 items-center justify-center rounded-full"
                        :class="[pillar.chip, pillar.iconColor]"
                    >
                        <component :is="pillar.icon" :size="20" :stroke="2" />
                    </span>
                    <div class="text-brand-ink mb-1 text-[13px] font-semibold">
                        {{ pillar.title }}
                    </div>
                    <div class="text-brand-muted text-[11px] leading-snug">
                        {{ pillar.text }}
                    </div>
                </article>
            </div>
        </div>
    </section>
</template>
