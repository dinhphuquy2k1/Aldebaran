<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Domain\FilterOption\Enums\FilterOptionTypeEnum;
use Src\Infrastructure\FilterOption\Models\FilterOption;

class FilterOptionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();
        $filterOptions = [
            [
                'label' => "Loại sản phẩm",
                'value' => "category",
                'type' => "select",
                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => "Là",
                        'value' => "=",
                        'type' => "select",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "iPhone",
                                'value' => "iphone",
                                'type' => "multiselect",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ],
                            [
                                'label' => "Samsung",
                                'value' => "samsung",
                                'type' => "multiselect",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        ]
                    ],
                    [
                        'label' => "Khác",
                        'value' => "<>",
                        'type' => "select",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "dell",
                                'value' => "dell",
                                'type' => "select",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ],
                            [
                                'label' => "lenovo",
                                'value' => "lenovo",
                                'type' => "select",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]]
                    ]]
            ],
            [
                'label' => "Giá",
                'value' => "price",
                'type' => "select",
                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => "Lớn hơn",
                        'value' => ">",
                        'type' => "select",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "Nhập giá trị",
                                'value' => "input",
                                'type' => "input",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]]
                    ],
                    [
                        'label' => "Trong khoảng",
                        'value' => "between",
                        'type' => "group",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "Giá trị từ",
                                'value' => "from",
                                'type' => "date",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ],
                            [
                                'label' => "Giá trị đến",
                                'value' => "to",
                                'type' => "input",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        ]
                    ]]
            ],
            [
                'label' => "Tên sản phẩm",
                'value' => "product_name",
                'type' => "select",
                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                'created_at' => $now,
                'updated_at' => $now,
                'children' => [
                    [
                        'label' => "Bắt đầu với",
                        'value' => "startswith",
                        'type' => "select",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "Nhập từ khoá",
                                'value' => "input",
                                'type' => "input",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        ]
                    ],
                    [
                        'label' => "Kết thúc với",
                        'value' => "endswith",
                        'type' => "select",
                        'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                        'created_at' => $now,
                        'updated_at' => $now,
                        'children' => [
                            [
                                'label' => "Nhập từ khoá",
                                'value' => "input",
                                'type' => "input",
                                'screen_key' => FilterOptionTypeEnum::ORDER_LIST,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        ],
                    ]]
            ]];

        $this->insertFilterOptionsWithRelation($filterOptions);
    }

    /**
     * @param array $filterOptions
     * @param FilterOption|null $parent
     * @return void
     */
    private function insertFilterOptionsWithRelation(array $filterOptions, FilterOption $parent = null): void
    {
        foreach ($filterOptions as $filterOptionData) {
            $children = $filterOptionData['children'] ?? [];
            unset($filterOptionData['children']);

            if ($parent) {
                $filterOption = $parent->children()->create($filterOptionData);
            } else {
                $filterOption = FilterOption::create($filterOptionData);
            }

            if (!empty($children)) {
                $this->insertFilterOptionsWithRelation($children, $filterOption);
            }
        }
    }
}
