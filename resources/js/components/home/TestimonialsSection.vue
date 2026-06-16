<script setup lang="ts">
interface Testimonial {
    quote: string;
    parent: string;
    context: string;
    accentBorder: string;
    avatarBg: string;
}

// TODO: testimoniale reale — nu publica citate inventate.
const testimonials: Testimonial[] = [
    {
        quote: 'A trecut de la 4 la 6 într-un semestru. Pentru prima dată înțelege ce face la mate.',
        parent: '[Prenume părinte]',
        context: 'părintele lui [elev], AA HL',
        accentBorder: 'border-t-logo-teal',
        avatarBg: 'bg-chip-teal',
    },
    {
        quote: 'Rapoartele de progres ne-au dat liniște — vedem exact unde e și ce mai are de lucru.',
        parent: '[Prenume părinte]',
        context: 'părintele lui [elev], AI SL',
        accentBorder: 'border-t-logo-magenta',
        avatarBg: 'bg-chip-magenta',
    },
];
</script>

<template>
    <section class="border-brand/10 border-b">
        <div class="mx-auto max-w-6xl px-5 py-12 sm:px-6">
            <h2 class="text-brand-ink mb-5 text-center text-xl font-semibold">
                Ce spun părinții
            </h2>

            <div class="grid gap-4 md:grid-cols-2">
                <figure
                    v-for="t in testimonials"
                    :key="t.context"
                    class="border-brand/15 rounded-b-xl border border-t-[3px] bg-white p-4"
                    :class="t.accentBorder"
                >
                    <blockquote
                        class="text-brand-body mb-3 text-[13px] leading-relaxed"
                    >
                        „{{ t.quote }}"
                    </blockquote>
                    <figcaption class="flex items-center gap-2.5">
                        <span
                            class="h-7 w-7 rounded-full"
                            :class="t.avatarBg"
                        />
                        <span>
                            <span
                                class="text-brand-ink block text-xs font-semibold"
                                >{{ t.parent }}</span
                            >
                            <span class="text-brand-muted block text-[11px]">{{
                                t.context
                            }}</span>
                        </span>
                    </figcaption>
                </figure>
            </div>

            <p class="text-brand-muted mt-3.5 text-center text-[11px]">
                Testimoniale reale — de înlocuit cu citate de la părinții tăi
            </p>
        </div>
    </section>
</template>
