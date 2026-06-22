<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import AboutTrainerSection from '@/components/ib-math/AboutTrainerSection.vue';
import CtaSection from '@/components/ib-math/CtaSection.vue';
import HeroSection from '@/components/ib-math/HeroSection.vue';
import HowWeWorkSection from '@/components/ib-math/HowWeWorkSection.vue';
import ProgramSection from '@/components/ib-math/ProgramSection.vue';
import ResultsBarSection from '@/components/ib-math/ResultsBarSection.vue';
import TestimonialsSection from '@/components/ib-math/TestimonialsSection.vue';
import VideoSection from '@/components/ib-math/VideoSection.vue';
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <HeroSection />
            <ResultsBarSection />
            <ProgramSection />
            <HowWeWorkSection />
            <VideoSection />
            <AboutTrainerSection />
            <TestimonialsSection />
            <CtaSection />
        </main>
        <Footer />
    </div>
</template>
