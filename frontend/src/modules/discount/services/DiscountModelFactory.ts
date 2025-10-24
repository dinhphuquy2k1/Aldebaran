import type {ApiDiscountResponse} from '@/modules/discount/types/Discount';
import {DAYS} from '@/shared/enums/DayOfWeek';
import {ModelFactory} from '@/shared/services/ModelFactory';
import {parseTimeToDate} from "@/shared/utils/time";
import {createDiscountTypeOptions} from "@/modules/discount/enums/DiscountType";

/**
 * Creates a new discount model with default structure and values.
 *
 * This function initializes a base discount object with default values for all properties,
 * including empty `discountTimeRules` and `discountTimeRuleOptions` for all days of the week.
 * You can optionally:
 * - Provide an `overrides` object to prefill or override default values.
 * - Provide `options.reset` to reset specific fields back to their default values
 *   (useful when reusing an existing model but want to clear certain fields).
 *
 * @param {Partial<any>} [overrides={}] - Optional object containing values to override defaults.
 * @param {{ reset?: string[] }} [options={}] - Optional settings.
 * @param {string[]} [options.reset] - List of field names that should be reset to default values.
 *
 * @returns {any} A fully constructed discount model with default and customized values applied.
 *
 * @example
 * // Create a completely new empty discount
 * const discount = createEmptyDiscountModel();
 *
 * @example
 * // Create a discount with custom overrides
 * const discount = createEmptyDiscountModel({
 *   code: 'PROMO2025',
 *   startAt: new Date(),
 *   hasWeeklyTimeLimit: true,
 * });
 *
 * @example
 * // Reuse an existing discount object but reset time-related fields
 * this.discount = createEmptyDiscountModel(this.discount, {
 *   reset: ['discountTimeRules', 'discountTimeRuleOptions'],
 * });
 */
export function createEmptyDiscountModel(
    overrides: Partial<any> = {},
    options: { reset?: string[] } = {}
): any {
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
        selectedType: null,
        startAt: null,
        discountValue: 0,
        discountUnit: null,
        endAt: null,
        hasEndAt: false,
        description: null,
        hasWeeklyTimeLimit: false,
        usageLimitTotal: 0,
        hasUsageLimitTotal: false,
        usageLimitPerUser: 0,
        hasUsageLimitPerUser: false,
        combinableCount: 0,
        hasCombinable: false,
        discountTimeRules,
        discountTimeRuleOptions,
    };

    // Bắt đầu từ override (copy)
    const merged = {...overrides};

    // Reset các field được chỉ định
    if (options.reset?.length) {
        for (const key of options.reset) {
            if (key in baseModel) {
                // @ts-ignore
                merged[key] = baseModel[key];
            }
        }
    }

    // Merge lại: base → merged (đã reset)
    return {
        ...baseModel,
        ...merged,
    };
}


// Create a ModelFactory with default behavior (merge defaults with api)
const discountFactory = new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel);

export function normalizeApiDiscount(api: ApiDiscountResponse): any {
    const merged = discountFactory.normalizeApi(api);

    // Ensure discountTimeRules has keys for all DAYS even if API misses some
    merged.discountTimeRules = merged.discountTimeRules || {};
    merged.hasWeeklyTimeLimit = !!merged.discountTimeRules;
    merged.hasUsageLimitTotal = merged.usageLimitTotal > 0;
    merged.hasUsageLimitPerUser = merged.usageLimitPerUser > 0;
    merged.hasEndAt = !!merged.endAt;
    merged.hasCombinable = merged.combinableCount > 0;
    merged.selectedType = createDiscountTypeOptions().find(
        (item) => item.value === merged.type
    ) || null;
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

    return merged;
}

// allow consumer to create modelFactory with custom normalize if needed
export function createDiscountModelFactory(normalizeFn?: (api: ApiDiscountResponse) => any) {
    return new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel, normalizeFn);
}
