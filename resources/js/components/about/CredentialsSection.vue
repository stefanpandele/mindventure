<script setup lang="ts">
interface Credential {
    barColor: string;
    title: string;
    detail: string;
}

const credentials: Credential[] = [
    {
        barColor: 'bg-brand-magenta',
        title: 'Conferențiar',
        detail: 'Facultatea de Matematică și Informatică, Universitatea din București',
    },
    {
        barColor: 'bg-brand-lime',
        title: 'Doctor în matematică',
        detail: 'specializare în logică matematică (2013)',
    },
    {
        barColor: 'bg-accent-teal',
        title: 'Din 2008',
        detail: 'la catedră, cu generații întregi de studenți și elevi',
    },
    {
        barColor: 'bg-brand-indigo',
        title: 'Universitatea din Berna',
        detail: 'cercetare postdoctorală în logică și metode formale',
    },
];
</script>

<template>
    <section class="bg-brand-indigo-dark-2 py-11 text-paper">
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-5 sm:px-6 md:grid-cols-4"
        >
            <div
                v-for="cred in credentials"
                :key="cred.title"
                class="relative pl-[18px]"
            >
                <span
                    class="absolute top-[5px] bottom-[5px] left-0 w-[3px] rounded-[2px]"
                    :class="cred.barColor"
                />
                <div
                    class="text-[clamp(19px,2.1vw,23px)] leading-[1.1] font-extrabold tracking-[-0.01em]"
                >
                    {{ cred.title }}
                </div>
                <div class="mt-2 text-[13px] leading-[1.5] text-paper/[0.62]">
                    {{ cred.detail }}
                </div>
            </div>
        </div>
    </section>
</template>
