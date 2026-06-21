<script setup lang="ts">
import { IconArrowRight, IconPlayerPlayFilled } from '@tabler/icons-vue';

interface Lesson {
    tag: string;
    title: string;
    meta: string;
    glow: string;
}

const lessons: Lesson[] = [
    {
        tag: 'AA HL',
        title: 'Derivate pe scurt',
        meta: '8 min · trucuri de examen',
        glow: 'bg-[radial-gradient(circle_at_30%_30%,rgba(218,26,125,0.5),transparent_60%)]',
    },
    {
        tag: 'AI SL',
        title: 'Distribuția normală',
        meta: '11 min · cu exemplu rezolvat',
        glow: 'bg-[radial-gradient(circle_at_70%_35%,rgba(72,197,183,0.5),transparent_60%)]',
    },
    {
        tag: 'IA',
        title: 'Cum alegi tema de IA',
        meta: '9 min · ghid practic',
        glow: 'bg-[radial-gradient(circle_at_50%_70%,rgba(201,219,13,0.45),transparent_60%)]',
    },
];
</script>

<template>
    <section id="video" class="py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Head -->
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <span
                        class="text-brand-indigo-dark-2 inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                    >
                        <span
                            class="bg-accent-teal inline-block h-[7px] w-[7px] rounded-[2px]"
                        />
                        Video
                    </span>
                    <h2
                        class="text-brand-indigo-dark-2 mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em]"
                    >
                        Vezi cum predăm, gratuit
                    </h2>
                </div>
                <a
                    href="#"
                    class="text-brand inline-flex items-center gap-1.5 text-[14.5px] font-semibold transition-all hover:gap-[11px]"
                >
                    Toate lecțiile
                    <IconArrowRight :size="16" stroke="1.6" />
                </a>
            </div>

            <!-- Lessons grid -->
            <div class="mt-[38px] grid gap-[22px] sm:grid-cols-2 lg:grid-cols-3">
                <a
                    v-for="lesson in lessons"
                    :key="lesson.title"
                    href="#"
                    class="group block"
                >
                    <div
                        class="border-brand-indigo-dark-2/12 relative flex aspect-[16/10] items-center justify-center overflow-hidden rounded-[14px] border bg-[linear-gradient(150deg,#110E2B_0%,#1B1740_100%)] transition duration-200 group-hover:-translate-y-1 group-hover:shadow-[0_24px_44px_-28px_rgba(17,14,43,0.5)]"
                    >
                        <span
                            class="absolute inset-0 opacity-[0.55]"
                            :class="lesson.glow"
                        />
                        <span
                            class="text-paper absolute top-3 left-3 z-[2] rounded-[7px] border border-[rgba(245,243,237,0.16)] bg-[rgba(17,14,43,0.5)] px-[9px] py-[5px] font-mono text-[10.5px] font-bold tracking-[0.06em]"
                        >
                            {{ lesson.tag }}
                        </span>
                        <div
                            class="relative z-[2] flex h-[54px] w-[54px] items-center justify-center rounded-full bg-[rgba(245,243,237,0.92)]"
                        >
                            <IconPlayerPlayFilled
                                :size="20"
                                class="ml-0.5 text-[#110E2B]"
                            />
                        </div>
                    </div>
                    <div
                        class="text-brand-indigo-dark-2 mt-3.5 text-[15.5px] font-semibold"
                    >
                        {{ lesson.title }}
                    </div>
                    <div class="text-brand-muted mt-[3px] text-[13px]">
                        {{ lesson.meta }}
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>
