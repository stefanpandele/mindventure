<script setup lang="ts">
interface Faq {
    question: string;
    answer: string;
}

const faqs: Faq[] = [
    {
        question: 'Îmi scrieți voi IA-ul?',
        answer: 'Nu. IB-ul interzice asta, iar un IA care nu e al tău se vede imediat la Criteriul C (implicare personală). Te ghidăm, îți dăm temă validată, structură și feedback pe barem — dar scrisul rămâne al tău.',
    },
    {
        question: 'Când ar trebui să încep?',
        answer: 'Cu câteva luni înainte de deadline. IA-ul bun se construiește în etape; lăsat pe ultima sută, pierzi exact punctele de la reflecție și comunicare, care cer timp și revizuiri.',
    },
    {
        question: 'Lucrați și AA, și AI?',
        answer: 'Da. Criteriile sunt identice; diferă tipul de matematică (calcul și algebră la AA, statistică și modelare la AI) și nivelul cerut la Criteriul E, mai sofisticat la HL.',
    },
    {
        question: 'Contează mai mult matematica grea sau cum o explic?',
        answer: 'Cum o explici. Matematică simplă, înțeleasă și comunicată perfect, ia mai multe puncte decât matematică grea pe care n-o stăpânești — și pe care examinatorul o vede că nu e a ta.',
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
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    Întrebări
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Întrebări despre IA
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
                            class="flex h-[22px] w-[22px] shrink-0 items-center justify-center rounded-md bg-[#edeae0] text-[15px] leading-none font-bold transition group-open:rotate-45 group-open:bg-accent-teal"
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
