export function formatTime(
    timeInput?: string | Date | null,
    format: string = 'hh:mm:ss'
): string {
    if (!timeInput) return '-';

    const pad = (n: number | string) => String(n).padStart(2, '0');

    let date: Date;

    // Nếu là Date object
    if (timeInput instanceof Date) {
        date = timeInput;
    }
    // Nếu là chuỗi HH:MM hoặc HH:MM:SS
    else if (/^\d{1,2}:\d{2}(:\d{2})?$/.test(timeInput)) {
        const [h, m, s = '00'] = timeInput.split(':').map(Number);
        date = new Date();
        date.setHours(h, m, s, 0);
    }
    // Nếu là chuỗi full date string
    else {
        date = new Date(timeInput);
    }

    if (isNaN(date.getTime())) return '-';

    const tokens: Record<string, string> = {
        hh: pad(date.getHours()),
        mm: pad(date.getMinutes()),
        ss: pad(date.getSeconds()),
        h: String(date.getHours()),
        m: String(date.getMinutes()),
        s: String(date.getSeconds()),
    };

    // Thay thế các token trong format
    return format.replace(/hh|mm|ss|h|m|s/g, (token) => tokens[token] ?? token);
}

export function parseTimeToDate(timeStr?: string, baseDate: Date = new Date()): Date | null {
    if (!timeStr) {
        return null
    }

    if (!/^\d{1,2}:\d{2}(:\d{2})?$/.test(timeStr)) {
        throw new Error("Invalid time format");
    }

    const [h, m, s = '0'] = timeStr.split(':').map(Number);

    // Tạo 1 bản copy của ngày gốc để giữ nguyên ngày/tháng/năm
    const d = new Date(baseDate);
    d.setHours(h, m, s, 0);
    return d;
}

