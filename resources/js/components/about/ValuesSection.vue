<script setup lang="ts">
import { IconCircleCheck, IconHeart, IconStar } from '@tabler/icons-vue';
import type { Component } from 'vue';

interface Value {
    icon: Component;
    iconColor: string;
    iconBg: string;
    title: string;
    text: string;
}

const values: Value[] = [
    {
        icon: IconStar,
        iconColor: 'text-brand-magenta',
        iconBg: 'bg-brand-magenta/[0.12]',
        title: 'Rigoare de universitate',
        text: 'Aceeași exigență cu care am predat la facultate și am făcut cercetare — adaptată pe înțelesul fiecărei vârste.',
    },
    {
        icon: IconHeart,
        iconColor: 'text-accent-teal',
        iconBg: 'bg-accent-teal/[0.16]',
        title: 'Răbdare și încredere',
        text: 'Respect ritmul fiecărui copil și construiesc întâi încrederea. Fără frică de greșeală nu există învățare reală.',
    },
    {
        icon: IconCircleCheck,
        iconColor: 'text-brand-indigo',
        iconBg: 'bg-brand-indigo/10',
        title: 'Gândire, nu memorare',
        text: 'Țelul nu e să rețină formule, ci să gândească matematic — o abilitate care îi rămâne mult după ultimul examen.',
    },
];
</script>

<template>
    <section class="py-16 md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    Cum predau
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Ce înseamnă asta pentru copilul tău
                </h2>
            </div>

            <!-- Values -->
            <div class="mt-[46px] grid gap-[22px] md:grid-cols-3">
                <article
                    v-for="value in values"
                    :key="value.title"
                    class="rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-7 transition duration-200 hover:-translate-y-1 hover:shadow-[0_24px_44px_-30px_rgba(17,14,43,0.4)]"
                >
                    <div
                        class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl"
                        :class="value.iconBg"
                    >
                        <component
                            :is="value.icon"
                            :size="22"
                            stroke="1.7"
                            :class="value.iconColor"
                        />
                    </div>
                    <h4
                        class="mb-2 text-[18px] font-bold text-brand-indigo-dark-2"
                    >
                        {{ value.title }}
                    </h4>
                    <p class="text-[14.5px] leading-[1.6] text-brand-muted">
                        {{ value.text }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>
