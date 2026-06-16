<script setup lang="ts">
import Header from '@/components/Header.vue';
import AboutSection from '@/components/home/AboutSection.vue';
import CtaSection from '@/components/home/CtaSection.vue';
import HeroSection from '@/components/home/HeroSection.vue';
import HowWeWork from '@/components/home/HowWeWork.vue';
import ProgramSection from '@/components/home/ProgramSection.vue';
import ResultsBar from '@/components/home/ResultsBar.vue';
import TestimonialsSection from '@/components/home/TestimonialsSection.vue';
import TheFooter from '@/components/home/TheFooter.vue';
import VideoSection from '@/components/home/VideoSection.vue';
</script>

<template>
    <div class="text-brand-ink min-h-screen bg-white font-sans antialiased">
        <Header />
        <main>
            <HeroSection />
            <ResultsBar />
            <ProgramSection />
            <HowWeWork />
            <VideoSection />
            <AboutSection />
            <TestimonialsSection />
            <CtaSection />
        </main>
        <TheFooter />
    </div>
</template>
