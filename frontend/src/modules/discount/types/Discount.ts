export interface DiscountTimeRuleDTO {
  discountTimeRuleId: number;
  discountId: number;
  dayOfWeek: string;
  startAt: string;
  endAt: string;
}

export type DiscountTimeRulesMapDTO = Record<string, DiscountTimeRuleDTO[]>;

export interface ApiDiscountResponse {
  discountId: number | null;
  code: string | null;
  type: number | null;
  startAt: string | null;
  endAt?: string | null;
  discountTimeRules: DiscountTimeRulesMapDTO;
}
