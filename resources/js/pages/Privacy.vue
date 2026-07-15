<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import LegalDocument from '@/components/legal/LegalDocument.vue';
import { privacy } from '@/content/legal/privacy';

const page = usePage();
const content = computed(
    () => privacy[(page.props.locale as string) ?? 'ro'] ?? privacy.ro,
);
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <LegalDocument
                :badge="content.badge"
                :title="content.title"
                :subtitle="content.subtitle"
                :sections="content.sections"
                :last-updated="content.lastUpdated"
            />
        </main>
        <Footer />
    </div>
</template>
