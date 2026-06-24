<script setup lang="ts">
import AcademicLinkSection from '@/components/about/AcademicLinkSection.vue';
import CredentialsSection from '@/components/about/CredentialsSection.vue';
import CtaSection from '@/components/about/CtaSection.vue';
import HeroSection from '@/components/about/HeroSection.vue';
import QuoteSection from '@/components/about/QuoteSection.vue';
import StorySection from '@/components/about/StorySection.vue';
import ValuesSection from '@/components/about/ValuesSection.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <HeroSection />
            <CredentialsSection />
            <StorySection />
            <QuoteSection />
            <ValuesSection />
            <AcademicLinkSection />
            <CtaSection />
        </main>
        <Footer />
    </div>
</template>
