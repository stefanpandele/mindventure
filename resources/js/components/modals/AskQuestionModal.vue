<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref, watch, nextTick, onMounted, onBeforeUnmount } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();
const open = ref(false);
const sent = ref(false);
const firstField = ref<HTMLInputElement | null>(null);
// Teleport is client-only to avoid an SSR hydration mismatch.
const isMounted = ref(false);
const props = defineProps(['section']);

const form = useForm({
    name: '',
    email: '',
    tel: '',
    question: '',
    section: props.section,
});

function openModal() {
    sent.value = false;
    open.value = true;
    nextTick(() => firstField.value?.focus());
}
function closeModal() {
    open.value = false;
    form.clearErrors();
}
function submit() {
    form.post('/faq/ask', {
        preserveScroll: true,
        onSuccess: () => {
            sent.value = true;
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
</script>

<template>
    <button
        type="button"
        @click="openModal"
        class="block w-full rounded-xl bg-brand-magenta px-5 py-3 text-center text-[15px] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_14px_30px_-10px_rgba(192,38,211,0.5)]"
    >
        {{ t('pages.ib_math.faq.ask_card.button') }}
    </button>

    <Teleport v-if="isMounted" to="body">
        <Transition name="fade">
            <div
                v-if="open"
                class="fixed inset-0 z-[100] flex items-end justify-center p-4 sm:items-center"
            >
                <!-- backdrop -->
                <div
                    class="absolute inset-0 bg-[#110E2B]/60 backdrop-blur-sm"
                    @click="closeModal"
                />

                <!-- dialog -->
                <div
                    role="dialog"
                    aria-modal="true"
                    class="relative z-10 w-full max-w-md rounded-2xl bg-white p-7 shadow-2xl"
                >
                    <button
                        type="button"
                        @click="closeModal"
                        :aria-label="t('ask_modal.close')"
                        class="absolute top-4 right-4 flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                    >
                        <svg
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M6 6l12 12M18 6L6 18"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            />
                        </svg>
                    </button>

                    <!-- FORMULAR -->
                    <form v-if="!sent" @submit.prevent="submit">
                        <h3
                            class="font-display text-2xl font-bold text-[#110E2B]"
                        >
                            {{ t('ask_modal.title') }}
                        </h3>
                        <p class="mt-2 mb-5 text-sm text-slate-500">
                            {{ t('ask_modal.subtitle') }}
                        </p>

                        <div class="mb-4">
                            <label
                                for="ask-name"
                                class="mb-2 block text-[13px] font-semibold"
                            >
                                {{ t('ask_modal.name') }}
                                <span class="text-brand-magenta">*</span>
                            </label>
                            <input
                                id="ask-name"
                                ref="firstField"
                                v-model="form.name"
                                type="text"
                                :placeholder="t('ask_modal.name_ph')"
                                class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                            />
                            <p
                                v-if="form.errors.name"
                                class="mt-1.5 text-[13px] text-brand-magenta"
                            >
                                {{ form.errors.name }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <label
                                for="ask-email"
                                class="mb-2 block text-[13px] font-semibold"
                            >
                                {{ t('ask_modal.email') }}
                                <span class="text-brand-magenta">*</span>
                            </label>
                            <input
                                id="ask-email"
                                v-model="form.email"
                                type="email"
                                :placeholder="t('ask_modal.email_ph')"
                                class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                            />
                            <p
                                v-if="form.errors.email"
                                class="mt-1.5 text-[13px] text-brand-magenta"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>

                        <!-- TELEFON (opțional) — șterge tot acest bloc dacă nu-l vrei -->
                        <div class="mb-4">
                            <label
                                for="ask-tel"
                                class="mb-2 block text-[13px] font-semibold"
                            >
                                {{ t('ask_modal.tel') }}
                                <span class="font-normal text-slate-400"
                                    >({{ t('ask_modal.tel_optional') }})</span
                                >
                            </label>
                            <input
                                id="ask-tel"
                                v-model="form.tel"
                                type="tel"
                                :placeholder="t('ask_modal.tel_ph')"
                                class="w-full rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                            />
                            <p
                                v-if="form.errors.tel"
                                class="mt-1.5 text-[13px] text-brand-magenta"
                            >
                                {{ form.errors.tel }}
                            </p>
                        </div>

                        <div class="mb-5">
                            <label
                                for="ask-question"
                                class="mb-2 block text-[13px] font-semibold"
                            >
                                {{ t('ask_modal.question') }}
                                <span class="text-brand-magenta">*</span>
                            </label>
                            <textarea
                                id="ask-question"
                                v-model="form.question"
                                rows="4"
                                :placeholder="t('ask_modal.question_ph')"
                                class="w-full resize-y rounded-xl border-[1.5px] border-slate-200 bg-slate-50 px-4 py-3 text-[15px] transition outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                            />
                            <p
                                v-if="form.errors.question"
                                class="mt-1.5 text-[13px] text-brand-magenta"
                            >
                                {{ form.errors.question }}
                            </p>
                        </div>

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="block w-full rounded-xl bg-brand-magenta px-5 py-3.5 text-center text-[15px] font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_14px_30px_-10px_rgba(192,38,211,0.5)] disabled:cursor-not-allowed disabled:opacity-60"
                        >
                            {{ t('ask_modal.submit') }}
                        </button>
                    </form>

                    <!-- SUCCES -->
                    <div v-else class="py-6 text-center">
                        <div
                            class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-brand-lime"
                        >
                            <svg
                                width="30"
                                height="30"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M5 12.5l4.5 4.5L19 7"
                                    stroke="#110E2B"
                                    stroke-width="2.4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </div>
                        <h3
                            class="font-display text-2xl font-bold text-[#110E2B]"
                        >
                            {{ t('ask_modal.success_title') }}
                        </h3>
                        <p class="mx-auto mt-2 max-w-xs text-sm text-slate-500">
                            {{ t('ask_modal.success_text') }}
                        </p>
                        <button
                            type="button"
                            @click="closeModal"
                            class="text-md mt-6 font-semibold text-indigo-600 hover:underline"
                        >
                            {{ t('ask_modal.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
