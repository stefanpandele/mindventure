<script setup lang="ts">
import { IconPlayerPlayFilled } from '@tabler/icons-vue';
</script>

<template>
    <section class="border-brand/10 border-b">
        <div
            class="mx-auto flex max-w-6xl flex-col items-center gap-8 px-5 py-12 sm:px-6 md:flex-row md:gap-10 md:py-16"
        >
            <div class="flex flex-1 flex-col gap-4">
                <span
                    class="text-brand-indigo border-brand-indigo-dark-2/12 inline-flex w-fit items-center gap-[9px] rounded-full border bg-white px-3.5 py-[7px] text-[12.5px] font-semibold"
                >
                    <span class="bg-brand-magenta inline-block h-[7px] w-[7px] rounded-[2px]" />
                    International Baccalaureate · Matematică
                </span>

                <h1
                    class="text-brand-indigo-dark-2 text-4xl font-bold tracking-[-0.025em] leading-[1.02] sm:text-6xl"
                >
                    Matematica IB,<br />predată ca să<br />ajungă la
                    <span class="text-brand-magenta relative inline-block">
                        <span class="relative z-10">7</span>
                        <span
                            class="bg-brand-lime absolute -right-1.5 -left-1.5 bottom-[0.08em] h-[0.34em] -rotate-[1.5deg] rounded-[3px]"
                        />
                    </span>
                    <span class="relative z-11">.</span>
                </h1>

                <p class="text-brand-body/90 max-w-xl text-[17px] leading-relaxed text-justify">
                    Pregătire specializată pentru Analysis &amp; Approaches și
                    Applications &amp; Interpretation, la nivel SL și HL. Pentru
                    liceenii care vor nota de care depinde admiterea la
                    universitate.
                </p>

                <div class="mt-2 flex flex-wrap gap-3">
                    <a
                        href="#rezerva"
                        class="bg-brand-indigo rounded-md px-5 py-2.5 text-[15px] font-semibold text-white transition-opacity hover:opacity-90"
                        >Rezervă o sesiune de evaluare</a
                    >
                    <a
                        href="#video"
                        class="border-brand/30 text-brand hover:bg-brand-tint rounded-md border bg-white px-5 py-2.5 text-[15px] font-semibold transition-colors"
                        >Vezi lecții gratuite</a
                    >
                </div>
            </div>

            <!-- Hero media -->
            <div class="w-full flex-1">
                <div
                    class="group relative flex aspect-[4/3.05] items-center justify-center overflow-hidden rounded-[18px] border border-[rgba(17,14,43,0.2)] bg-[linear-gradient(150deg,#110E2B_0%,#1B1740_60%,#342C81_130%)] shadow-[0_30px_60px_-34px_rgba(17,14,43,0.6)] before:absolute before:inset-0 before:bg-[radial-gradient(circle_at_70%_18%,rgba(72,197,183,0.35),transparent_45%),radial-gradient(circle_at_22%_88%,rgba(218,26,125,0.28),transparent_42%)] before:opacity-50 before:content-['']"
                >
                    <!-- Chip -->
                    <span
                        class="absolute top-4 left-4 z-[2] rounded-lg border border-[rgba(245,243,237,0.16)] bg-[rgba(17,14,43,0.55)] px-2.5 py-1.5 font-mono text-[11px] font-bold tracking-[0.08em] text-[#C9DB0D] uppercase backdrop-blur-[6px]"
                    >
                        Lecție IB · demo
                    </span>

                    <!-- Play -->
                    <div
                        class="bg-paper relative z-[2] flex h-[74px] w-[74px] items-center justify-center rounded-full shadow-[0_12px_36px_-8px_rgba(0,0,0,0.5)] transition-transform group-hover:scale-[1.07]"
                    >
                        <IconPlayerPlayFilled
                            :size="26"
                            class="ml-1 text-[#110E2B]"
                        />
                    </div>

                    <!-- Caption -->
                    <span
                        class="absolute bottom-4 left-[18px] z-[2] text-[13px] text-[rgba(245,243,237,0.62)]"
                    >
                        Derivate, explicate ca să rămână.
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>
