<script setup lang="ts">
interface Method {
    num: string;
    title: string;
    text: string;
    numColor: string;
}

const methods: Method[] = [
    {
        num: '01',
        title: 'Past papers',
        text: 'Antrenament pe subiecte reale din anii anteriori, corectate exact pe baremul IB.',
        numColor: 'text-brand-magenta',
    },
    {
        num: '02',
        title: 'Internal Assessment',
        text: 'Îndrumare pas cu pas la IA — de la alegerea temei până la forma finală.',
        numColor: 'text-brand-lime',
    },
    {
        num: '03',
        title: 'Simulări examen',
        text: 'Examene de probă în condiții reale, cu timp și barem, ca să nu existe surprize.',
        numColor: 'text-accent-teal',
    },
    {
        num: '04',
        title: 'Rapoarte progres',
        text: 'Vedeți clar unde e copilul, ce a recuperat și ce mai are de lucru.',
        numColor: 'text-brand',
    },
];
</script>

<template>
    <section class="bg-brand-indigo-dark-2 text-paper py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[40em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                >
                    <span
                        class="bg-brand-lime inline-block h-[7px] w-[7px] rounded-[2px]"
                    />
                    Cum lucrăm
                </span>
                <h2
                    class="mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em] text-white"
                >
                    Notă mai mare, nu mai multe ore
                </h2>
                <p class="text-paper/60 mt-3.5 text-[17px] leading-relaxed">
                    Patru lucruri pe care le facem la fiecare elev — astea fac
                    diferența între un 5 și un 7.
                </p>
            </div>

            <!-- Method cards -->
            <div class="mt-11 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="method in methods"
                    :key="method.num"
                    class="border-paper/15 hover:border-paper/30 relative rounded-[18px] border bg-white/[0.025] p-[26px] transition duration-200 hover:-translate-y-1 hover:bg-white/5"
                >
                    <div
                        class="font-mono text-[12px] font-bold tracking-[0.1em]"
                        :class="method.numColor"
                    >
                        {{ method.num }}
                    </div>
                    <h4 class="mt-[18px] mb-2 text-[18px] font-bold text-white">
                        {{ method.title }}
                    </h4>
                    <p class="text-paper/60 text-[14px] leading-[1.55]">
                        {{ method.text }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>
