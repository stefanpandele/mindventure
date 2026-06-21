<script setup lang="ts">
interface Track {
    name: string;
    audience: string;
    description: string;
    glyph: string;
    topBar: string;
    iconBg: string;
    levelHover: string;
}

const tracks: Track[] = [
    {
        name: 'Analysis & Approaches',
        audience: 'profiluri matematice & STEM',
        description:
            'Algebră, funcții, calcul diferențial și integral, demonstrații. Traseul cerut de facultățile competitive.',
        glyph: 'ƒx',
        topBar: 'bg-brand-magenta',
        iconBg: 'bg-brand-magenta text-white',
        levelHover: 'hover:border-brand-magenta hover:text-brand-magenta',
    },
    {
        name: 'Applications & Interpretation',
        audience: 'științe sociale, business, design',
        description:
            'Statistică, modelare și matematică aplicată în contexte reale. Pentru profiluri umaniste și economice.',
        glyph: '∿',
        topBar: 'bg-accent-teal',
        iconBg: 'bg-accent-teal text-white',
        levelHover: 'hover:border-accent-teal hover:text-accent-teal',
    },
];

const levels = [
    { code: 'SL', name: 'standard' },
    { code: 'HL', name: 'higher' },
];
</script>

<template>
    <section id="program" class="py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[40em]">
                <span
                    class="text-brand-indigo-dark-2 inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                >
                    <span
                        class="bg-brand-magenta inline-block h-[7px] w-[7px] rounded-[2px]"
                    />
                    Program
                </span>
                <h2
                    class="text-brand-indigo-dark-2 mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em]"
                >
                    Acoperim toată matematica IB
                </h2>
                <p class="text-brand-body mt-3.5 text-[17px] leading-relaxed">
                    Indiferent de traseul copilului, îl pregătim pentru examenul
                    real — cu accent pe ce se punctează efectiv în bareme.
                </p>
            </div>

            <!-- Tracks -->
            <div class="mt-11 grid gap-[22px] md:grid-cols-2">
                <article
                    v-for="track in tracks"
                    :key="track.name"
                    class="border-brand-indigo-dark-2/12 relative overflow-hidden rounded-[18px] border bg-white p-[30px] transition-transform duration-200 hover:-translate-y-1 hover:shadow-[0_26px_50px_-30px_rgba(17,14,43,0.4)]"
                >
                    <span
                        class="absolute top-0 right-0 left-0 h-1"
                        :class="track.topBar"
                    />

                    <div class="flex items-center gap-3.5">
                        <span
                            class="flex h-[46px] w-[46px] shrink-0 items-center justify-center rounded-xl text-[19px] font-bold"
                            :class="track.iconBg"
                        >
                            {{ track.glyph }}
                        </span>
                        <div>
                            <h3
                                class="text-brand-indigo-dark-2 text-[20px] font-bold tracking-[-0.01em]"
                            >
                                {{ track.name }}
                            </h3>
                            <div class="text-brand-muted mt-0.5 text-[13px]">
                                {{ track.audience }}
                            </div>
                        </div>
                    </div>

                    <p
                        class="text-brand-body mt-[18px] text-[15px] leading-[1.6]"
                    >
                        {{ track.description }}
                    </p>

                    <div class="mt-[22px] grid grid-cols-2 gap-2.5">
                        <div
                            v-for="level in levels"
                            :key="level.code"
                            class="border-brand-indigo-dark-2/12 text-brand-indigo-dark-2 flex items-center justify-between rounded-[10px] border px-[15px] py-3 font-mono text-[13px] font-bold tracking-[0.04em] transition-colors"
                            :class="track.levelHover"
                        >
                            {{ level.code }}
                            <span class="text-brand-muted text-[11px] font-medium">
                                {{ level.name }}
                            </span>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Helper for parents unsure of the level -->
            <div
                class="border-brand-indigo-dark-2/12 text-brand-body mt-[22px] flex items-start gap-[13px] rounded-[14px] border border-dashed bg-white/50 px-5 py-4 text-[14.5px]"
            >
                <span
                    class="bg-brand-indigo flex h-6 w-6 shrink-0 items-center justify-center rounded-[7px] text-[13px] font-bold text-white"
                >
                    ?
                </span>
                <p>
                    Nu știi ce nivel i se potrivește copilului?
                    <b class="text-brand-indigo-dark-2 font-semibold"
                        >La evaluare îl testăm</b
                    >
                    și vă recomandăm traseul potrivit pentru obiectivul lui de
                    admitere.
                </p>
            </div>
        </div>
    </section>
</template>
