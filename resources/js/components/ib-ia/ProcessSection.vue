<script setup lang="ts">
import { IconShieldCheck } from '@tabler/icons-vue';

interface Step {
    num: string;
    title: string;
    text: string;
}

const steps: Step[] = [
    {
        num: '01',
        title: 'Tema potrivită',
        text: 'Pornim de la ceva care te interesează cu adevărat și care „are matematică" fix la nivelul tău. Evităm temele răsuflate, pe care examinatorii le-au văzut de mii de ori — sunt cel mai greu de personalizat.',
    },
    {
        num: '02',
        title: 'Întrebare și plan pe pagini',
        text: 'Formulăm o întrebare de cercetare clară și împărțim explorarea pe criterii, cu un plan estimat pe pagini — ca să nu scrii 22 de pagini diluate când 14 focusate iau mai mult.',
    },
    {
        num: '03',
        title: 'Matematica, corect și la nivel',
        text: 'Lucrăm corectitudinea, notația și nivelul potrivit — calcul și algebră la AA, statistică și modelare la AI; și diferența reală dintre ce se cere la SL și la HL.',
    },
    {
        num: '04',
        title: 'Reflecție și implicare',
        text: 'Partea unde se câștigă punctele și unde cei mai mulți pierd: cum îți arăți gândirea proprie, cum interpretezi rezultatele și cum recunoști limitele modelului tău.',
    },
    {
        num: '05',
        title: 'Review pe barem',
        text: 'Îți dăm feedback criteriu cu criteriu, ca o moderare de probă, înainte de predare. Vezi exact unde stai și ce mai poți crește.',
    },
];
</script>

<template>
    <section
        id="cum-lucram"
        class="bg-brand-indigo-dark-2 py-[60px] text-paper md:py-[88px]"
    >
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[42em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-accent-teal"
                    />
                    Cum lucrăm
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.4vw,42px)] font-bold tracking-[-0.01em] text-white"
                >
                    De la o idee, la o lucrare pe care o stăpânești
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-paper/60">
                    Construim IA-ul în etape, în ordinea în care examinatorul
                    citește lucrarea. Fără să-l lași pe ultima sută — acolo se
                    pierd exact punctele de la reflecție și comunicare.
                </p>
            </div>

            <!-- Steps -->
            <div class="mt-11 flex flex-col">
                <div
                    v-for="step in steps"
                    :key="step.num"
                    class="grid gap-3 border-t border-[rgba(245,243,237,0.16)] py-[26px] last:border-b md:grid-cols-[88px_1fr] md:gap-7"
                >
                    <div
                        class="font-mono text-[30px] font-bold text-accent-teal"
                    >
                        {{ step.num }}
                    </div>
                    <div>
                        <h4 class="mb-2 text-[21px] font-bold text-white">
                            {{ step.title }}
                        </h4>
                        <p
                            class="max-w-[46em] text-[15px] leading-[1.6] text-paper/60"
                        >
                            {{ step.text }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Integrity callout -->
            <div
                class="mt-10 flex items-start gap-[15px] rounded-[18px] border border-accent-teal/30 bg-accent-teal/[0.08] px-7 py-6"
            >
                <span
                    class="flex h-[38px] w-[38px] shrink-0 items-center justify-center rounded-[10px] bg-accent-teal text-brand-indigo-dark-2"
                >
                    <IconShieldCheck :size="20" stroke="1.8" />
                </span>
                <p class="text-[15px] leading-[1.6] text-paper/90">
                    <b class="font-bold text-paper"
                        >Te ghidăm — dar IA-ul îl scrii tu.</b
                    >
                    IB-ul cere ca lucrarea să fie munca ta, iar una care nu e a
                    ta se vede imediat la Criteriul C. Îți dăm temă validată,
                    structură și feedback pe barem; scrisul și gândirea rămân
                    ale tale. Așa rămâne și nota.
                </p>
            </div>
        </div>
    </section>
</template>
