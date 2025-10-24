export enum DiscountType {
    ORDER = 0,
    PRODUCT = 1,
    SHIPPING = 2,
    FIXED = 3,
}

export function createDiscountTypeOptions() {
    return [
        {
            label: 'order_discount',
            value: DiscountType.ORDER,
            icon: 'icon-discount-order',
        },
        {
            label: 'discount_product',
            value: DiscountType.PRODUCT,
            icon: 'icon-discount-live',
        },
        {
            label: 'shipping_discount',
            value: DiscountType.SHIPPING,
            icon: 'icon-discount-transport',
        },
        {
            label: 'fixed_price',
            value: DiscountType.FIXED,
            icon: 'icon-discount-same-price',
        },
    ]
}
