import { mapApiTypesToOptions, DiscountTypeOptions, defaultInsertDiscountType } from '../../enums/discountEnums';

/**
 * Get UI options for discount types. If the backend exposes an enum list via API,
 * pass it here to map; otherwise returns the static `DiscountTypeOptions`.
 */
export function getDiscountTypeOptions(apiList?: any[] | string) {
  if (Array.isArray(apiList)) {
    // prefer first element if array of strings
    return mapApiTypesToOptions(apiList[0] as string);
  }

  return mapApiTypesToOptions(apiList as string | undefined);
}

/**
 * Produce default insert payload snippet for new discount records (module-level default values).
 * You can extend this to include other default fields used when creating a new discount.
 */
export function getDefaultInsertPayload() {
  return {
    type: defaultInsertDiscountType,
    // add other defaults here (e.g. code: '', startAt: '', ...)
  };
}
