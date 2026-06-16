<script setup lang="ts">
import { IconWorld, IconPlayerPlay } from '@tabler/icons-vue';
</script>

<template>
    <section class="border-brand/10 border-b">
        <div
            class="mx-auto flex max-w-6xl flex-col items-center gap-8 px-5 py-12 sm:px-6 md:flex-row md:gap-10 md:py-16"
        >
            <div class="flex flex-1 flex-col gap-4">
                <span
                    class="bg-chip-indigo text-brand inline-flex w-fit items-center gap-1.5 rounded-md px-2.5 py-1 text-[11px] font-medium"
                >
                    <IconWorld :size="14" stroke="2" />
                    International Baccalaureate · Matematică
                </span>

                <h1
                    class="text-brand-ink text-3xl leading-tight font-semibold sm:text-4xl"
                >
                    Matematica IB, predată ca să ajungă la 7.
                </h1>

                <p class="text-brand-body max-w-xl text-[15px] leading-relaxed">
                    Pregătire specializată pentru Analysis &amp; Approaches și
                    Applications &amp; Interpretation, la nivel SL și HL. Pentru
                    liceenii care vor nota de care depinde admiterea la
                    universitate.
                </p>

                <div class="mt-2 flex flex-wrap gap-3">
                    <a
                        href="#rezerva"
                        class="bg-brand rounded-md px-5 py-2.5 text-[13px] font-semibold text-white transition-opacity hover:opacity-90"
                        >Rezervă o sesiune de evaluare</a
                    >
                    <a
                        href="#video"
                        class="border-brand/30 text-brand hover:bg-brand-tint rounded-md border bg-white px-5 py-2.5 text-[13px] font-semibold transition-colors"
                        >Vezi lecții gratuite</a
                    >
                </div>
            </div>

            <!-- Hero media -->
            <div class="w-full flex-1">
                <div
                    class="border-brand/25 bg-brand-tint text-brand-muted flex aspect-video flex-col items-center justify-center gap-2 rounded-xl border border-dashed"
                >
                    <IconPlayerPlay :size="34" stroke="1.6" />
                    <span class="text-[13px]">Video hero (lecție IB)</span>
                </div>
            </div>
        </div>
    </section>
</template>
