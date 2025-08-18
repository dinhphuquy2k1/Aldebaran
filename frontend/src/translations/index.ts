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
    locale: defaultLocale,
    fallbackLocale: defaultLocale,
    messages: {vie},
});

const setLocale = async (locale: string = defaultLocale) => {
    const messages = await loadLocaleMessages(locale);
    i18n.global.setLocaleMessage(locale, messages);
};

export {i18n, setLocale};
