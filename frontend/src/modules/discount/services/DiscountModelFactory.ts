import type {ApiDiscountResponse} from '@/modules/discount/types/Discount';
import {DAYS} from '@/shared/enums/DayOfWeek';
import {ModelFactory} from '@/shared/services/ModelFactory';
import {parseTimeToDate} from "@/shared/utils/time";

/**
 * Creates a new empty discount model with default structure and values.
 *
 * This function initializes a base discount object, including empty
 * `discountTimeRules` and `discountTimeRuleOptions` for all days of the week.
 * Optionally, you can provide an `overrides` object to replace or extend
 * specific default values.
 *
 * @param {Partial<any>} [overrides={}] - Optional properties to override the default model.
 * @returns {any} A complete discount model with merged default and overridden values.
 *
 * @example
 * // Create a default model
 * const discount = createEmptyDiscountModel();
 *
 * // Create a model with custom values
 * const discount = createEmptyDiscountModel({
 *   code: 'PROMO2025',
 *   startAt: new Date(),
 *   hasWeeklyTimeLimit: true,
 * });
 */
export function createEmptyDiscountModel(overrides: Partial<any> = {}): any {
    const discountTimeRules: Record<string, { data: any[] }> = {};
    const discountTimeRuleOptions: Record<string, { allDay: boolean }> = {};

    for (const d of DAYS) {
        discountTimeRules[d] = {data: []};
        discountTimeRuleOptions[d] = {allDay: false};
    }

    const baseModel = {
        discountId: null,
        code: null,
        type: null,
        startAt: null,
        endAt: null,
        hasWeeklyTimeLimit: false,
        discountTimeRules,
        discountTimeRuleOptions,
    };

    // Merge override data (override is preferred over base)
    return {
        ...baseModel,
        ...overrides,
    };
}

// Create a ModelFactory with default behavior (merge defaults with api)
const discountFactory = new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel);

export function normalizeApiDiscount(api: ApiDiscountResponse): any {
    const merged = discountFactory.normalizeApi(api);

    // Ensure discountTimeRules has keys for all DAYS even if API misses some
    merged.discountTimeRules = merged.discountTimeRules || {};
    merged.hasWeeklyTimeLimit = !!merged.discountTimeRules;
    for (const d of DAYS) {
        // Nếu API chưa có key tương ứng
        if (!merged.discountTimeRules[d]) {
            merged.discountTimeRules[d] = {data: []};
        }

        // Nếu là mảng (API cũ), convert sang object { data: [...] }
        if (Array.isArray(merged.discountTimeRules[d])) {
            merged.discountTimeRules[d] = {data: merged.discountTimeRules[d]};
        }

        // Đảm bảo discountTimeRuleOptions có giá trị
        if (!merged.discountTimeRuleOptions[d]) {
            merged.discountTimeRuleOptions[d] = {allDay: false};
        }

        merged.discountTimeRuleOptions[d].allDay = merged.discountTimeRules[d].data.length > 0;

        // Parse thời gian
        merged.discountTimeRules[d].data = merged.discountTimeRules[d].data.map((item: {
            startTime: string | undefined;
            endTime: string | undefined;
        }) => ({
            ...item,
            startTime: parseTimeToDate(item.startTime),
            endTime: parseTimeToDate(item.endTime),
        }));
    }

    console.log('merge' + JSON.stringify(merged))
    return merged;
}

// allow consumer to create modelFactory with custom normalize if needed
export function createDiscountModelFactory(normalizeFn?: (api: ApiDiscountResponse) => any) {
    return new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel, normalizeFn);
}
