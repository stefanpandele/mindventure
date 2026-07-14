<script setup lang="ts">
interface Stat {
    value: string;
    label: string;
    word?: boolean;
    barColor: string;
}

const stats: Stat[] = [
    {
        value: 'Matematică explicată,',
        label: 'nu memorată',
        word: true,
        barColor: 'bg-brand-magenta',
    },
    {
        value: 'Gândire critică',
        label: 'înainte de toate',
        word: true,
        barColor: 'bg-brand-lime',
    },
    {
        value: 'Grupe restrânse',
        label: 'și mentorat personalizat',
        word: true,
        barColor: 'bg-accent-teal',
    },
    {
        value: 'De la primii pași,',
        label: 'până la excelență academică',
        word: true,
        barColor: 'bg-brand',
    },
];
</script>

<template>
    <section id="rezultate" class="bg-brand-indigo-dark-2 py-[46px] text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-8 px-5 sm:px-6 md:grid-cols-4 md:gap-6"
        >
            <div
                v-for="stat in stats"
                :key="stat.label"
                class="relative pl-[18px]"
            >
                <span
                    class="absolute top-1.5 bottom-1.5 left-0 w-[3px] rounded-[2px]"
                    :class="stat.barColor"
                />
                <div
                    class="font-bold"
                    :class="
                        stat.word
                            ? 'text-[clamp(20px,2.3vw,27px)] leading-[1.08] tracking-[-0.01em]'
                            : 'font-mono text-[clamp(32px,3.6vw,44px)] leading-none tracking-[-0.02em]'
                    "
                >
                    {{ stat.value }}
                </div>
                <div class="mt-[9px] max-w-[14em] text-[14px] text-paper/60">
                    {{ stat.label }}
                </div>
            </div>
        </div>
    </section>
</template>
