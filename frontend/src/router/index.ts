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
