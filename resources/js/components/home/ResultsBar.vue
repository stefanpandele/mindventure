<script setup lang="ts">
interface Stat {
    value: string;
    label: string;
    color: string;
}

// TODO: înlocuiește cu cifrele tale reale.
const stats: Stat[] = [
    { value: '6.8', label: 'nota medie a elevilor', color: 'text-brand' },
    { value: '92%', label: 'au obținut 6 sau 7', color: 'text-accent-teal' },
    { value: '120+', label: 'elevi pregătiți', color: 'text-accent-magenta' },
    { value: '10+', label: 'ani experiență IB', color: 'text-brand' },
];
</script>

<template>
    <section class="border-brand/10 bg-brand-tint border-b">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-4 gap-y-6 px-5 py-7 sm:px-6 md:grid-cols-4"
        >
            <div v-for="stat in stats" :key="stat.label" class="text-center">
                <div class="text-2xl font-semibold" :class="stat.color">
                    {{ stat.value }}
                </div>
                <div class="text-brand-muted mt-0.5 text-[11px]">
                    {{ stat.label }}
                </div>
            </div>
        </div>
    </section>
</template>
