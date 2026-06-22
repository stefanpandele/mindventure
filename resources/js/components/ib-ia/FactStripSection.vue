<script setup lang="ts">
interface Fact {
    value: string;
    label: string;
}

const facts: Fact[] = [
    { value: '20%', label: 'din nota finală' },
    { value: '12–20', label: 'pagini, dublu rând' },
    { value: '5', label: 'criterii de evaluare' },
    { value: '/20', label: 'punctaj total' },
    { value: 'extern', label: 'moderat de IB' },
];
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-10 text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-7 px-5 sm:px-6 md:grid-cols-5 md:gap-5"
        >
            <div v-for="fact in facts" :key="fact.label" class="relative pl-4">
                <span
                    class="absolute top-[5px] bottom-[5px] left-0 w-[3px] rounded-[2px] bg-accent-teal"
                />
                <div
                    class="font-mono text-[clamp(22px,2.4vw,28px)] leading-none font-bold"
                >
                    {{ fact.value }}
                </div>
                <div class="mt-[7px] text-[12.5px] text-paper/60">
                    {{ fact.label }}
                </div>
            </div>
        </div>
    </section>
</template>
