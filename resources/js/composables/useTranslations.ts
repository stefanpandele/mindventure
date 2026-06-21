import { usePage } from '@inertiajs/vue3';

export function useTranslations() {
    const page = usePage();

    const t = (key: string): string => {
        const translations = (page.props.translations ?? {}) as Record<
            string,
            string
        >;

        return translations[key] ?? key;
    };

    return { t };
}
