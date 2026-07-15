<script setup lang="ts">
export interface LegalBlock {
    type: 'p' | 'list';
    text?: string;
    items?: string[];
}

export interface LegalSection {
    heading: string;
    blocks: LegalBlock[];
}

export interface LegalContent {
    badge: string;
    title: string;
    subtitle: string;
    sections: LegalSection[];
    lastUpdated: string;
}

defineProps<LegalContent>();
</script>

<template>
    <article class="mx-auto max-w-3xl px-5 pt-16 pb-20 sm:px-6">
        <header class="border-b border-brand-indigo-dark-2/10 pb-9">
            <span
                class="inline-flex items-center gap-[9px] rounded-full border border-brand-indigo-dark-2/12 bg-white px-3.5 py-[7px] text-[12.5px] font-semibold text-brand-indigo"
            >
                <span
                    class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand-indigo"
                />
                {{ badge }}
            </span>

            <h1
                class="mt-[22px] text-[clamp(34px,4.6vw,52px)] leading-[1.05] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
            >
                {{ title }}
            </h1>

            <p class="mt-3 text-[17px] leading-relaxed text-brand-muted">
                {{ subtitle }}
            </p>
        </header>

        <div class="mt-10 flex flex-col gap-9">
            <section v-for="section in sections" :key="section.heading">
                <h2
                    class="text-[20px] leading-[1.3] font-bold tracking-[-0.02em] text-brand-indigo-dark-2"
                >
                    {{ section.heading }}
                </h2>

                <div class="mt-3 flex flex-col gap-3.5">
                    <template v-for="(block, i) in section.blocks" :key="i">
                        <p
                            v-if="block.type === 'p'"
                            class="text-[15.5px] leading-[1.7] text-brand-body"
                        >
                            {{ block.text }}
                        </p>

                        <ul v-else class="flex flex-col gap-2">
                            <li
                                v-for="item in block.items"
                                :key="item"
                                class="flex gap-3 text-[15.5px] leading-[1.7] text-brand-body"
                            >
                                <span
                                    class="mt-[10px] h-[5px] w-[5px] flex-none rounded-[1px] bg-brand-magenta"
                                    aria-hidden="true"
                                />
                                {{ item }}
                            </li>
                        </ul>
                    </template>
                </div>
            </section>
        </div>

        <footer
            class="mt-12 border-t border-brand-indigo-dark-2/10 pt-6 font-mono text-[11px] font-bold tracking-[0.1em] text-brand-muted uppercase"
        >
            {{ lastUpdated }}
        </footer>
    </article>
</template>
