<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import AboutTrainerSection from '@/components/home/AboutTrainerSection.vue';
import CtaSection from '@/components/home/CtaSection.vue';
import FaqSection from '@/components/home/FaqSection.vue';
import HeroSection from '@/components/home/HeroSection.vue';
import HowWeWorkSection from '@/components/home/HowWeWorkSection.vue';
import ProgramSection from '@/components/home/ProgramSection.vue';
import ResultsBarSection from '@/components/home/ResultsBarSection.vue';
import VideoSection from '@/components/home/VideoSection.vue';
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
            <FaqSection />
            <CtaSection />
        </main>
        <Footer />
    </div>
</template>
