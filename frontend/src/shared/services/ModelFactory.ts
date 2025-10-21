import { mergeDefaults } from '@/shared/utils/mergeDefaults';

export type CreateEmptyFn<T> = () => T;
export type NormalizeFn<TApi, TModel> = (api: TApi) => TModel;

/**
 * Generic model factory: given a createEmpty function, it can normalize API payloads
 * by merging defaults with API data. You can optionally pass a custom normalize function
 * to override the default merge behavior.
 */
export class ModelFactory<TApi = any, TModel = any> {
  private createEmptyFn: CreateEmptyFn<TModel>;
  private normalizeFn?: NormalizeFn<TApi, TModel>;

  constructor(createEmptyFn: CreateEmptyFn<TModel>, normalizeFn?: NormalizeFn<TApi, TModel>) {
    this.createEmptyFn = createEmptyFn;
    this.normalizeFn = normalizeFn;
  }

  createEmptyModel(): TModel {
    return this.createEmptyFn();
  }

  normalizeApi(api: TApi): TModel {
    if (this.normalizeFn) return this.normalizeFn(api);

    const defaults = this.createEmptyModel();
    return mergeDefaults(defaults, api as any);
  }
}
