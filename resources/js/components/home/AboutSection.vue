<script setup lang="ts">
import { IconUser } from '@tabler/icons-vue';

const badges = ['Profesor IB', '10+ ani', 'AA & AI · SL & HL'];
</script>

<template>
    <section id="despre" class="border-brand/10 bg-brand-tint border-b">
        <div
            class="mx-auto flex max-w-6xl flex-col items-center gap-5 px-5 py-12 sm:px-6 md:flex-row md:gap-8"
        >
            <!-- Înlocuiește cu fotografia ta -->
            <div
                class="border-brand/30 bg-chip-indigo text-brand/70 flex h-24 w-24 shrink-0 items-center justify-center rounded-full border border-dashed"
            >
                <IconUser :size="30" stroke="1.6" />
            </div>

            <div class="flex-1">
                <h2 class="text-brand-ink mb-1.5 text-lg font-semibold">
                    Cine predă
                </h2>
                <p class="text-brand-body mb-2.5 text-[15px] leading-relaxed">
                    [Nume], profesor de matematică specializat în programa IB de
                    peste 10 ani. Predau atât AA cât și AI, la SL și HL, cu
                    accent pe rezultate concrete la examen.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span
                        v-for="badge in badges"
                        :key="badge"
                        class="border-brand/25 text-brand rounded-md border px-2.5 py-1 text-[11px]"
                        >{{ badge }}</span
                    >
                </div>
            </div>
        </div>
    </section>
</template>
