// Minimal placeholder enums and helpers for discounts.
// Expand these to match your application's real options.

export type DiscountType = 'percentage' | 'fixed' | 'free_shipping';

export const DiscountTypeOptions: Array<{ label: string; value: DiscountType }> = [
  { label: 'Percentage', value: 'percentage' },
  { label: 'Fixed amount', value: 'fixed' },
  { label: 'Free shipping', value: 'free_shipping' },
];

export const defaultInsertDiscountType: DiscountType = 'percentage';

export function mapApiTypesToOptions(apiType?: string): DiscountType {
  // naive mapping; adapt to your API values
  if (!apiType) return defaultInsertDiscountType;
  switch (apiType) {
    case 'percentage':
    case 'percent':
      return 'percentage';
    case 'fixed':
    case 'amount':
      return 'fixed';
    case 'free_shipping':
    case 'freeShipping':
      return 'free_shipping';
    default:
      return defaultInsertDiscountType;
  }
}
