<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { IconMenu2, IconX } from '@tabler/icons-vue';
import { computed, ref } from 'vue';

import BookSessionModal from '@/components/modals/BookSessionModal.vue';
import { useTranslations } from '@/composables/useTranslations';
import { trackEvent } from '@/lib/gtm';
import LanguageSwitcher from './LanguageSwitcher.vue';

const { t } = useTranslations();
const page = usePage();
const locale = computed(() => (page.props.locale ?? 'ro') as string);

const sectionByComponent: Record<string, string> = {
    Home: 'homepage',
    About: 'about',
    Junior: 'junior',
    IbMath: 'ib-math',
    IbIa: 'ib-ia',
    Contact: 'contact',
    Terms: 'terms',
    Privacy: 'privacy',
};

const section = computed(
    () => sectionByComponent[page.component] ?? 'homepage',
);

const open = ref(false);
interface NavLink {
    name: string;
    uri: string;
}

const links: NavLink[] = [
    { name: 'nav.home', uri: '/' },
    { name: 'nav.about', uri: '/about' },
    { name: 'nav.junior', uri: '/junior' },
    { name: 'nav.ib_math', uri: '/ib-math' },
    { name: 'nav.ib_ia', uri: '/ib-ia' },
    { name: 'nav.contact', uri: '/contact' },
];
</script>

<template>
    <header
        class="sticky top-0 z-30 border-b border-brand/30 bg-paper backdrop-blur"
    >
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
                <span class="text-[17px] font-semibold text-brand-body">
                    MINDVENTURE
                </span>
            </Link>

            <!-- Desktop nav (centered) -->
            <nav
                class="hidden flex-1 items-center justify-center gap-5 md:flex"
            >
                <Link
                    v-for="link in links"
                    :key="link.name"
                    :href="link.uri"
                    class="text-[13px] text-brand-body transition-colors hover:text-brand"
                >
                    {{ t(link.name) }}
                </Link>
            </nav>

            <!-- Desktop right cluster -->
            <div class="hidden items-center gap-4 md:flex">
                <!-- Language toggle -->
                <div class="flex items-center gap-1.5 text-xs font-semibold">
                    <LanguageSwitcher :locale="locale" />
                </div>

                <!--                <Link-->
                <!--                    href="/"-->
                <!--                    class="rounded-md border border-brand/30 px-3.5 py-2 text-xs font-semibold text-brand-ink transition-colors hover:border-brand hover:text-brand"-->
                <!--                >-->
                <!--                    {{ t('auth.login') }}-->
                <!--                </Link>-->

                <BookSessionModal
                    :section="section"
                    :name="t('buttons.cta.book_session')"
                    trigger-class="inline-block rounded-xl bg-brand-indigo text-white px-5 py-2.5 text-[15px] font-semibold transition-opacity hover:opacity-90"
                    @open="trackEvent('cta_click', { location: 'app_header' })"
                />
            </div>

            <!-- Mobile cluster: language switcher + hamburger -->
            <div class="flex items-center gap-1.5 font-semibold md:hidden">
                <div class="mr-5 flex items-center gap-1.5">
                    <LanguageSwitcher :locale="locale" />
                </div>

                <button
                    class="flex h-[42px] w-[42px] cursor-pointer items-center justify-center rounded-[10px] border border-brand-ink/12 bg-white text-brand-ink"
                    :aria-expanded="open"
                    aria-label="Meniu"
                    @click="open = !open"
                >
                    <IconX v-if="open" :size="20" stroke="1.6" />
                    <IconMenu2 v-else :size="20" stroke="1.6" />
                </button>
            </div>
        </div>

        <!-- Mobile secondary row: auth + CTA (below the top bar) -->
        <div class="flex items-center justify-center gap-2 px-5 py-2.5 md:hidden">
            <!--            <Link-->
            <!--                href="/"-->
            <!--                class="flex-1 rounded-md border border-brand/30 py-2 text-center text-xs font-semibold text-brand-ink transition-colors hover:border-brand hover:text-brand"-->
            <!--            >-->
            <!--                {{ t('auth.login') }}-->
            <!--            </Link>-->
            <BookSessionModal
                :section="section"
                :name="t('buttons.cta.book_session')"
                trigger-class="inline-block rounded-xl bg-brand-indigo px-5 py-2.5 text-[15px] font-semibold text-white transition-opacity hover:opacity-90"
                @open="trackEvent('cta_click', { location: 'app_header' })"
            />
        </div>

        <!-- Mobile menu -->
        <nav
            v-show="open"
            class="border-t border-brand/10 bg-white px-5 py-3 md:hidden"
        >
            <Link
                v-for="link in links"
                :key="link.name"
                :href="link.uri"
                class="block py-2 text-sm text-brand-body"
                @click="open = false"
            >
                {{ t(link.name) }}
            </Link>
        </nav>
    </header>
</template>
