<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { IconMenu2, IconX } from '@tabler/icons-vue';
import { computed, ref } from 'vue';

import { useTranslations } from '@/composables/useTranslations';
import LanguageSwitcher from './LanguageSwitcher.vue';

const { t } = useTranslations();
const page = usePage();
const locale = computed(() => (page.props.locale ?? 'ro') as string);

const open = ref(false);
const links = [
    'nav.home',
    'nav.program',
    'nav.results',
    'nav.about',
    'nav.video',
];
</script>

<template>
    <header class="sticky top-0 z-30 bg-white/95 backdrop-blur">
        <!--        <div class="flex h-1">-->
        <!--            <span class="bg-logo-indigo flex-1" />-->
        <!--            <span class="bg-logo-teal flex-1" />-->
        <!--            <span class="bg-logo-lime flex-1" />-->
        <!--            <span class="bg-logo-magenta flex-1" />-->
        <!--        </div>-->
        <div
            class="h-1 animate-brand-flow bg-[linear-gradient(90deg,var(--color-logo-indigo),var(--color-logo-teal),var(--color-logo-lime),var(--color-logo-magenta),var(--color-logo-indigo))] bg-size-[200%_100%]"
        />
        <div
            class="mx-auto flex max-w-6xl items-center justify-between px-5 py-3.5 sm:px-6"
        >
            <Link href="/" class="flex items-center gap-2.5">
                <img
                    alt="logo"
                    src="/images/mindventure-logo.png"
                    class="h-10 w-auto rounded-sm"
                />
                <span class="text-[15px] font-semibold text-brand-ink">
                    Mindventure
                </span>
            </Link>

            <!-- Desktop nav (centered) -->
            <nav
                class="hidden flex-1 items-center justify-center gap-5 md:flex"
            >
                <Link
                    v-for="link in links"
                    :key="link"
                    href="#"
                    class="text-[13px] text-brand-body transition-colors hover:text-brand"
                >
                    {{ t(link) }}
                </Link>
            </nav>

            <!-- Desktop right cluster -->
            <div class="hidden items-center gap-4 md:flex">
                <!-- Language toggle -->
                <div class="flex items-center gap-1.5 text-xs font-semibold">
                    <LanguageSwitcher :locale="locale" />
                </div>

                <Link
                    href="/"
                    class="rounded-md border border-brand/30 px-3.5 py-2 text-xs font-semibold text-brand-ink transition-colors hover:border-brand hover:text-brand"
                >
                    {{ t('auth.login') }}
                </Link>

                <Link
                    href="/"
                    class="rounded-md bg-brand px-3.5 py-2 text-xs font-semibold text-white transition-opacity hover:opacity-90"
                >
                    {{ t('cta.book') }}
                </Link>
            </div>

            <!-- Mobile cluster: language switcher + hamburger -->
            <div class="flex items-center gap-1.5 font-semibold md:hidden">
                <div class="mr-5 flex items-center gap-1.5">
                    <LanguageSwitcher :locale="locale" />
                </div>

                <button
                    class="flex h-11 w-11 items-center justify-center rounded-md text-brand-ink"
                    :aria-expanded="open"
                    aria-label="Meniu"
                    @click="open = !open"
                >
                    <IconX v-if="open" :size="35" class="text-[#4f46e5]" />
                    <IconMenu2 v-else :size="35" class="text-[#4f46e5]" />
                </button>
            </div>
        </div>

        <!-- Mobile secondary row: auth + CTA (below the top bar) -->
        <div
            class="flex items-center gap-2 border-t border-brand/10 px-5 py-2.5 md:hidden"
        >
            <Link
                href="/"
                class="flex-1 rounded-md border border-brand/30 py-2 text-center text-xs font-semibold text-brand-ink transition-colors hover:border-brand hover:text-brand"
            >
                {{ t('auth.login') }}
            </Link>
            <Link
                href="/"
                class="flex-1 rounded-md bg-brand py-2 text-center text-xs font-semibold text-white transition-opacity hover:opacity-90"
            >
                {{ t('cta.book') }}
            </Link>
        </div>

        <!-- Mobile menu -->
        <nav
            v-show="open"
            class="border-t border-brand/10 bg-white px-5 py-3 md:hidden"
        >
            <Link
                v-for="link in links"
                :key="link"
                href="#"
                class="block py-2 text-sm text-brand-body"
            >
                {{ t(link) }}
            </Link>
        </nav>
    </header>
</template>
