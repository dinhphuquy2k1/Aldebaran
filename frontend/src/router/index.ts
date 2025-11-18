import {createRouter, createWebHistory, RouteRecordRaw} from 'vue-router'

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        name: 'home',
        components: {
            home: () => import('@/layouts/user/HomePage.vue'),
        },
        children: [
            {
                path: '',
                components: {
                    header: () => import('@/components/user/TheHeader.vue'),
                    content: () => import('@/views/user/HomeView.vue'),
                    footer: () => import('@/components/user/TheFooter.vue'),
                },
            },
        ],
    },
    {
        path: '/admin',
        name: 'admin',
        components: {
            home: () => import('@/layouts/admin/HomePage.vue'),
        },
        children: [
            {
                path: 'dashboard',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/dashboard/views/admin/Dashboard.vue')
                }
            },
            {
                path: 'dashboard/generals',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/views/admin/HomeView.vue')
                }
            },
            {
                path: 'orders',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/order/views/admin/OrderList.vue')
                }
            },
            {
                path: 'orders/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/order/views/admin/AddOrder.vue')
                }
            },
            {
                path: 'orders/:orderId',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/order/views/admin/OrderDetail.vue')
                }
            },
            {
                path: 'draft_orders',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/views/admin/HomeView.vue')
                }
            },
            {
                path: 'products',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/product/views/admin/ProductList.vue')
                }
            },
            {
                path: 'products/collections',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/product_group/views/admin/ProductGroupList.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'products/pricing_list',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/pricing/views/admin/PricingList.vue')
                },
                meta: {title: 'price_list_list'}
            },
            {
                path: 'products/pricing_list/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/pricing/views/admin/ManagePricing.vue')
                },
                meta: {title: 'price_list_list'}
            },
            {
                path: 'products/pricing_list/:id',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/pricing/views/admin/ManagePricing.vue')
                },
                props: true,
                meta: {title: 'price_list_list'}
            },
            {
                path: 'products/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/product/views/admin/ManageProduct.vue')
                }
            },
            {
                path: 'products/variant/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/variant/views/admin/ManageVariant.vue')
                }
            },
            {
                path: 'products/variant/:id',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/variant/views/admin/ManageVariant.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'products/inventories',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/inventory/views/admin/InventoryList.vue')
                }
            },
            {
                path: 'products/:productId',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/product/views/admin/ManageProduct.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'discounts',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/discount/views/admin/DiscountList.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'discounts/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/discount/views/admin/ManageDiscount.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'discounts/:discountId',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/discount/views/admin/ManageDiscount.vue')
                },
                meta: {title: 'product_group_list'}
            },
            {
                path: 'accounts',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    content: () => import('@/modules/account/views/admin/ManageAccount.vue')
                },
            },
            {
                path: 'settings',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/settings/views/admin/SettingList.vue')
                },
            },
            {
                path: 'settings/general',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/general_setting/views/admin/GeneralSetting.vue')
                },
            },
            {
                path: 'settings/staff',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/user/views/admin/UserList.vue')
                },
            },
            {
                path: 'settings/locations',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/location/views/admin/LocationList.vue')
                },
            },
            {
                path: 'settings/locations/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/location/views/admin/ManageLocation.vue')
                },
            },
            {
                path: 'settings/checkouts',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/checkout/views/admin/ManageCheckout.vue')
                },
            },
            {
                path: 'settings/group_permissions',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/group_permissions/views/admin/GroupPermissionList.vue')
                },
            },
            {
                path: 'settings/group_permissions/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/group_permissions/views/admin/ManageGroupPermission.vue')
                },
            },
            {
                path: 'sale_channels/online_store/articles',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/sale_channels/online_store/views/admin/ArticleList.vue')
                },
            },
            {
                path: 'sale_channels/online_store/pages',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/sale_channels/online_store/views/admin/PageList.vue')
                },
            },
            {
                path: 'customers',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/customer/views/admin/CustomerList.vue')
                },
            },
            {
                path: 'customers/new',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/customer/views/admin/ManageCustomer.vue')
                },
            },
            {
                path: 'shipments',
                components: {
                    header: () => import('@/components/admin/TheHeader.vue'),
                    navbar: () => import('@/components/admin/TheNavbar.vue'),
                    content: () => import('@/modules/shipment/views/admin/ShipmentList.vue')
                },
            },
        ],
    },
    // {
    //     path: '/:pathMatch(.*)*',
    //     name: 'not-found',
    //     components: {
    //         home: () => import('@/views/user/HomeView.vue'),
    //     },
    //     children: [
    //         {
    //             path: '',
    //             components: {
    //                 content: () => import('@/views/user/components/404.vue'),
    //             },
    //         },
    //     ]
    // },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router
