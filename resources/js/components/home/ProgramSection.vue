<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { IconArrowRight } from '@tabler/icons-vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

interface Service {
    tag: string;
    name: string;
    sub: string;
    description: string;
    meta: string[];
    topBar: string;
    titleColor: string;
    linkColor: string;
    url: string;
}

const services: Service[] = [
    {
        tag: t('pages.home.programs.list_item.tag_1'),
        name: t('pages.home.programs.list_item.name_1'),
        sub: t('pages.home.programs.list_item.sub_1'),
        description: t('pages.home.programs.list_item.description_1'),
        meta: ['AA & AI', 'SL & HL'],
        topBar: 'bg-brand-magenta',
        titleColor: 'text-brand-magenta',
        linkColor: 'text-brand-magenta',
        url: '/junior',
    },
    {
        tag: t('pages.home.programs.list_item.tag_2'),
        name: t('pages.home.programs.list_item.name_2'),
        sub: t('pages.home.programs.list_item.sub_2'),
        description: t('pages.home.programs.list_item.description_2'),
        meta: ['AA & AI', 'temă → final'],
        topBar: 'bg-accent-teal',
        titleColor: 'text-accent-teal',
        linkColor: 'text-accent-teal',
        url: '/ib-math',
    },
    {
        tag: t('pages.home.programs.list_item.tag_3'),
        name: t('pages.home.programs.list_item.name_3'),
        sub: t('pages.home.programs.list_item.sub_3'),
        description: t('pages.home.programs.list_item.description_3'),
        meta: ['clasa 2–8', '1:1 / grup mic'],
        topBar: 'bg-brand-indigo',
        titleColor: 'text-brand-indigo',
        linkColor: 'text-brand-indigo',
        url: '/ib-ia',
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
                    {{ t('pages.home.programs.header') }}
                </span>
                <h2
                    class="mt-3.5 text-[clamp(30px,3.6vw,44px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    {{ t('pages.home.programs.title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    {{ t('pages.home.programs.description') }}
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

                    <Link
                        :href="service.url"
                        class="mt-[18px] inline-flex items-center gap-1.5 text-[14px] font-semibold transition-all hover:gap-3"
                        :class="service.linkColor"
                    >
                        {{ t('pages.home.programs.button_learn_more') }}
                        <IconArrowRight :size="14" stroke="1.6" />
                    </Link>
                </article>
            </div>
        </div>
    </section>
</template>
