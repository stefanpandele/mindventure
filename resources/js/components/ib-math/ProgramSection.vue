<script setup lang="ts">
import { useTranslations } from '@/composables/useTranslations';

interface Track {
    name: string;
    profile: string;
    description: string;
    advice: string;
    glyph: string;
    topBar: string;
    iconBg: string;
    levelHover: string;
}

const { t } = useTranslations();

const tracks: Track[] = [
    {
        name: t('pages.ib_math.program.track_1.name'),
        profile: t('pages.ib_math.program.track_1.profile'),
        description: t('pages.ib_math.program.track_1.description'),
        advice: t('pages.ib_math.program.track_1.advice'),
        glyph: 'ƒx',
        topBar: 'bg-brand-magenta',
        iconBg: 'bg-brand-magenta text-white',
        levelHover: 'hover:border-brand-magenta hover:text-brand-magenta',
    },
    {
        name: t('pages.ib_math.program.track_2.name'),
        profile: t('pages.ib_math.program.track_2.profile'),
        description: t('pages.ib_math.program.track_2.description'),
        advice: t('pages.ib_math.program.track_2.advice'),
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
                    {{ t('pages.ib_math.program.section_title') }}
                </h2>
                <p class="mt-3.5 text-[17px] leading-relaxed text-brand-body">
                    {{ t('pages.ib_math.program.section_description') }}
                </p>
            </div>

            <!-- Tracks -->
            <div class="mt-11 grid gap-[22px] md:grid-cols-2">
                <article
                    v-for="track in tracks"
                    :key="track.name"
                    class="relative overflow-hidden rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-[30px] transition-transform duration-200 hover:-translate-y-1 hover:shadow-[0_26px_50px_-30px_rgba(17,14,43,0.4)]"
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
                                class="text-[20px] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                            >
                                {{ track.name }}
                            </h3>
                            <div class="mt-0.5 text-[13px] text-brand-muted">
                                {{ track.profile }}
                            </div>
                        </div>
                    </div>

                    <p
                        class="mt-[18px] text-[15px] leading-[1.6] text-brand-body"
                    >
                        {{ track.description }}
                    </p>

                    <div
                        class="mt-[22px] flex items-start gap-[13px] rounded-[14px] bg-white/50 px-5 py-4 text-[14.5px] text-brand-body"
                    >
                        <span
                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-[7px] bg-brand-indigo text-[13px] font-bold text-white"
                        >
                            !
                        </span>
                        <p>
                            {{ track.description }}
                        </p>
                    </div>

                    <div class="mt-[22px] grid grid-cols-2 gap-2.5">
                        <div
                            v-for="level in levels"
                            :key="level.code"
                            class="flex items-center justify-between rounded-[10px] border border-brand-indigo-dark-2/12 px-[15px] py-3 font-mono text-[13px] font-bold tracking-[0.04em] text-brand-indigo-dark-2 transition-colors"
                            :class="track.levelHover"
                        >
                            {{ level.code }}
                            <span
                                class="text-[11px] font-medium text-brand-muted"
                            >
                                {{ level.name }}
                            </span>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Helper for parents unsure of the level -->
            <div
                class="mt-[22px] flex items-start gap-[13px] rounded-[14px] border border-dashed border-brand-indigo-dark-2/12 bg-white/50 px-5 py-4 text-[14.5px] text-brand-body"
            >
                <span
                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-[7px] bg-brand-indigo text-[13px] font-bold text-white"
                >
                    ?
                </span>
                <p>
                    <b class="font-semibold text-brand-indigo-dark-2">
                        {{ t('pages.ib_math.program.helper_1') }}
                    </b>
                    {{ t('pages.ib_math.program.helper_2') }}
                </p>
            </div>
        </div>
    </section>
</template>
