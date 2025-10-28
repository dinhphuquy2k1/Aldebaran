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
const i18n = createI18n({
    legacy: false,
    locale: defaultLocale,
    fallbackLocale: defaultLocale,
    messages: {vie},
    datetimeFormats: {
        vie: {
            ymd_hms: {pattern: 'dd-MM-yyyy HH:mm:ss'},
            ymd_hm: {pattern: 'dd-MM-yyyy HH:mm'},
        },
        eng: {
            ymd_hms: {pattern: 'MM/dd/yyyy HH:mm:ss'},
            ymd_hm: {pattern: 'MM/dd/yyyy HH:mm'},
        }
    },
});

const setLocale = async (locale: string = defaultLocale) => {
    const messages = await loadLocaleMessages(locale);
    i18n.global.setLocaleMessage(locale, messages);

    if (typeof i18n.global.locale === "object") {
        i18n.global.locale.value = locale;
    } else {
        i18n.global.locale = locale;
    }
};

export {i18n, setLocale};
