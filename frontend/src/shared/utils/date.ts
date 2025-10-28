import {i18n} from "@/translations";

export function parseISODate(isoDate?: string | null): Date | null {
    if (!isoDate) return null;
    const d = new Date(isoDate);
    return isNaN(d.getTime()) ? null : d;
}


/**
 * Format ngày theo ngôn ngữ trong i18n,
 * hỗ trợ pattern custom (dd-MM-yyyy HH:mm:ss) nếu được định nghĩa.
 *
 * @param date - Ngày cần format (Date hoặc string)
 * @param key - Tên định dạng trong datetimeFormats (ví dụ: 'ymd_hms')
 * @returns Chuỗi ngày đã format
 */
export function formatDateI18n(date: Date | string | null | undefined, key = 'ymd_hms'): string {
    if (!date) return ''

    const d = typeof date === 'string' ? new Date(date) : date
    const locale = i18n.global.locale as string

    // Get datetimeFormats configuration in i18n
    const formats = i18n.global.getDateTimeFormat(locale)
    const pattern = (formats as any)?.[key]?.pattern

    // If there is a pattern (e.g. 'dd-MM-yyyy HH:mm:ss') then use that pattern
    if (pattern) {
        return formatDatePattern(d, pattern)
    }

    // Without pattern, fallback to vue-i18n's Intl API
    try {
        return i18n.global.d(d, key)
    } catch (err) {
        return d.toLocaleString(locale)
    }
}

/**
 * Format ngày theo pattern cố định.
 * Hỗ trợ các token: dd, MM, yyyy, HH, mm, ss
 */
function formatDatePattern(date: Date, pattern = 'dd-MM-yyyy HH:mm:ss'): string {
    const pad = (n: number) => n.toString().padStart(2, '0')
    const replacements: Record<string, string> = {
        dd: pad(date.getDate()),
        MM: pad(date.getMonth() + 1),
        yyyy: date.getFullYear().toString(),
        HH: pad(date.getHours()),
        mm: pad(date.getMinutes()),
        ss: pad(date.getSeconds()),
    }
    return pattern.replace(/dd|MM|yyyy|HH|mm|ss/g, (m) => replacements[m])
}

export const customFormats: Record<
    string,
    Record<string, string>
> = {
    vie: {
        dd_mm_yy: 'dd/mm/yy',
    },
    eng: {
        dd_mm_yy: 'mm/dd/yy',
    },
};

export function getCustomFormatByLocale(
    key: string,
    locale?: string,
    fallback = 'dd_mm_yy'
): string {
    const currentLocale = locale || (i18n.global.locale as any).value;
    return customFormats[currentLocale]?.[key] || fallback;
}
