import request from '../api/utils/request';

export function getFilters(data: { screenKey: number }): Promise<any> {
    return request({
        url: `filters`,
        method: 'POST',
        data: data,
    }) as Promise<any>;
}
