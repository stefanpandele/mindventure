<script setup lang="ts">
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';

interface Testimonial {
    quote: string;
    name: string;
    role: string;
    avatarBg: string;
}

const testimonials: Testimonial[] = [
    {
        quote: 'A trecut de la 4 la 6 într-un semestru. Pentru prima dată înțelege ce face la mate.',
        name: 'Părinte · AA HL',
        role: 'elev clasa a XI-a',
        avatarBg: 'bg-accent-teal',
    },
    {
        quote: 'Rapoartele de progres ne-au dat liniște — vedem exact unde e și ce mai are de lucru.',
        name: 'Părinte · AI SL',
        role: 'elev clasa a XII-a',
        avatarBg: 'bg-brand-magenta',
    },
    {
        quote: 'Explică pe înțelesul lui, nu doar „așa se face”. A început să rezolve singur și are încredere la teze.',
        name: 'Părinte · AA SL',
        role: 'elev clasa a XI-a',
        avatarBg: 'bg-brand',
    },
    {
        quote: 'Ne-a ajutat enorm la IA — știam exact ce avem de făcut la fiecare pas până la predare.',
        name: 'Părinte · AI HL',
        role: 'elev clasa a XII-a',
        avatarBg: 'bg-brand-lime',
    },
];

const PER_PAGE = 2;
const AUTOPLAY_MS = 5000;

const pages = computed<Testimonial[][]>(() => {
    const result: Testimonial[][] = [];
    for (let i = 0; i < testimonials.length; i += PER_PAGE) {
        result.push(testimonials.slice(i, i + PER_PAGE));
    }
    return result;
});

const isCarousel = computed(() => pages.value.length > 1);
const current = ref(0);
const progress = ref(0); // 0..1 elapsed within the current page

let rafId: number | undefined;
let lastTs: number | undefined;

function frame(ts: number): void {
    if (lastTs === undefined) {
        lastTs = ts;
    }
    progress.value += (ts - lastTs) / AUTOPLAY_MS;
    lastTs = ts;

    if (progress.value >= 1) {
        progress.value = 0;
        current.value = (current.value + 1) % pages.value.length;
    }
    rafId = requestAnimationFrame(frame);
}

function stop(): void {
    if (rafId !== undefined) {
        cancelAnimationFrame(rafId);
        rafId = undefined;
    }
    lastTs = undefined;
}

function start(): void {
    stop();
    if (isCarousel.value) {
        rafId = requestAnimationFrame(frame);
    }
}

function goTo(index: number): void {
    current.value = index;
    progress.value = 0;
    start();
}

onMounted(start);
onBeforeUnmount(stop);
</script>

<template>
    <section class="py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Head (centered) -->
            <div class="text-center">
                <span
                    class="text-brand-indigo-dark-2 inline-flex items-center justify-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                >
                    <span
                        class="bg-brand-magenta inline-block h-[7px] w-[7px] rounded-[2px]"
                    />
                    Părinți
                </span>
                <h2
                    class="text-brand-indigo-dark-2 mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em]"
                >
                    Ce spun părinții
                </h2>
            </div>

            <!-- Quotes (carousel when more than one page) -->
            <div
                class="mt-11 overflow-hidden"
                @mouseenter="stop"
                @mouseleave="start"
            >
                <div
                    class="flex transition-transform duration-500 ease-out motion-reduce:transition-none"
                    :style="{ transform: `translateX(-${current * 100}%)` }"
                >
                    <div
                        v-for="(page, pageIndex) in pages"
                        :key="pageIndex"
                        class="w-full shrink-0"
                    >
                        <div class="grid gap-[22px] md:grid-cols-2">
                            <figure
                                v-for="t in page"
                                :key="t.name"
                                class="border-brand-indigo-dark-2/12 relative overflow-hidden rounded-[18px] border bg-white p-8"
                            >
                                <div
                                    class="text-brand-lime h-7 text-[64px] leading-[0.5] font-extrabold"
                                >
                                    &ldquo;
                                </div>
                                <blockquote
                                    class="text-brand-indigo-dark-2 mt-2 mb-6 text-[18px] leading-[1.55] font-medium"
                                >
                                    {{ t.quote }}
                                </blockquote>
                                <figcaption class="flex items-center gap-[13px]">
                                    <span
                                        class="h-[42px] w-[42px] shrink-0 rounded-full"
                                        :class="t.avatarBg"
                                    />
                                    <div>
                                        <div
                                            class="text-brand-indigo-dark-2 text-[14.5px] font-semibold"
                                        >
                                            {{ t.name }}
                                        </div>
                                        <div class="text-brand-muted text-[13px]">
                                            {{ t.role }}
                                        </div>
                                    </div>
                                </figcaption>

                                <!-- Autoplay countdown band -->
                                <div
                                    v-if="isCarousel"
                                    class="bg-brand-indigo-dark-2/10 absolute right-0 bottom-0 left-0 h-1"
                                >
                                    <div
                                        class="bg-brand-magenta h-full"
                                        :style="{
                                            width: `${(pageIndex === current ? progress : 0) * 100}%`,
                                        }"
                                    />
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dots -->
            <div
                v-if="isCarousel"
                class="mt-7 flex justify-center gap-2"
                role="tablist"
            >
                <button
                    v-for="(page, pageIndex) in pages"
                    :key="pageIndex"
                    type="button"
                    class="h-2 cursor-pointer rounded-full transition-all"
                    :class="
                        pageIndex === current
                            ? 'bg-brand-indigo-dark-2 w-6'
                            : 'bg-brand-indigo-dark-2/25 w-2'
                    "
                    :aria-label="`Testimoniale, pagina ${pageIndex + 1}`"
                    :aria-selected="pageIndex === current"
                    @click="goTo(pageIndex)"
                />
            </div>
        </div>
    </section>
</template>
