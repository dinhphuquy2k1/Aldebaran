import type { ApiDiscountResponse } from '@/modules/discount/types/Discount';
import { DAYS } from '@/shared/enums/DayOfWeek';
import { ModelFactory } from '@/shared/services/ModelFactory';

export function createEmptyDiscountModel(): any {
  const discountTimeRules: Record<string, any[]> = {};
  for (const d of DAYS) {
    discountTimeRules[d] = [];
  }

  return {
    discountId: null,
    code: null,
    type: null,
    startAt: null,
    endAt: null,
    discountTimeRules,
  };
}

// Create a ModelFactory with default behavior (merge defaults with api)
const discountFactory = new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel);

export function normalizeApiDiscount(api: ApiDiscountResponse): any {
  const merged = discountFactory.normalizeApi(api);

  // Ensure discountTimeRules has keys for all DAYS even if API misses some
  merged.discountTimeRules = merged.discountTimeRules || {};
  for (const d of DAYS) {
    if (!Array.isArray(merged.discountTimeRules[d])) merged.discountTimeRules[d] = [];
  }

  return merged;
}

// allow consumer to create modelFactory with custom normalize if needed
export function createDiscountModelFactory(normalizeFn?: (api: ApiDiscountResponse) => any) {
  return new ModelFactory<ApiDiscountResponse, any>(createEmptyDiscountModel, normalizeFn);
}
