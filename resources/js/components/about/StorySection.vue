<script setup lang="ts"></script>

<template>
    <section class="py-16 md:py-[90px]">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 sm:px-6 md:grid-cols-[1fr_0.85fr] md:gap-[60px]"
        >
            <!-- Text -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    Povestea mea
                </span>
                <h2
                    class="mt-4 mb-[22px] text-[clamp(28px,3.4vw,40px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    De ce am creat Mindventure
                </h2>
                <p
                    class="mb-[18px] max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    Am făcut cercetare și am predat matematică ani la rând — în
                    universitate și în industrie, de la logică și metode formale
                    până la sisteme din lumea reală. Mi-am construit cariera pe
                    ideea că problemele grele au, aproape mereu, o soluție
                    elegantă.
                </p>
                <p
                    class="mb-[18px] max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    După ani petrecuți în universitate și în cercetare, am
                    descoperit ceva:
                    <strong class="font-semibold text-brand-indigo-dark-2"
                        >adevărata valoare a matematicii nu stă în rezultate, ci
                        în felul în care îți modelează gândirea.</strong
                    >
                </p>
                <p
                    class="max-w-[38em] text-[16.5px] leading-[1.7] text-brand-muted"
                >
                    De aceea am creat Mindventure — un spațiu unde ne conectăm
                    cu copiii, le câștigăm încrederea, respectăm ritmul
                    fiecăruia și le arătăm că matematica e frumoasă, logică și
                    vie.
                </p>
            </div>

            <!-- Photo -->
            <div class="relative">
                <figure
                    class="rotate-[1.5deg] overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/[0.06] shadow-[0_30px_60px_-34px_rgba(17,14,43,0.5)]"
                >
                    <img
                        src="/images/20251126_162502.webp"
                        alt="Denisa Diaconescu la lucru"
                        class="block w-full object-cover"
                    />
                </figure>
                <span
                    class="absolute -bottom-4 -left-3 -rotate-3 rounded-[10px] bg-brand-lime px-3.5 py-[9px] font-mono text-[12px] font-bold text-brand-indigo-dark-2 shadow-[0_10px_24px_-12px_rgba(17,14,43,0.4)]"
                >
                    la lucru ✦
                </span>
            </div>
        </div>
    </section>
</template>
