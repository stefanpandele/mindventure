<script setup lang="ts">
interface Faq {
    question: string;
    answer: string;
}

const faqs: Faq[] = [
    {
        question: 'Online sau față în față?',
        answer: 'Ambele. Sesiunile se țin online sau on-site, în funcție de ce vă e mai comod.',
    },
    {
        question: 'Cum stabiliți nivelul copilului?',
        answer: 'Printr-o evaluare inițială gratuită de 30 de minute, în care vedem exact unde e și ce program i se potrivește.',
    },
    {
        question: 'Acoperiți și AA, și AI?',
        answer: 'Da — ambele trasee IB, la SL și HL. La evaluare vă spunem care e potrivit pentru obiectivul de admitere.',
    },
    {
        question: 'De la ce vârstă se poate începe?',
        answer: 'De la clasa a 2-a, prin programul Junior. Cu cât fundația e construită mai devreme, cu atât drumul spre IB e mai ușor.',
    },
];
</script>

<template>
    <section class="py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Head (centered) -->
            <div class="text-center">
                <span
                    class="inline-flex items-center justify-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    Întrebări
                </span>
                <h2
                    class="mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
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
                        class="max-w-[34em] pb-5 text-[14.5px] leading-[1.6] text-brand-muted"
                    >
                        {{ faq.answer }}
                    </p>
                </details>
            </div>
        </div>
    </section>
</template>
