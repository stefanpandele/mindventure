<script setup lang="ts">
import {
    IconActivity,
    IconClipboardList,
    IconFileCheck,
    IconShieldCheck,
} from '@tabler/icons-vue';
import type { Component } from 'vue';

interface Deliverable {
    icon: Component;
    iconColor: string;
    title: string;
    text: string;
}

const deliverables: Deliverable[] = [
    {
        icon: IconFileCheck,
        iconColor: 'text-brand-indigo',
        title: 'Validare temă',
        text: 'Verificăm dacă ideea ta „are matematică" suficientă pentru nivelul tău, înainte să pierzi săptămâni pe ea.',
    },
    {
        icon: IconClipboardList,
        iconColor: 'text-brand-magenta',
        title: 'Plan pe criterii',
        text: 'O structură clară, împărțită pe cele cinci criterii, cu un buget de pagini pentru fiecare parte.',
    },
    {
        icon: IconActivity,
        iconColor: 'text-accent-teal',
        title: 'Feedback pe barem',
        text: 'Comentarii criteriu cu criteriu pe ce ai scris, cu ce câștigă și ce pierde puncte — pe limbajul examinatorului.',
    },
    {
        icon: IconShieldCheck,
        iconColor: 'text-accent-lime',
        title: 'Moderare de probă',
        text: 'Un punctaj estimativ înainte de predare, ca să știi unde stai și să nu fii surprins de moderarea reală.',
    },
];
</script>

<template>
    <section id="ce-primesti" class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    Ce primești
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Concret, ce iei dintr-o sesiune IA
                </h2>
            </div>

            <!-- Cards -->
            <div class="mt-11 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="deliverable in deliverables"
                    :key="deliverable.title"
                    class="rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-[26px] transition duration-200 hover:-translate-y-1 hover:shadow-[0_24px_44px_-30px_rgba(17,14,43,0.4)]"
                >
                    <div
                        class="mb-4 flex h-[42px] w-[42px] items-center justify-center rounded-[11px] bg-[#edeae0]"
                    >
                        <component
                            :is="deliverable.icon"
                            :size="20"
                            stroke="1.7"
                            :class="deliverable.iconColor"
                        />
                    </div>
                    <h4
                        class="mb-[7px] text-[17px] font-bold text-brand-indigo-dark-2"
                    >
                        {{ deliverable.title }}
                    </h4>
                    <p class="text-[13.5px] leading-[1.55] text-brand-muted">
                        {{ deliverable.text }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>
