<script setup lang="ts"></script>

<template>
    <section class="border-b border-brand-indigo-dark-2/10">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 py-16 sm:px-6 md:grid-cols-[1.05fr_0.95fr] md:py-[70px]"
        >
            <!-- Copy -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-brand-magenta"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    Despre · fondatoarea Mindventure
                </span>

                <h1
                    class="mt-[22px] text-[clamp(40px,5.2vw,64px)] leading-[1.03] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
                >
                    Denisa Diaconescu
                </h1>

                <div
                    class="mt-3.5 text-[18px] font-semibold text-brand-magenta"
                >
                    Conferențiar la Universitatea din București · Doctor în
                    matematică
                </div>

                <p
                    class="mt-[18px] max-w-[32em] text-[18px] leading-relaxed text-brand-muted"
                >
                    Din 2008 am ghidat generații întregi de tineri — în România
                    și la Universitatea din Berna. Dar dincolo de diplome și
                    articole științifice, sunt și mamă. Și când ești și
                    profesor, și părinte, vezi altfel lucrurile.
                </p>

                <div class="mt-[30px] flex flex-wrap gap-3.5">
                    <a
                        href="#cunoaste"
                        class="rounded-xl bg-brand-magenta px-[22px] py-[13px] text-[15px] font-semibold text-white transition-opacity hover:opacity-90"
                        >Cunoaște-mă la o evaluare</a
                    >
                    <a
                        href="https://cs.unibuc.ro/~ddiaconescu/"
                        target="_blank"
                        rel="noopener"
                        class="rounded-xl border-[1.5px] border-brand-indigo-dark-2/12 px-[22px] py-[13px] text-[15px] font-semibold text-brand-indigo-dark-2 transition-colors hover:border-brand-indigo-dark-2"
                        >Parcurs academic</a
                    >
                </div>
            </div>

            <!-- Portrait -->
            <div class="relative mx-auto w-full max-w-[440px] md:ml-auto">
                <span
                    class="absolute -top-5 -left-5 z-0 h-[46%] w-[46%] rounded-[18px] bg-brand-lime"
                />
                <span
                    class="absolute -right-[22px] -bottom-[22px] z-0 h-[62%] w-[62%] rounded-[20px] bg-brand-magenta"
                />
                <figure
                    class="relative z-[2] overflow-hidden rounded-[20px] border border-brand-indigo-dark-2/[0.06] shadow-[0_34px_64px_-34px_rgba(17,14,43,0.55)]"
                >
                    <img
                        src="/images/20251126_183442.webp"
                        alt="Denisa Diaconescu"
                        class="block aspect-[4/5] w-full object-cover"
                    />
                </figure>
            </div>
        </div>
    </section>
</template>
