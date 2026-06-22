<script setup lang="ts">
interface Faq {
    question: string;
    answer: string;
}

const faqs: Faq[] = [
    {
        question: 'De la ce clasă lucrați?',
        answer: 'De la clasa a 2-a până la a 8-a. La evaluarea gratuită vedem exact unde e copilul și de unde are sens să pornim.',
    },
    {
        question: 'Copilul meu „urăște" matematica. Îl puteți ajuta?',
        answer: 'De cele mai multe ori nu e vorba de talent, ci de un gol rămas neînțeles și de frica de greșeală. Pornim de la concret, în ritmul lui, până redevine ceva ce poate face — și de acolo se schimbă tot.',
    },
    {
        question: 'Cât durează o sesiune?',
        answer: 'Pentru cei mici, sesiuni mai scurte și mai dese funcționează cel mai bine — atenția lor e limitată. Stabilim durata la evaluare, în funcție de vârstă și de cum se concentrează.',
    },
    {
        question: '1:1 sau în grup?',
        answer: 'Ambele. Unii copii înfloresc în grupe mici, alții au nevoie de atenție individuală. Vă recomandăm varianta potrivită după prima sesiune.',
    },
];
</script>

<template>
    <section class="py-[60px] md:py-[88px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Head (centered) -->
            <div class="text-center">
                <span
                    class="inline-flex items-center justify-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-lime"
                    />
                    Întrebări
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Întrebări frecvente
                </h2>
            </div>

            <!-- Accordion -->
            <div class="mt-11 grid gap-4 md:grid-cols-2">
                <details
                    v-for="(faq, index) in faqs"
                    :key="faq.question"
                    :open="index === 0"
                    class="group rounded-[14px] border border-brand-indigo-dark-2/12 bg-white px-[22px] transition-colors open:border-brand-indigo-dark-2/26"
                >
                    <summary
                        class="flex cursor-pointer list-none items-center justify-between gap-3.5 py-[18px] text-[16px] font-semibold text-brand-indigo-dark-2 [&::-webkit-details-marker]:hidden"
                    >
                        {{ faq.question }}
                        <span
                            class="flex h-[22px] w-[22px] shrink-0 items-center justify-center rounded-md bg-[#edeae0] text-[15px] leading-none font-bold transition group-open:rotate-45 group-open:bg-brand-lime"
                        >
                            +
                        </span>
                    </summary>
                    <p
                        class="max-w-[36em] pb-5 text-[14.5px] leading-[1.6] text-brand-muted"
                    >
                        {{ faq.answer }}
                    </p>
                </details>
            </div>
        </div>
    </section>
</template>
