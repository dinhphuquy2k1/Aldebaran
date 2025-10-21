/**
 * Deep merge source into defaults, returning a new object typed as T.
 * Rules:
 * - For each key in defaults, if source has that key, and it's not undefined, use source value.
 * - If both values are plain objects, merge recursively.
 * - Arrays from source replace default arrays.
 * - Extra keys in source that are not in defaults are copied over as well.
 */
export function mergeDefaults<T>(defaults: T, source?: any): T {
  if (source == null) {
    // clone defaults
    return deepClone(defaults);
  }

  return deepMerge(deepClone(defaults) as any, source) as T;
}

function isPlainObject(v: any): v is Record<string, any> {
  return v !== null && typeof v === 'object' && !Array.isArray(v);
}

function deepClone<T>(obj: T): T {
  if (Array.isArray(obj)) return obj.map(item => deepClone(item)) as any;
  if (isPlainObject(obj)) {
    const out: any = {};
    for (const k of Object.keys(obj)) out[k] = deepClone((obj as any)[k]);
    return out;
  }
  return obj;
}

function deepMerge(target: any, source: any): any {
  // copy extra keys from source
  for (const key of Object.keys(source || {})) {
    const srcVal = source[key];
    const tgtVal = target[key];

    if (isPlainObject(tgtVal) && isPlainObject(srcVal)) {
      target[key] = deepMerge(tgtVal, srcVal);
    } else if (srcVal === undefined) {
      // keep target
    } else {
      // arrays and primitives: take source
      target[key] = deepClone(srcVal);
    }
  }

  return target;
}
