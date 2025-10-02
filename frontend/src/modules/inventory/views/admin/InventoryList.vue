<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="py-4">
            <div class="row no-gutters">
              <div class="col align-items-center d-flex">
                <p class="title-page">{{ $t('inventory') }}</p>
              </div>
              <div class="col-auto">
                <div>
                  <Button class="ms-btn btn-primary w-100">
                    <div class="p-button-label">{{ $t('export_file') }}</div>
                  </Button>
                </div>
              </div>
            </div>
            <div class="row mt-15 align-items-center">
              <div class="col-lg col-sm-12">
                <div class="inventoryProductSelection">
                  <p class="mb-0 font-weight-bold mr-5">{{ $t('managing_warehouse') }}:</p>
                  <div class="width-250"></div>
                </div>
              </div>
              <div class="col-lg-auto col-sm-12">
                <div class="d-flex flex-wrap align-items-center pt-15">
                  <div class="mb-0 text-secondary mr-15"></div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="omni-tabs-wrapper ">
              <TabMenu :model="tabMenus" class="omni-tabs">
                <template #item="{ item, props }">
                  <a class="p-menuitem-link">
                    <span class="p-menuitem-text">{{ item.name }}</span>
                  </a>
                </template>
              </TabMenu>
              <div class="p-15">
                <DynamicFilter :options="filterOptions"></DynamicFilter>
              </div>
              <div class="position-relative">
                <div class="table-list-container table-list-product-list table-list--config">
                  <div class="ui-table-listing-container">
                    <DataTable v-model:selection="selectedProduct" :value="products" class="ui-table" paginator
                               :rows="10"
                               paginatorTemplate="PageLinks FirstPageLink PrevPageLink NextPageLink LastPageLink"
                               currentPageReportTemplate="{totalRecords}"
                               :pt="{thead: (options) => ({class: ['border-bottom',]})}">
                      <template #paginatorstart>
                        <div class="d-flex justify-content-between align-items-center">
                          <Dropdown
                              v-model="rows"
                              :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                              optionLabel="label"
                              optionValue="value"
                              @change="onRowsPerPageChange"
                              class="hrv-btn ms-btn-default btn-default w-0"
                          />
                          <div class="col-auto mr-10">
                          <span style="color: rgb(128, 128, 128);">
                            {{ $t('total') }}: {{ products ? products.length : 0 }}
                          </span>
                          </div>
                        </div>
                      </template>
                      <Column field="code" class="min-width-250px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <span class="d-inline-flex align-items-center">
                              <span>{{ $t('products') }}/{{ $t('variant') }}</span>
                            </span>
                          </div>
                        </template>
                        <template #body="{data}">
                          <div class="row align-items-start flex-nowrap">
                            <div class="col-auto">
                              <div class="table-cell--image">
                                <img src="/assets/images/slide_4_img.jpg" alt="" class="box-image">
                              </div>
                            </div>
                            <div class="col">
                              <div class="col max-width-350px">
                                <a href="" target="blank">
                                  <strong class="mb-5 table-break-word">
                                    Ghế phòng khách Arctander
                                  </strong>
                                </a>
                                <div class="mb-5 text-secondary table-break-word">
                                  Kem
                                </div>
                              </div>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="name" class="min-width-150px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('sku_barcode') }}</span>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column class="text-center justify-content-center d-flex min-width-350px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('update_inventory') }}</span>
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          <span class="text-warning">0</span>
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 125px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          {{ data.name }}
                        </template>
                      </Column>
                    </DataTable>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Button from "primevue/button";
import TabMenu from 'primevue/tabmenu';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dropdown from "primevue/dropdown";
import DynamicFilter from "@/components/admin/DynamicFilter.vue";

export default {
  components: {
    DynamicFilter,
    Button,
    TabMenu,
    DataTable,
    Column,
    Dropdown,
  },
  data() {
    return {
      tabMenus: [
        {
          name: this.$t('all_products'),
        }
      ],
      filterOptions: [
        {
          label: "Loại sản phẩm", value: "category", children: [
            {
              label: "Điện thoại", value: "phone", children: [
                {label: "iPhone", value: "iphone"},
                {label: "Samsung", value: "samsung"}
              ]
            },
            {label: "Laptop", value: "laptop"}
          ]
        },
        {label: "Giá", value: "price"}
      ],
      products: [
        {
          id: '1000',
          code: 'f230fh0g3',
          name: 'Bamboo Watch',
          description: 'Product Description',
          image: 'bamboo-watch.jpg',
          price: 65,
          category: 'Accessories',
          quantity: 24,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1001',
          code: 'nvklal433',
          name: 'Black Watch',
          description: 'Product Description',
          image: 'black-watch.jpg',
          price: 72,
          category: 'Accessories',
          quantity: 61,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
      ]
    }
  },
}
</script>

<style lang="scss">

</style>
