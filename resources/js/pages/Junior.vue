<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import CoverageSection from '@/components/junior/CoverageSection.vue';
import CtaSection from '@/components/junior/CtaSection.vue';
import FaqSection from '@/components/junior/FaqSection.vue';
import HeroSection from '@/components/junior/HeroSection.vue';
import MethodSection from '@/components/junior/MethodSection.vue';
import ParentsSection from '@/components/junior/ParentsSection.vue';
import StatementSection from '@/components/junior/StatementSection.vue';
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <HeroSection />
            <StatementSection />
            <MethodSection />
            <CoverageSection />
            <ParentsSection />
            <FaqSection />
            <CtaSection />
        </main>
        <Footer />
    </div>
</template>
