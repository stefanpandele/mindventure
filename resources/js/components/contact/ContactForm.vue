<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useTranslations } from '@/composables/useTranslations';

const { t } = useTranslations();

const submitted = ref(false);

const form = useForm({
    name: '',
    email: '',
    phone: '',
    message: '',
    consent_approved: false as boolean,
    website: '', // Honeypot — must stay empty.
});

const fieldClass =
    'w-full rounded-[11px] border-[1.5px] border-brand-indigo-dark-2/12 bg-paper px-[15px] py-[13px] text-[15px] text-brand-ink transition placeholder:text-[#9b97b3] focus:border-brand focus:bg-white focus:shadow-[0_0_0_4px_rgba(79,70,229,0.1)] focus:outline-none';

function submit(): void {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
            submitted.value = true;
            form.reset();
        },
    });
}
</script>

<template>
    <div
        id="contact-form"
        class="scroll-mt-24 rounded-[18px] border border-brand-indigo-dark-2/12 bg-white p-7 shadow-[0_30px_60px_-40px_rgba(17,14,43,0.4)] sm:p-9"
    >
        <!-- Success state -->
        <div v-if="submitted" class="px-2.5 py-[30px] text-center">
            <div
                class="mx-auto mb-5 flex h-[62px] w-[62px] items-center justify-center rounded-full bg-brand-lime"
            >
                <svg
                    width="30"
                    height="30"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
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
                class="mb-2.5 text-[24px] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
            >
                {{ t('pages.contact.form_section.thank_you') }}
            </h3>
            <p class="mx-auto max-w-[26em] text-[15px] text-brand-muted">
                {{ t('pages.contact.form_section.thank_you_message') }}
            </p>
        </div>

        <!-- Form -->
        <form v-else novalidate @submit.prevent="submit">
            <h3
                class="text-[24px] font-bold tracking-[-0.025em] text-brand-indigo-dark-2"
            >
                {{ t('pages.contact.form_section.title') }}
            </h3>
            <p class="mt-2 mb-[26px] text-[14.5px] text-brand-muted">
                {{ t('pages.contact.form_section.description') }}
            </p>

            <div class="mb-[18px]">
                <label
                    for="name"
                    class="mb-2 block text-[13px] font-semibold text-brand-ink"
                >
                    {{ t('pages.contact.form_section.name_surname') }}
                    <span class="text-brand-magenta">*</span>
                </label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    :placeholder="
                        t('pages.contact.form_section.name_surname_ph')
                    "
                    :class="fieldClass"
                />
                <p
                    v-if="form.errors.name"
                    class="mt-1.5 text-[12.5px] text-brand-magenta"
                >
                    {{ form.errors.name }}
                </p>
            </div>

            <div class="grid grid-cols-1 gap-3.5 sm:grid-cols-2">
                <div class="mb-[18px]">
                    <label
                        for="email"
                        class="mb-2 block text-[13px] font-semibold text-brand-ink"
                    >
                        Email <span class="text-brand-magenta">*</span>
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        :placeholder="t('pages.contact.form_section.email_ph')"
                        :class="fieldClass"
                    />
                    <p
                        v-if="form.errors.email"
                        class="mt-1.5 text-[12.5px] text-brand-magenta"
                    >
                        {{ form.errors.email }}
                    </p>
                </div>

                <div class="mb-[18px]">
                    <label
                        for="phone"
                        class="mb-2 block text-[13px] font-semibold text-brand-ink"
                    >
                        {{ t('pages.contact.form_section.phone') }}
                    </label>
                    <input
                        id="phone"
                        v-model="form.phone"
                        type="tel"
                        placeholder="07xx xxx xxx"
                        :class="fieldClass"
                    />
                </div>
            </div>

            <div class="mb-[18px]">
                <label
                    for="message"
                    class="mb-2 block text-[13px] font-semibold text-brand-ink"
                >
                    {{ t('pages.contact.form_section.message_label') }}
                    <span class="text-brand-magenta">*</span>
                </label>
                <textarea
                    id="message"
                    v-model="form.message"
                    :placeholder="t('pages.contact.form_section.message_ph')"
                    :class="[fieldClass, 'min-h-[110px] resize-y']"
                />
                <p
                    v-if="form.errors.message"
                    class="mt-1.5 text-[12.5px] text-brand-magenta"
                >
                    {{ form.errors.message }}
                </p>
            </div>

            <!-- Honeypot: hidden from real users -->
            <input
                v-model="form.website"
                type="text"
                tabindex="-1"
                autocomplete="off"
                aria-hidden="true"
                class="absolute -left-[9999px] h-0 w-0 opacity-0"
            />

            <label
                class="mt-1.5 mb-[22px] flex items-start gap-[11px] text-[13px] leading-normal text-brand-muted"
            >
                <input
                    v-model="form.consent_approved"
                    type="checkbox"
                    class="mt-0.5 h-[18px] w-[18px] flex-none accent-brand-indigo"
                />
                <span>
                    {{ t('consent') }}
                    <a
                        href="/privacy-policy"
                        class="font-semibold text-brand"
                        target="_blank"
                    >
                        {{ t('consent_link_label') }}
                    </a>
                    <span
                        v-if="form.errors.consent_approved"
                        class="block text-brand-magenta"
                    >
                        {{ form.errors.consent_approved }}
                    </span>
                </span>
            </label>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full rounded-xl bg-brand-indigo px-[22px] py-[15px] text-[15px] font-semibold text-paper transition-opacity hover:opacity-90 disabled:opacity-60"
            >
                {{
                    form.processing
                        ? t('pages.contact.form_section.form.btn_sending')
                        : t('pages.contact.form_section.form.btn_send')
                }}
            </button>

            <p class="mt-3.5 text-center text-[12.5px] text-brand-muted">
                {{ t('pages.contact.form_section.form_footer_text') }}
                <a
                    href="mailto:contact@mindventure.ro"
                    class="font-semibold text-brand"
                >
                    contact@mindventure.ro
                </a>
            </p>
        </form>
    </div>
</template>
