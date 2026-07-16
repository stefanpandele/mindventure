<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import {
    // IconBrandYoutubeFilled,
    IconBrandInstagramFilled,
    IconBrandFacebookFilled,
    // IconBrandTiktokFilled,
} from '@tabler/icons-vue';
import { computed } from 'vue';
import type { Component } from 'vue';
import { useTranslations } from '@/composables/useTranslations';
import {
    contact,
    ibIa,
    ibMath,
    junior,
    privacyPolicy,
    termsAndConditions,
} from '@/routes';

const { t } = useTranslations();
const isInternal = (url: string): boolean => url.startsWith('/');
const page = usePage();
const contactEmail = computed(() => (page.props.contactEmail ?? '') as string);

interface FooterLink {
    name: string;
    url: string;
}

interface FooterColumn {
    title: string;
    items: FooterLink[];
}

const columns = computed<FooterColumn[]>(() => [
    {
        title: t('components.footer.columns.programs.title'),
        items: [
            {
                name: t('components.footer.columns.programs.item_1.name'),
                url: junior.url(),
            },
            {
                name: t('components.footer.columns.programs.item_2.name'),
                url: ibMath.url(),
            },
            {
                name: t('components.footer.columns.programs.item_3.name'),
                url: ibIa.url(),
            },
        ],
    },
    {
        title: 'Contact',
        items: [
            {
                name: 'Email',
                url: `mailto:${contactEmail.value}`,
            },
            {
                name: 'WhatsApp',
                url: 'https://api.whatsapp.com/send/?phone=40720171700',
            },
            {
                name: t('components.footer.columns.contact.item_3.name'),
                url: `${contact.url()}#contact-form`,
            },
        ],
    },
    {
        title: 'Legal',
        items: [
            {
                name: t('terms_and_conditions_label'),
                url: termsAndConditions.url(),
            },
            {
                name: t('privacy_policy_label'),
                url: privacyPolicy.url(),
            },
        ],
    },
]);

interface SocialLink {
    icon: Component;
    url: string;
}

const socials: SocialLink[] = [
    {
        icon: IconBrandInstagramFilled,
        url: 'https://instagram.com/mindventure.math',
    },
    {
        icon: IconBrandFacebookFilled,
        url: 'https://facebook.com/profile.php?id=61583927554605',
    },
    // {
    //     icon: IconBrandYoutubeFilled,
    //     url: 'https://youtube.com/mindventure.math/',
    // },
    // {
    //     icon: IconBrandTiktokFilled,
    //     url: 'https://tiktok.com/',
    // },
];
</script>

<template>
    <footer class="bg-brand-indigo-dark-2 text-white">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-5 py-8 sm:px-6 md:grid-cols-[1.5fr_1fr_1fr_1fr]"
        >
            <!-- Brand column -->
            <div class="col-span-2 md:col-span-1">
                <div class="mb-2 flex items-center gap-2">
                    <Link href="/public" class="flex items-center gap-2.5">
                        <img
                            alt="logo"
                            src="/images/mindventure-logo.png"
                            class="h-10 w-auto rounded-sm"
                        />
                        <span class="text-[17px] font-semibold text-white">
                            Mindventure
                        </span>
                    </Link>
                </div>
                <p class="mb-2.5 text-[15px] leading-relaxed text-white/55">
                    {{ t('footer.brand_description') }}
                </p>
                <div class="mt-4 flex gap-2">
                    <a
                        v-for="(social, i) in socials"
                        :key="i"
                        :href="social.url"
                        target="_blank"
                        rel="noopener"
                        class="flex h-[40px] w-[40px] items-center justify-center rounded-xl bg-white/10 text-white/75 transition-colors hover:bg-white/20"
                    >
                        <component :is="social.icon" :size="21" :stroke="2" />
                    </a>
                </div>
            </div>

            <!-- Link columns -->
            <div v-for="col in columns" :key="col.title">
                <div class="mb-2 text-xs font-semibold uppercase">
                    {{ col.title }}
                </div>
                <ul class="space-y-1.5">
                    <li v-for="item in col.items" :key="item.name">
                        <Link
                            v-if="isInternal(item.url)"
                            :href="item.url"
                            class="text-[11px] text-white/60 transition-colors hover:text-white"
                        >
                            {{ item.name }}
                        </Link>
                        <a
                            v-else
                            :href="item.url"
                            :target="
                                item.url.startsWith('http')
                                    ? '_blank'
                                    : undefined
                            "
                            rel="noopener"
                            class="text-[11px] text-white/60 transition-colors hover:text-white"
                        >
                            {{ item.name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-current/20">
            <div
                class="mx-auto flex max-w-6xl justify-between gap-6 px-5 py-4 text-[13px] text-white/55 sm:px-6"
            >
                <span>
                    © 2026 Mindventure.
                    <span class="block sm:inline">
                        {{ t('all_rights_reserved') }}
                    </span>
                </span>
                <span>
                    Made with 🤍
                    <span class="block sm:inline"> by NETmeON! </span>
                </span>
            </div>
        </div>
    </footer>
</template>
