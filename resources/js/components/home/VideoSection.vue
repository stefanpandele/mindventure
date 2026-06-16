<script setup lang="ts">
import { IconPlayerPlay } from '@tabler/icons-vue';

interface Video {
    title: string;
    // url: string  // de adăugat când conectezi YouTube
}

const videos: Video[] = [
    { title: 'Derivate pe scurt — AA HL' },
    { title: 'Distribuția normală — AI SL' },
    { title: 'Cum alegi tema de IA' },
];
</script>

<template>
    <section id="video" class="border-brand/10 border-b">
        <div class="mx-auto max-w-6xl px-5 py-12 sm:px-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-brand-ink text-xl font-semibold">
                    Vezi cum predăm, gratuit
                </h2>
                <a
                    href="#"
                    class="text-brand text-xs font-semibold hover:underline"
                    >Toate lecțiile →</a
                >
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a
                    v-for="video in videos"
                    :key="video.title"
                    href="#"
                    class="group block"
                >
                    <div
                        class="border-brand/10 bg-brand-tint text-brand-muted group-hover:bg-chip-indigo flex aspect-video items-center justify-center rounded-lg border transition-colors"
                    >
                        <IconPlayerPlay :size="26" stroke="1.8" />
                    </div>
                    <div class="text-brand-body mt-1.5 text-xs">
                        {{ video.title }}
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>
