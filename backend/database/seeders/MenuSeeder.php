<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Category\Models\Category;
use Src\Infrastructure\Menu\Models\Menu;
use Src\Infrastructure\Property\Models\Property;


class MenuSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();
        $menus = [
            [
                'label' => 'overview',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4B5563" width="20" height="20"><path d="M15.25 4.75v1.5h-3v-1.5h3Zm-7.5 0v4.5h-3v-4.5h3Zm7.5 6v4.5h-3v-4.5h3Zm-7.5 3v1.5h-3v-1.5h3Zm9-10.5h-6v4.5h6v-4.5Zm-7.5 0h-6v7.5h6v-7.5Zm7.5 6h-6v7.5h6v-7.5Zm-7.5 3h-6v4.5h6v-4.5Z"/></svg>',
                'menu_type' => 0,
                'route' => '/admin/dashboard/generals',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'label' => 'orders',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.41 10.75c.562 0 1.057-.307 1.312-.773l2.685-4.867A.747.747 0 0 0 16.755 4h-11.1L4.95 2.5H2.497V4h1.5l2.7 5.693-1.012 1.83c-.548 1.005.172 2.227 1.312 2.227h9v-1.5h-9l.825-1.5h5.588ZM6.367 5.5h9.113l-2.07 3.75H8.145L6.367 5.5Zm.63 9c-.825 0-1.492.675-1.492 1.5s.667 1.5 1.492 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5Zm7.5 0c-.825 0-1.492.675-1.492 1.5s.667 1.5 1.492 1.5 1.5-.675 1.5-1.5-.675-1.5-1.5-1.5Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/orders',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'all_orders',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/orders',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'draft_orders',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/draft_orders',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'incomplete_orders',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/orders/checkouts',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'bulk_shipping',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/orders/mass_fulfill',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'shipping',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M16 7h-2.25V4H3.25c-.825 0-1.5.675-1.5 1.5v8.25h1.5A2.247 2.247 0 0 0 5.5 16a2.247 2.247 0 0 0 2.25-2.25h4.5A2.247 2.247 0 0 0 14.5 16a2.247 2.247 0 0 0 2.25-2.25h1.5V10L16 7Zm-.375 1.125L17.095 10H13.75V8.125h1.875ZM5.5 14.5a.752.752 0 0 1-.75-.75c0-.412.338-.75.75-.75s.75.338.75.75-.338.75-.75.75Zm1.665-2.25A2.227 2.227 0 0 0 5.5 11.5c-.668 0-1.253.293-1.665.75H3.25V5.5h9v6.75H7.165ZM14.5 14.5a.752.752 0 0 1-.75-.75c0-.412.338-.75.75-.75s.75.338.75.75-.338.75-.75.75Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/shipments/dashboard',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'overview',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments/dashboard',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'shipping',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'cod_management',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments/managecod',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'packing',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments/packed',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'handover_record',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments/shipment_handovers',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'delivery_record',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/shipments/shipment_returns',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'products',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="m17.058 9.685-6.75-6.75A1.49 1.49 0 0 0 9.25 2.5H4c-.825 0-1.5.675-1.5 1.5v5.25c0 .412.165.787.442 1.065l6.75 6.75c.27.27.646.435 1.058.435.412 0 .787-.165 1.057-.442l5.25-5.25c.278-.27.443-.646.443-1.058 0-.412-.172-.795-.442-1.065Zm-6.308 6.322L4 9.25V4h5.25v-.007l6.75 6.75-5.25 5.264Z"></path><path d="M5.875 7a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/products',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'all_products',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/products',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'product_groups',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/products/collections',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'price_list',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/products/pricing_list',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'inventory',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/products/inventories',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'customers',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.502 10.848c1.028.697 1.748 1.642 1.748 2.902V16h3v-2.25c0-1.635-2.678-2.602-4.748-2.902ZM12.25 10a3 3 0 1 0 0-6c-.352 0-.682.075-.998.18a4.485 4.485 0 0 1 0 5.64c.316.105.646.18.998.18Zm-4.5 0a3 3 0 1 0 0-6 3 3 0 1 0 0 6Zm0-4.5c.825 0 1.5.675 1.5 1.5s-.675 1.5-1.5 1.5-1.5-.675-1.5-1.5.675-1.5 1.5-1.5Zm0 5.25c-2.003 0-6 1.005-6 3V16h12v-2.25c0-1.995-3.998-3-6-3Zm4.5 3.75h-9v-.742c.15-.54 2.475-1.508 4.5-1.508s4.35.967 4.5 1.5v.75Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/customers',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'all_customers',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/customers',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'customer_groups',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/customers/segments',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'broadcast_campaign',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/customers/broadcast_campaigns',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'automation_script',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/customers/flows',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'member_settings',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/customers/settings',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'cash_book',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2.5c-4.14 0-7.5 3.36-7.5 7.5 0 4.14 3.36 7.5 7.5 7.5 4.14 0 7.5-3.36 7.5-7.5 0-4.14-3.36-7.5-7.5-7.5ZM10 16c-3.308 0-6-2.693-6-6 0-3.308 2.692-6 6-6 3.307 0 6 2.692 6 6 0 3.307-2.693 6-6 6Zm.232-6.645c-1.327-.338-1.755-.705-1.755-1.253 0-.63.593-1.072 1.575-1.072 1.036 0 1.425.495 1.456 1.23h1.282c-.037-1.005-.652-1.928-1.867-2.228V4.75H9.175v1.268c-1.133.24-2.04.974-2.04 2.107 0 1.342 1.117 2.018 2.745 2.408 1.462.345 1.755.862 1.755 1.402 0 .397-.293 1.042-1.575 1.042-1.2 0-1.673-.54-1.74-1.23H7.03c.075 1.276 1.02 1.995 2.145 2.228v1.275h1.755v-1.252c1.14-.218 2.04-.87 2.047-2.078-.007-1.65-1.425-2.22-2.745-2.565Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/accounting/transactions',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'cash_book',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/accounting/transactions',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'debts',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/accounting/debts',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'promotions',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M16 5.875h-1.635c.082-.232.135-.487.135-.75a2.247 2.247 0 0 0-4.125-1.237L10 4.39l-.375-.51A2.259 2.259 0 0 0 7.75 2.875a2.247 2.247 0 0 0-2.25 2.25c0 .263.053.518.135.75H4c-.833 0-1.493.668-1.493 1.5l-.007 8.25c0 .832.667 1.5 1.5 1.5h12c.832 0 1.5-.668 1.5-1.5v-8.25c0-.832-.668-1.5-1.5-1.5Zm-3.75-1.5c.412 0 .75.338.75.75s-.338.75-.75.75a.752.752 0 0 1-.75-.75c0-.412.338-.75.75-.75Zm-4.5 0c.412 0 .75.338.75.75s-.338.75-.75.75a.752.752 0 0 1-.75-.75c0-.412.338-.75.75-.75ZM16 15.625H4v-1.5h12v1.5Zm0-3.75H4v-4.5h3.81L6.25 9.498l1.215.877L10 6.925l2.535 3.45 1.215-.877-1.56-2.123H16v4.5Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/discounts',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'label' => 'reports',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15.25 3.25H4.75c-.825 0-1.5.675-1.5 1.5v10.5c0 .825.675 1.5 1.5 1.5h10.5c.825 0 1.5-.675 1.5-1.5V4.75c0-.825-.675-1.5-1.5-1.5Zm0 12H4.75V4.75h10.5v10.5Zm-9-6.75h1.5v5.25h-1.5V8.5Zm3-2.25h1.5v7.5h-1.5v-7.5Zm3 4.5h1.5v3h-1.5v-3Z"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/reports/dashboard',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'analytics',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/reports/dashboard',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'report_list',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/reports/listing',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
            [
                'label' => 'website',
                'icon' => '<svg width="20" height="20" fill="#4B5563"><svg viewBox="0 0 40 40" fill="none"><rect width="40.001" height="40" rx="4" fill="#B3E5FC"></rect><rect x="2" y="2" width="36.001" height="36" rx="4" fill="#0091EA"></rect><path d="M26.63 18.482a1.61 1.61 0 0 1-1.608-1.608h-.568l.58-.08-.687-4.973h2.011c.314 0 .591.21.677.511l1.202 4.611a1.61 1.61 0 0 1-1.607 1.54Zm-13.642-6.148a.704.704 0 0 1 .677-.513h2.01l-.687 4.973.58.08h-.591a1.61 1.61 0 0 1-1.608 1.608 1.612 1.612 0 0 1-1.607-1.538l1.226-4.61Zm6.437-.513v5.053h-.05a1.61 1.61 0 0 1-1.608 1.608 1.61 1.61 0 0 1-1.607-1.604l.698-5.057h2.567Zm3.74 0 .005.04.693 5.012h-.023a1.61 1.61 0 0 1-1.607 1.61 1.61 1.61 0 0 1-1.609-1.61h-.026v-5.052h2.566Zm5.002.212-.002-.009a1.88 1.88 0 0 0-1.807-1.375H13.665a1.88 1.88 0 0 0-1.807 1.375l-1.269 4.773v.076c0 .956.485 1.801 1.221 2.3v5.496c0 .744.606 1.35 1.35 1.35h13.705a1.35 1.35 0 0 0 1.349-1.35v-5.512a2.777 2.777 0 0 0 1.196-2.284v-.075l-1.243-4.765Z" fill="#fff"></path><path d="M17.871 27.275h4.258v-1.29H17.87v1.29Z" fill="#fff"></path><path d="M23.25 28.53h-6.5a.644.644 0 1 1 0-1.288h6.5a.645.645 0 0 1 0 1.289" fill="#fff"></path></svg></svg>',
                'menu_type' => 0,
                'route' => '/admin/sale_channels/online_store/themes',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => 'themes',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/sale_channels/online_store/themes',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'blogs',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/sale_channels/online_store/articles',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'pages',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/sale_channels/online_store/pages',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'menus',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/sale_channels/online_store/menus',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                    [
                        'label' => 'settings',
                        'icon' => null,
                        'menu_type' => 0,
                        'route' => '/admin/sale_channels/online_store/settings',
                        'parent_id' => null,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ],
            ],
        ];

        $this->insertMenusWithRelation($menus);
    }

    /**
     * @param array $menus
     * @param Menu|null $parent
     * @return void
     */
    function insertMenusWithRelation(array $menus, Menu $parent = null): void
    {
        foreach ($menus as $menu) {
            $children = $menu['children'] ?? [];
            unset($menu['children']);

            if ($parent) {
                $category = $parent->children()->create($menu);
            } else {
                $category = Menu::create($menu);
            }

            if (!empty($children)) {
                $this->insertMenusWithRelation($children, $category);
            }
        }
    }
}
