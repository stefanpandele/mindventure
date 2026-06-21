<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { IconWorld } from '@tabler/icons-vue';
import { computed } from 'vue';

const page = usePage();
const locale = computed(() => (page.props.locale ?? 'ro') as string);
</script>

<template>
    <IconWorld :size="15" class="text-brand-muted" />
    <Link
        href="/locale/ro"
        :class="
            locale === 'ro' ? 'text-brand' : 'text-brand-muted hover:text-brand'
        "
    >
        RO
    </Link>
    <span class="text-brand/30">/</span>
    <Link
        href="/locale/en"
        :class="
            locale === 'en' ? 'text-brand' : 'text-brand-muted hover:text-brand'
        "
    >
        EN
    </Link>
</template>
