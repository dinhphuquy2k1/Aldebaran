import {createI18n} from "vue-i18n";
import vie from '@/translations/languages/vie.json';

const defaultLocale = 'vie';

const loadLocaleMessages = async (locale: string) => {
    try {
        const messages = await import(`./languages/${locale}.json`);
        return messages.default;
    } catch (error) {
        console.error(`Failed to load locale messages for ${locale}:`, error);
        return {};
    }
};

/**
 * Khởi tạo i18n với locale mặc định
 */
// Use a loose typing for i18n options to avoid strict type mismatch between runtime locale keys
// and the compile-time generic expected keys. Casting to `any` is acceptable here because
// locale messages are loaded dynamically, and we want the runtime behavior.
const i18n = createI18n(({
    legacy: false,
    locale: defaultLocale,
    fallbackLocale: defaultLocale,
    messages: { vie },
    datetimeFormats: {
        vie: {
            ymd_hms: { pattern: 'dd-MM-yyyy HH:mm:ss' },
            ymd_hm: { pattern: 'dd-MM-yyyy HH:mm' },
        },
        eng: {
            ymd_hms: { pattern: 'MM/dd/yyyy HH:mm:ss' },
            ymd_hm: { pattern: 'MM/dd/yyyy HH:mm' },
        },
    },
}) as any);

const setLocale = async (locale: string = defaultLocale) => {
    const messages = await loadLocaleMessages(locale);
    i18n.global.setLocaleMessage(locale, messages);

    // `i18n.global.locale` can be either a ref or a plain string depending on configuration.
    // Use a safe any-cast to assign the locale value in both cases.
    const gi: any = i18n.global;
    if (gi.locale && typeof gi.locale === 'object' && 'value' in gi.locale) {
        gi.locale.value = locale;
    } else {
        gi.locale = locale;
    }
};

export {i18n, setLocale};
