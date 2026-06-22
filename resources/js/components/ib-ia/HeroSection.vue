<script setup lang="ts">
interface ScoreRow {
    name: string;
    mark: number;
    width: string;
    key: boolean;
}

const scoreRows: ScoreRow[] = [
    { name: 'A · Prezentare', mark: 4, width: '66%', key: false },
    { name: 'B · Comunicare matematică', mark: 4, width: '66%', key: true },
    { name: 'C · Implicare personală', mark: 3, width: '50%', key: true },
    { name: 'D · Reflecție', mark: 3, width: '50%', key: true },
    { name: 'E · Utilizarea matematicii', mark: 6, width: '100%', key: false },
];
</script>

<template>
    <section class="border-b border-brand/10">
        <div
            class="mx-auto grid max-w-6xl items-center gap-10 px-5 py-12 sm:px-6 md:grid-cols-2 md:py-16"
        >
            <!-- Copy -->
            <div class="flex flex-col gap-4">
                <span
                    class="inline-flex w-fit items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-accent-teal"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    IA Lab · Suport Internal Assessment
                </span>

                <h1
                    class="text-4xl leading-[1.02] font-bold tracking-[-0.025em] text-brand-indigo-dark-2 sm:text-[clamp(40px,5vw,62px)]"
                >
                    IA-ul tău e
                    <span class="relative inline-block text-accent-teal">
                        <span class="relative z-10">20%</span>
                        <span
                            class="absolute -right-1 bottom-[0.08em] -left-1 h-[0.3em] -rotate-[1.5deg] rounded-[3px] bg-brand-lime"
                        />
                    </span>
                    din notă. Hai să-l facem să conteze.
                </h1>

                <p
                    class="max-w-xl text-justify text-[17px] leading-relaxed text-brand-body/90"
                >
                    Explorarea matematică e singura parte din nota IB pe care o
                    construiești luni întregi, în liniște, înainte de examen. Te
                    ghidăm de la temă până la forma finală — criteriu cu
                    criteriu, exact cum gândește examinatorul.
                </p>

                <div class="mt-2 flex flex-wrap gap-3">
                    <a
                        href="#rezerva"
                        class="rounded-md bg-accent-teal px-5 py-2.5 text-[15px] font-semibold text-brand-indigo-dark-2 transition-opacity hover:opacity-90"
                        >Rezervă o sesiune IA</a
                    >
                    <a
                        href="#cum-lucram"
                        class="rounded-md border border-brand-indigo-dark-2/20 bg-white px-5 py-2.5 text-[15px] font-semibold text-brand-indigo-dark-2 transition-colors hover:border-brand-indigo-dark-2"
                        >Vezi cum lucrăm</a
                    >
                </div>
            </div>

            <!-- Scorecard -->
            <div
                class="relative overflow-hidden rounded-[18px] border border-[rgba(17,14,43,0.2)] bg-[linear-gradient(155deg,#110E2B_0%,#1B1740_70%,#342C81_140%)] p-[30px] text-paper shadow-[0_30px_60px_-34px_rgba(17,14,43,0.6)] before:absolute before:inset-0 before:bg-[radial-gradient(circle_at_80%_10%,rgba(72,197,183,0.35),transparent_45%)] before:opacity-50 before:content-['']"
            >
                <div class="relative z-[2] flex items-start justify-between">
                    <div>
                        <div
                            class="font-mono text-[11px] font-bold tracking-[0.1em] text-accent-teal uppercase"
                        >
                            Fișă de evaluare
                        </div>
                        <div class="mt-1.5 text-[18px] font-bold">
                            Mathematical Exploration
                        </div>
                    </div>
                    <div class="text-right">
                        <div
                            class="font-mono text-[42px] leading-none font-bold"
                        >
                            /20
                        </div>
                        <div class="mt-0.5 text-[12px] text-paper/60">
                            20% din notă
                        </div>
                    </div>
                </div>

                <div class="relative z-[2] mt-6 flex flex-col gap-[13px]">
                    <div v-for="row in scoreRows" :key="row.name">
                        <div class="flex items-center justify-between gap-3">
                            <span class="text-[13px] text-paper/85">
                                {{ row.name }}
                            </span>
                            <span class="font-mono text-[13px] font-bold">
                                {{ row.mark }}
                            </span>
                        </div>
                        <div
                            class="mt-1 h-[7px] overflow-hidden rounded-[4px] bg-paper/10"
                        >
                            <div
                                class="h-full rounded-[4px]"
                                :class="
                                    row.key ? 'bg-accent-teal' : 'bg-paper/30'
                                "
                                :style="{ width: row.width }"
                            />
                        </div>
                    </div>
                </div>

                <div
                    class="relative z-[2] mt-[22px] border-t border-[rgba(245,243,237,0.16)] pt-[18px] text-[12.5px] text-paper/60"
                >
                    Punctele decisive (în
                    <b class="text-brand-lime">teal</b>) se câștigă la B, C și D
                    — nu la matematică.
                </div>
            </div>
        </div>
    </section>
</template>
