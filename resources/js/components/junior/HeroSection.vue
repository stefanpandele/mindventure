<script setup lang="ts"></script>

<template>
    <section class="relative overflow-hidden border-b border-brand/10">
        <div
            class="mx-auto grid max-w-6xl items-center gap-12 px-5 py-12 sm:px-6 md:grid-cols-2 md:py-16"
        >
            <!-- Copy -->
            <div class="flex flex-col gap-0">
                <span
                    class="inline-flex w-fit items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-brand-indigo"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-lime"
                    />
                    Junior · clasele 2–8
                </span>

                <h1
                    class="mt-[22px] text-4xl leading-[1.03] font-bold tracking-[-0.025em] text-brand-indigo-dark-2 sm:text-[clamp(40px,5.2vw,64px)]"
                >
                    Matematica, pe placul lor —
                    <span class="relative inline-block">
                        <span class="relative z-10">de la clasa a 2-a</span>
                        <span
                            class="absolute -right-1 bottom-[0.07em] -left-1 h-[0.34em] -rotate-[1.8deg] rounded-[3px] bg-brand-lime"
                        />
                    </span>
                    .
                </h1>

                <p
                    class="mt-[22px] max-w-[31em] text-[18px] leading-relaxed text-brand-body"
                >
                    Construim baza și încrederea devreme, cât încă e ușor — prin
                    jocuri, obiecte și explicații pe înțelesul lor. Așa,
                    matematica nu apucă să devină „materia grea".
                </p>

                <div class="mt-[30px] flex flex-wrap gap-3.5">
                    <a
                        href="#rezerva"
                        class="rounded-xl bg-brand-indigo px-5 py-3 text-[15px] font-semibold text-paper transition-opacity hover:opacity-90"
                        >Rezervă o evaluare gratuită</a
                    >
                    <a
                        href="#cum-lucram"
                        class="rounded-xl border-[1.5px] border-brand-indigo-dark-2/12 px-5 py-3 text-[15px] font-semibold text-brand-indigo-dark-2 transition-colors hover:border-brand-indigo-dark-2"
                        >Cum lucrăm</a
                    >
                </div>

                <div
                    class="mt-[26px] flex items-center gap-2.5 text-[13.5px] text-brand-muted"
                >
                    <span class="flex">
                        <span
                            class="h-[26px] w-[26px] rounded-full border-2 border-paper bg-brand-magenta"
                        />
                        <span
                            class="-ml-2 h-[26px] w-[26px] rounded-full border-2 border-paper bg-brand-lime"
                        />
                        <span
                            class="-ml-2 h-[26px] w-[26px] rounded-full border-2 border-paper bg-accent-teal"
                        />
                    </span>
                    Grupe mici și sesiuni 1:1, pe ritmul fiecărui copil.
                </div>
            </div>

            <!-- Photo collage -->
            <div
                class="relative mx-auto aspect-square w-full max-w-[480px] md:ml-auto"
            >
                <div
                    class="absolute -top-[10%] -left-[10%] z-0 h-[120%] w-[120%] bg-[radial-gradient(circle_at_70%_30%,rgba(201,219,13,0.28),transparent_50%),radial-gradient(circle_at_25%_80%,rgba(218,26,125,0.18),transparent_50%)]"
                />
                <figure
                    class="absolute top-[2%] right-0 z-[2] w-[74%] rotate-[3deg] rounded-lg border border-[rgba(17,14,43,0.06)] bg-white p-[9px] pb-[13px] shadow-[0_18px_40px_-20px_rgba(17,14,43,0.45)]"
                >
                    <img
                        src="/images/junior/hero-1.webp"
                        alt="Sticker „math is easy” pe caiet"
                        class="block w-full rounded-[4px] object-cover"
                    />
                    <figcaption
                        class="mt-2 text-center font-mono text-[11px] tracking-[0.02em] text-brand-muted"
                    >
                        math is easy ✏️
                    </figcaption>
                </figure>
                <figure
                    class="absolute bottom-0 left-0 z-[3] w-[54%] -rotate-[5deg] rounded-lg border border-[rgba(17,14,43,0.06)] bg-white p-[9px] pb-[13px] shadow-[0_18px_40px_-20px_rgba(17,14,43,0.45)]"
                >
                    <img
                        src="/images/junior/hero-2.webp"
                        alt="Roți de înmulțire colorate"
                        class="block w-full rounded-[4px] object-cover"
                    />
                    <figcaption
                        class="mt-2 text-center font-mono text-[11px] tracking-[0.02em] text-brand-muted"
                    >
                        tabla înmulțirii, altfel
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
</template>
