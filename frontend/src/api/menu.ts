import request from '../api/utils/request';

export function getMenus(): Promise<any> {
    return request({
        url: `menus`,
        method: 'GET',
    }) as Promise<any>;
}
