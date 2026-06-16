<script setup lang="ts">
import { IconMathFunction, IconChartDots, IconHelp } from '@tabler/icons-vue';
import type { Component } from 'vue';

interface Track {
    name: string;
    audience: string;
    description: string;
    icon: Component;
    chip: string;
    iconColor: string;
    levelColor: string;
    levelBorder: string;
}

const tracks: Track[] = [
    {
        name: 'Analysis & Approaches',
        audience: 'profiluri matematice & STEM',
        description:
            'Algebră, funcții, calcul diferențial și integral, demonstrații. Traseul cerut de facultățile competitive.',
        icon: IconMathFunction,
        chip: 'bg-chip-indigo',
        iconColor: 'text-brand',
        levelColor: 'text-brand',
        levelBorder: 'border-brand/25',
    },
    {
        name: 'Applications & Interpretation',
        audience: 'științe sociale, business, design',
        description:
            'Statistică, modelare și matematică aplicată în contexte reale. Pentru profiluri umaniste și economice.',
        icon: IconChartDots,
        chip: 'bg-chip-teal',
        iconColor: 'text-accent-teal',
        levelColor: 'text-accent-teal',
        levelBorder: 'border-accent-teal/40',
    },
];
</script>

<template>
    <section id="program" class="border-brand/10 border-b">
        <div class="mx-auto max-w-6xl px-5 py-12 sm:px-6">
            <h2 class="text-brand-ink text-xl font-semibold">
                Acoperim toată matematica IB
            </h2>
            <p class="text-brand-body mt-1.5 mb-5 text-[15px] leading-relaxed">
                Indiferent de traseul copilului, îl pregătim pentru examenul
                real — cu accent pe ce se punctează efectiv în bareme.
            </p>

            <div class="grid gap-4 md:grid-cols-2">
                <article
                    v-for="track in tracks"
                    :key="track.name"
                    class="border-brand/15 rounded-xl border bg-white p-4"
                >
                    <div class="mb-2 flex items-center gap-3">
                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-full"
                            :class="[track.chip, track.iconColor]"
                        >
                            <component
                                :is="track.icon"
                                :size="20"
                                :stroke="2"
                            />
                        </span>
                        <div>
                            <div class="text-brand-ink text-sm font-semibold">
                                {{ track.name }}
                            </div>
                            <div class="text-brand-muted text-[11px]">
                                {{ track.audience }}
                            </div>
                        </div>
                    </div>

                    <p class="text-brand-body mb-3 text-xs leading-relaxed">
                        {{ track.description }}
                    </p>

                    <div class="flex gap-2">
                        <span
                            v-for="level in ['SL', 'HL']"
                            :key="level"
                            class="flex-1 rounded-md border py-1.5 text-center text-xs"
                            :class="[track.levelBorder, track.levelColor]"
                            >{{ level }}</span
                        >
                    </div>
                </article>
            </div>

            <!-- Helper for parents unsure of the level -->
            <div
                class="border-brand/30 mt-3 flex items-center gap-2.5 rounded-lg border border-dashed bg-[#fafafe] px-3.5 py-3"
            >
                <IconHelp :size="18" stroke="2" class="text-brand shrink-0" />
                <p class="text-brand-body text-xs">
                    Nu știți ce nivel i se potrivește copilului? La evaluare îl
                    testăm și vă recomandăm traseul potrivit pentru obiectivul
                    lui de admitere.
                </p>
            </div>
        </div>
    </section>
</template>
