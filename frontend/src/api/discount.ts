import request from '../api/utils/request';

export function getDiscountDetail(id: Number): Promise<any> {
    return request({
        url: `discounts/${id}`,
        method: 'GET',
    });
}
