<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref, watch, nextTick, onMounted, onBeforeUnmount } from 'vue';
import { useTranslations } from '@/composables/useTranslations';
import { trackEvent } from '@/lib/gtm';

const { t } = useTranslations();
const open = ref(false);
const sent = ref(false);
const firstField = ref<HTMLInputElement | null>(null);
// Teleport is client-only to avoid an SSR hydration mismatch.
const isMounted = ref(false);
const props = defineProps(['section', 'name', 'triggerClass']);
const emit = defineEmits(['open']);

const form = useForm({
    name: '',
    email: '',
    phone: '',
    question: '',
    section: props.section,
});

function openModal() {
    emit('open');
    sent.value = false;
    open.value = true;
    nextTick(() => firstField.value?.focus());
}
function closeModal() {
    open.value = false;
    form.clearErrors();
}
function submit() {
    form.post('/book-session', {
        preserveScroll: true,
        onSuccess: () => {
            sent.value = true;
            trackEvent('form_submit', { section: props.section });
            form.reset();
        },
    });
}

// Escape + blocare scroll pe body cât e deschis
function onKey(e: KeyboardEvent) {
    if (e.key === 'Escape' && open.value) {
        closeModal();
    }
}
onMounted(() => {
    isMounted.value = true;
    window.addEventListener('keydown', onKey);
});
onBeforeUnmount(() => window.removeEventListener('keydown', onKey));
watch(open, (v) => {
    if (typeof document !== 'undefined') {
        document.body.style.overflow = v ? 'hidden' : '';
    }
});

const benefits = ['modal_book.benefit_1', 'modal_book.benefit_2'];
</script>

<template>
    <button type="button" @click="openModal" :class="props.triggerClass">
        {{ props.name }}
    </button>

    <Teleport v-if="isMounted" to="body">
        <Transition name="fade">
            <div
                v-if="open"
                class="fixed inset-0 z-[100] flex items-end justify-center p-4 sm:items-center"
            >
                <!-- backdrop -->
                <div
                    class="absolute inset-0 bg-brand-indigo-dark-2/70 backdrop-blur-sm"
                    @click="closeModal"
                />

                <!-- dialog -->
                <div
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="book-modal-title"
                    class="book-pop relative z-10 flex max-h-[92vh] w-full max-w-md flex-col overflow-hidden rounded-3xl bg-white shadow-[0_40px_90px_-30px_rgba(17,14,43,0.65)] ring-1 ring-brand-indigo-dark-2/10"
                >
                    <!-- ===== HEADER (dark, on-brand) ===== -->
                    <div
                        class="relative overflow-hidden bg-[linear-gradient(150deg,#110E2B_0%,#1B1740_55%,#342C81_130%)] px-6 pt-6 pb-5 text-paper sm:px-7"
                    >
                        <!-- glow blobs -->
                        <span
                            class="book-float-a pointer-events-none absolute -top-16 -right-10 h-48 w-48 rounded-full bg-[radial-gradient(circle,rgba(218,26,125,0.55),transparent_62%)] blur-xl"
                        />
                        <span
                            class="book-float-b pointer-events-none absolute -bottom-20 -left-10 h-48 w-48 rounded-full bg-[radial-gradient(circle,rgba(72,197,183,0.45),transparent_62%)] blur-xl"
                        />

                        <!-- close -->
                        <button
                            type="button"
                            @click="closeModal"
                            :aria-label="t('modal_book.close')"
                            class="absolute top-4 right-4 z-10 flex h-8 w-8 items-center justify-center rounded-lg text-paper/60 transition hover:bg-white/10 hover:text-white"
                        >
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M6 6l12 12M18 6L6 18"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </button>

                        <!-- eyebrow badge with pulsing dot -->
                        <span
                            class="relative inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 font-mono text-[11px] font-bold tracking-[0.12em] text-brand-lime uppercase ring-1 ring-white/15"
                        >
                            <span class="relative flex h-2 w-2">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-lime opacity-75"
                                />
                                <span
                                    class="relative inline-flex h-2 w-2 rounded-full bg-brand-lime"
                                />
                            </span>
                            {{ t('modal_book.badge') }}
                        </span>

                        <h3
                            id="book-modal-title"
                            class="relative mt-3.5 text-card-title leading-[1.1] font-bold tracking-[-0.02em] text-white"
                        >
                            {{ t('modal_book.title') }}
                        </h3>
                        <p class="relative mt-2 text-[14px] leading-relaxed text-paper/70">
                            {{ t('modal_book.subtitle') }}
                        </p>

                        <!-- benefit chips -->
<!--                        <div class="relative mt-4 flex flex-wrap gap-2">-->
<!--                            <span-->
<!--                                v-for="benefit in benefits"-->
<!--                                :key="benefit"-->
<!--                                class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-2.5 py-1 text-[11.5px] font-medium text-paper/90 ring-1 ring-white/15"-->
<!--                            >-->
<!--                                <svg-->
<!--                                    class="h-3 w-3 flex-none text-brand-lime"-->
<!--                                    viewBox="0 0 24 24"-->
<!--                                    fill="none"-->
<!--                                >-->
<!--                                    <path-->
<!--                                        d="M5 12.5l4.5 4.5L19 7"-->
<!--                                        stroke="currentColor"-->
<!--                                        stroke-width="2.6"-->
<!--                                        stroke-linecap="round"-->
<!--                                        stroke-linejoin="round"-->
<!--                                    />-->
<!--                                </svg>-->
<!--                                {{ t(benefit) }}-->
<!--                            </span>-->
<!--                        </div>-->
                    </div>

                    <!-- ===== BODY ===== -->
                    <div class="overflow-y-auto px-6 py-6 sm:px-7">
                        <!-- FORMULAR -->
                        <form v-if="!sent" @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label
                                    for="book-name"
                                    class="mb-1.5 block text-[13px] font-semibold text-brand-indigo-dark-2"
                                >
                                    {{ t('modal_book.name') }}
                                    <span class="text-brand-magenta">*</span>
                                </label>
                                <input
                                    id="book-name"
                                    ref="firstField"
                                    v-model="form.name"
                                    type="text"
                                    :placeholder="t('modal_book.name_ph')"
                                    class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-brand-magenta focus:bg-white focus:ring-4 focus:ring-brand-magenta/15"
                                />
                                <p
                                    v-if="form.errors.name"
                                    class="mt-1.5 text-[13px] text-brand-magenta"
                                >
                                    {{ form.errors.name }}
                                </p>
                            </div>

                            <!-- email + tel side by side (shorter = better) -->
                            <div class="grid gap-4">
                                <div>
                                    <label
                                        for="book-email"
                                        class="mb-1.5 block text-[13px] font-semibold text-brand-indigo-dark-2"
                                    >
                                        {{ t('modal_book.email') }}
                                        <span class="text-brand-magenta">*</span>
                                    </label>
                                    <input
                                        id="book-email"
                                        v-model="form.email"
                                        type="email"
                                        :placeholder="t('modal_book.email_ph')"
                                        class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-brand-magenta focus:bg-white focus:ring-4 focus:ring-brand-magenta/15"
                                    />
                                    <p
                                        v-if="form.errors.email"
                                        class="mt-1.5 text-[13px] text-brand-magenta"
                                    >
                                        {{ form.errors.email }}
                                    </p>
                                </div>

                                <div>
                                    <label
                                        for="book-phone"
                                        class="mb-1.5 block text-[13px] font-semibold text-brand-indigo-dark-2"
                                    >
                                        {{ t('modal_book.phone') }}
                                        <span class="text-brand-magenta">*</span>
                                    </label>
                                    <input
                                        id="book-phone"
                                        v-model="form.phone"
                                        type="tel"
                                        :placeholder="t('modal_book.phone_ph')"
                                        class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-brand-magenta focus:bg-white focus:ring-4 focus:ring-brand-magenta/15"
                                    />
                                    <p
                                        v-if="form.errors.phone"
                                        class="mt-1.5 text-[13px] text-brand-magenta"
                                    >
                                        {{ form.errors.phone }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <label
                                    for="book-question"
                                    class="mb-1.5 block text-[13px] font-semibold text-brand-indigo-dark-2"
                                >
                                    {{ t('modal_book.question') }}
                                </label>
                                <textarea
                                    id="book-question"
                                    v-model="form.question"
                                    rows="3"
                                    :placeholder="t('modal_book.question_ph')"
                                    class="w-full resize-y rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-brand-magenta focus:bg-white focus:ring-4 focus:ring-brand-magenta/15"
                                />
                                <p
                                    v-if="form.errors.question"
                                    class="mt-1.5 text-[13px] text-brand-magenta"
                                >
                                    {{ form.errors.question }}
                                </p>
                            </div>

                            <!-- CTA with animated gradient sheen -->
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="group relative flex w-full items-center justify-center gap-2 overflow-hidden rounded-xl bg-[linear-gradient(100deg,#c026d3,#342c81,#c026d3)] bg-[length:200%_auto] px-5 py-3.5 text-[15px] font-semibold text-white shadow-[0_16px_34px_-12px_rgba(192,38,211,0.6)] transition-transform duration-200 animate-brand-flow hover:-translate-y-0.5 disabled:cursor-not-allowed disabled:opacity-70"
                            >
                                <svg
                                    v-if="form.processing"
                                    class="h-4 w-4 animate-spin"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                >
                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                        stroke="currentColor"
                                        stroke-width="3"
                                        opacity="0.25"
                                    />
                                    <path
                                        d="M21 12a9 9 0 00-9-9"
                                        stroke="currentColor"
                                        stroke-width="3"
                                        stroke-linecap="round"
                                    />
                                </svg>
                                <span>{{ t('modal_book.submit') }}</span>
                                <svg
                                    v-if="!form.processing"
                                    class="h-4 w-4 transition-transform group-hover:translate-x-1"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                >
                                    <path
                                        d="M5 12h14M13 6l6 6-6 6"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>

                            <!-- reassurance microcopy -->
<!--                            <p-->
<!--                                class="flex items-center justify-center gap-1.5 text-center text-[12px] text-slate-400"-->
<!--                            >-->
<!--                                <svg-->
<!--                                    class="h-3.5 w-3.5 flex-none"-->
<!--                                    viewBox="0 0 24 24"-->
<!--                                    fill="none"-->
<!--                                >-->
<!--                                    <rect-->
<!--                                        x="5"-->
<!--                                        y="11"-->
<!--                                        width="14"-->
<!--                                        height="9"-->
<!--                                        rx="2"-->
<!--                                        stroke="currentColor"-->
<!--                                        stroke-width="1.8"-->
<!--                                    />-->
<!--                                    <path-->
<!--                                        d="M8 11V8a4 4 0 118 0v3"-->
<!--                                        stroke="currentColor"-->
<!--                                        stroke-width="1.8"-->
<!--                                        stroke-linecap="round"-->
<!--                                    />-->
<!--                                </svg>-->
<!--                                {{ t('modal_book.reassurance') }}-->
<!--                            </p>-->
                        </form>

                        <!-- SUCCES -->
                        <div v-else class="py-6 text-center">
                            <div
                                class="relative mx-auto mb-5 flex h-16 w-16 items-center justify-center"
                            >
                                <span
                                    class="absolute inset-0 animate-ping rounded-full bg-brand-lime/40"
                                />
                                <span
                                    class="relative flex h-16 w-16 items-center justify-center rounded-full bg-brand-lime shadow-[0_10px_30px_-8px_rgba(201,219,13,0.7)]"
                                >
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M5 12.5l4.5 4.5L19 7"
                                            stroke="#110E2B"
                                            stroke-width="2.6"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold text-brand-indigo-dark-2">
                                {{ t('modal_book.success_title') }}
                            </h3>
                            <p class="mx-auto mt-2 max-w-xs text-sm text-slate-500">
                                {{ t('modal_book.success_text') }}
                            </p>
                            <button
                                type="button"
                                @click="closeModal"
                                class="mt-6 text-[15px] font-semibold text-brand-indigo transition hover:underline"
                            >
                                {{ t('modal_book.close') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.25s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>

<style>
@keyframes bookPop {
    0% {
        opacity: 0;
        transform: translateY(16px) scale(0.96);
    }
    100% {
        opacity: 1;
        transform: none;
    }
}
.book-pop {
    animation: bookPop 0.38s cubic-bezier(0.22, 1, 0.36, 1);
}
@keyframes bookFloat {
    0%,
    100% {
        transform: translate(0, 0);
    }
    50% {
        transform: translate(6%, -8%);
    }
}
.book-float-a {
    animation: bookFloat 9s ease-in-out infinite;
}
.book-float-b {
    animation: bookFloat 11s ease-in-out infinite reverse;
}
@media (prefers-reduced-motion: reduce) {
    .book-pop,
    .book-float-a,
    .book-float-b {
        animation: none;
    }
}
</style>
