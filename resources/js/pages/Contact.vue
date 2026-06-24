<script setup lang="ts">
import ContactSection from '@/components/contact/ContactSection.vue';
import HeroSection from '@/components/contact/HeroSection.vue';
import StudioSection from '@/components/contact/StudioSection.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
</script>

<template>
    <div class="min-h-screen bg-paper font-sans text-brand-ink antialiased">
        <Header />
        <main>
            <HeroSection />
            <ContactSection />
            <StudioSection />
        </main>
        <Footer />
    </div>
</template>
