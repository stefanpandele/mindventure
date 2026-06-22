<script setup lang="ts">
import { IconArrowRight } from '@tabler/icons-vue';

interface Service {
    tag: string;
    name: string;
    sub: string;
    description: string;
    meta: string[];
    topBar: string;
    titleColor: string;
    linkColor: string;
}

const services: Service[] = [
    {
        tag: 'Liceu · IB',
        name: 'IB 7',
        sub: 'Meditații Bacalaureat Internațional',
        description:
            'Pregătire 1:1 sau în grup mic pentru examenul de matematică IB, cu accent pe exact ce se punctează în bareme.',
        meta: ['AA & AI', 'SL & HL'],
        topBar: 'bg-brand-magenta',
        titleColor: 'text-brand-magenta',
        linkColor: 'text-brand-magenta',
    },
    {
        tag: 'IB · proiect',
        name: 'IA Lab',
        sub: 'Suport Internal Assessment',
        description:
            'Te ghidăm la IA pas cu pas — de la alegerea temei și a setului de date, până la forma finală corectată pe barem.',
        meta: ['AA & AI', 'temă → final'],
        topBar: 'bg-accent-teal',
        titleColor: 'text-accent-teal',
        linkColor: 'text-accent-teal',
    },
    {
        tag: 'Clasele 2–8',
        name: 'Junior',
        sub: 'Fundația de matematică, devreme',
        description:
            'Bazele solide pe care se construiește tot ce urmează — gândire logică și încredere, nu memorare mecanică.',
        meta: ['clasa 2–8', '1:1 / grup mic'],
        topBar: 'bg-brand-indigo',
        titleColor: 'text-brand-indigo',
        linkColor: 'text-brand-indigo',
    },
];
</script>

<template>
    <section id="program" class="py-[64px] md:py-[90px]">
        <div class="mx-auto max-w-6xl px-5 sm:px-6">
            <!-- Section head -->
            <div class="max-w-[40em]">
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-magenta"
                    />
                    Program
                </span>
                <h2
                    class="mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Trei programe, de la bază la 7
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    Indiferent de unde pornește copilul, îl ducem mai departe pe
                    același traseu de matematică — construit pe înțelegere, nu
                    pe memorare.
                </p>
            </div>

            <!-- Services -->
            <div class="mt-11 grid gap-[22px] md:grid-cols-2 lg:grid-cols-3">
                <article
                    v-for="service in services"
                    :key="service.name"
                    class="relative flex flex-col overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-[30px] transition-transform duration-200 hover:-translate-y-1 hover:shadow-[0_26px_50px_-30px_rgba(17,14,43,0.4)]"
                >
                    <span
                        class="absolute top-0 right-0 left-0 h-1"
                        :class="service.topBar"
                    />

                    <span
                        class="font-mono text-[11px] font-bold tracking-[0.08em] text-brand-muted uppercase"
                    >
                        {{ service.tag }}
                    </span>
                    <h3
                        class="mt-3.5 text-[30px] leading-none font-extrabold tracking-[-0.02em]"
                        :class="service.titleColor"
                    >
                        {{ service.name }}
                    </h3>
                    <div
                        class="mt-1.5 text-[14.5px] font-semibold text-brand-indigo-dark-2"
                    >
                        {{ service.sub }}
                    </div>

                    <p
                        class="mt-3.5 flex-1 text-[14.5px] leading-[1.6] text-brand-body"
                    >
                        {{ service.description }}
                    </p>

                    <div class="mt-5 flex flex-wrap gap-2">
                        <span
                            v-for="item in service.meta"
                            :key="item"
                            class="rounded-lg border border-brand-indigo-dark-2/12 px-2.5 py-[5px] font-mono text-[11px] font-bold tracking-[0.03em] text-brand-muted"
                        >
                            {{ item }}
                        </span>
                    </div>

                    <a
                        href="#"
                        class="mt-[18px] inline-flex items-center gap-1.5 text-[14px] font-semibold transition-all hover:gap-3"
                        :class="service.linkColor"
                    >
                        Află mai mult
                        <IconArrowRight :size="14" stroke="1.6" />
                    </a>
                </article>
            </div>

            <!-- Helper for parents unsure of the program -->
            <div
                class="mt-[22px] flex items-start gap-[13px] rounded-[14px] border border-dashed border-brand-indigo-dark-2/12 bg-white/50 px-5 py-4 text-[14.5px] text-brand-body"
            >
                <span
                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-[7px] bg-brand-indigo text-[13px] font-bold text-white"
                >
                    ?
                </span>
                <p>
                    Nu știi ce program i se potrivește copilului?
                    <b class="font-semibold text-brand-indigo-dark-2"
                        >La evaluarea gratuită îl testăm</b
                    >
                    și vă recomandăm traseul potrivit pentru nivelul și
                    obiectivul lui.
                </p>
            </div>
        </div>
    </section>
</template>
