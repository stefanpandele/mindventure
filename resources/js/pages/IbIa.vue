<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import CriteriaSection from '@/components/ib-ia/CriteriaSection.vue';
import CtaSection from '@/components/ib-ia/CtaSection.vue';
import DeliverablesSection from '@/components/ib-ia/DeliverablesSection.vue';
import FactStripSection from '@/components/ib-ia/FactStripSection.vue';
import FaqSection from '@/components/ib-ia/FaqSection.vue';
import HeroSection from '@/components/ib-ia/HeroSection.vue';
import ProcessSection from '@/components/ib-ia/ProcessSection.vue';
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <HeroSection />
            <FactStripSection />
            <CriteriaSection />
            <ProcessSection />
            <DeliverablesSection />
            <FaqSection />
            <CtaSection />
        </main>
        <Footer />
    </div>
</template>
