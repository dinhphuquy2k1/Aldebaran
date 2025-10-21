// Utilities for time-only strings (HH:MM:SS)
export function formatTimeHM(timeStr?: string | null): string {
  if (!timeStr) return '-';
  const parts = String(timeStr).split(':');
  if (parts.length < 2) return timeStr;
  const h = parseInt(parts[0], 10);
  const m = parts[1];
  return `${h}:${m}`;
}

export function parseTimeToMinutes(timeStr?: string | null): number | null {
  if (!timeStr) return null;
  const parts = String(timeStr).split(':').map(p => parseInt(p, 10));
  if (parts.length < 2 || isNaN(parts[0]) || isNaN(parts[1])) return null;
  return parts[0] * 60 + parts[1];
}

export function timeIsValid(timeStr?: string | null): boolean {
  if (!timeStr) return false;
  const parts = String(timeStr).split(':');
  if (parts.length < 2) return false;
  const h = parseInt(parts[0], 10);
  const m = parseInt(parts[1], 10);
  return !isNaN(h) && !isNaN(m) && h >= 0 && h < 24 && m >= 0 && m < 60;
}
