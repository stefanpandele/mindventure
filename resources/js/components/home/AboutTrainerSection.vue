<script setup lang="ts">
const tags = ['Profesor universitar', 'AA & AI · SL & HL', 'IB & clasele 2–8'];
</script>

<template>
    <section id="despre" class="bg-[#edeae0] py-[64px] md:py-[90px]">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 sm:px-6 md:grid-cols-[320px_1fr]"
        >
            <!-- Photo -->
            <div
                class="relative mx-auto aspect-square w-full max-w-[320px] overflow-hidden rounded-[20px] bg-[linear-gradient(160deg,#342C81,#DA1A7D)] shadow-[0_30px_60px_-34px_rgba(52,44,129,0.7)]"
            >
                <span
                    class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(72,197,183,0.5),transparent_50%)]"
                />
                <span
                    class="absolute inset-0 z-[2] flex items-center justify-center text-[96px] leading-none font-extrabold text-paper/90"
                >
                    M
                </span>
            </div>

            <!-- Body -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand"
                    />
                    Cine predă
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.2vw,38px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Profesor universitar, nu meditator generalist
                </h2>
                <p
                    class="mt-[18px] max-w-[42em] text-[17px] leading-[1.65] text-brand-body"
                >
                    Matematica e predată de un profesor universitar, specializat
                    în programa IB. Acoperă atât Analysis &amp; Approaches cât
                    și Applications &amp; Interpretation, la SL și HL, cu accent
                    pe rezultate concrete la examen.
                </p>
                <div class="mt-6 flex flex-wrap gap-2.5">
                    <span
                        v-for="tag in tags"
                        :key="tag"
                        class="rounded-full border-[1.5px] border-brand-indigo-dark-2 px-3.5 py-2 font-mono text-[12px] font-bold tracking-[0.04em] text-brand-indigo-dark-2"
                    >
                        {{ tag }}
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>
