// Minimal date utilities. Expand as needed or replace with date-fns / dayjs if desired.
export function formatDateDMY(isoDate?: string | null): string {
  if (!isoDate) return '-';
  // Try to parse via Date
  const d = new Date(isoDate);
  if (isNaN(d.getTime())) return isoDate;
  const dd = String(d.getDate()).padStart(2, '0');
  const mm = String(d.getMonth() + 1).padStart(2, '0');
  const yy = d.getFullYear();
  return `${dd}/${mm}/${yy}`;
}

export function parseISODate(isoDate?: string | null): Date | null {
  if (!isoDate) return null;
  const d = new Date(isoDate);
  return isNaN(d.getTime()) ? null : d;
}
