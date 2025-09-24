<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('order_list') }}</p>
            </div>
            <div class="col-auto pl-0"></div>
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
              <div style="padding: 15px">
                <DynamicFilter v-model="filters" :options="filterOptions" layout
                               @change="onFilterChange"></DynamicFilter>
              </div>
              <div class="position-relative" v-if="filters.selectedLayoutOption === LAYOUT_TYPE.LIST">
                <div class="table-list-container table-list-product-list table-list--config">
                  <div class="ui-table-listing-container">
                    <DataTable v-model:expandedRows="selectedProduct" :value="products" class="ui-table" paginator
                               :rows="10"
                               dataKey="id"
                               @rowExpand="onRowExpand" @rowCollapse="onRowCollapse"
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
                              class="hrv-btn hrv-btn-default btn-default w-0"
                          />
                          <div class="col-auto mr-10">
                          <span style="color: rgb(128, 128, 128);">
                            {{ $t('total') }}: {{ products ? products.length : 0 }}
                          </span>
                          </div>
                        </div>
                      </template>
                      <template #expansion="slotProps">
                        <div>
                          <OrderInfoCard></OrderInfoCard>
                        </div>
                      </template>
                      <Column expander header-class="table-header--check">
                        <template #body="{rowTogglerCallback}">
                          <div class="svg-next-icon-size-20 pointer" @click="rowTogglerCallback">
                            <div
                                class="icon-next-dark animate-transition svg-next-icon-size-20 svg-next-icon-rotate-90 svg-rotate"></div>
                          </div>
                        </template>
                      </Column>
                      <Column selectionMode="multiple" header-class="table-header--check"></Column>
                      <Column field="code" style="min-width: 75px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <span class="d-inline-flex align-items-center">
                              <span>{{ $t('code') }}</span>
                            </span>
                          </div>
                        </template>
                        <template #body="{data}">
                          <div class="product-list-td-second">
                            <div class="d-flex">
                              <div class="align-self-center title-name pointer">
                                <div class="table-break-word text-primary">
                                  <span>{{ data.name }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="name" style="min-width: 145px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('created_date') }}</span>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="category" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('customers') }}</span>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('payment') }}</span>
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          {{ data.name }}
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('order_delivery') }}</span>
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          {{ data.name }}
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('cod') }}</span>
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          {{ data.name }}
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 100px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('total_amount') }}</span>
                            </div>
                          </div>
                        </template>
                        <template #body="{data}">
                          {{ data.name }}
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('channel') }}</span>
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
              <div class="padding-container p-15" v-else>
                <div class="position-relative">
                  <div class="wrapper-card-content mb-30 px-30" v-for="product in products">
                    <div class="row cart-head pt-30">
                      <div class="col-12 col-lg-9"></div>
                      <div class="col-12 col-lg-3 text-end"></div>
                    </div>
                    <OrderInfoCard></OrderInfoCard>
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
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import TabMenu from 'primevue/tabmenu';
import DynamicFilter from "@/components/admin/DynamicFilter.vue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dropdown from "primevue/dropdown";
import OrderInfoCard from "@/components/admin/OrderInfoCard.vue"
import {LAYOUT_TYPE} from "@/core/constants";
import {getFilters} from "@/api/filter";

export default {
  computed: {
    LAYOUT_TYPE() {
      return LAYOUT_TYPE
    }
  },
  components: {
    DynamicFilter,
    TabView,
    TabPanel,
    TabMenu,
    DataTable,
    Column,
    Dropdown,
    OrderInfoCard,
  },
  data() {
    return {
      filterOptions: [],
      filters: {
        search: '',
        select: null,
        selectedLayoutOption: null,
      },
      tabMenus: [
        {
          name: this.$t('all_products'),
        },
        {
          name: this.$t('all_products'),
        }
      ],
      selectedProduct: null,
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
        {
          id: '1002',
          code: 'zz21cz3c1',
          name: 'Blue Band',
          description: 'Product Description',
          image: 'blue-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1003',
          code: '244wgerg2',
          name: 'Blue T-Shirt',
          description: 'Product Description',
          image: 'blue-t-shirt.jpg',
          price: 29,
          category: 'Clothing',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1004',
          code: 'h456wer53',
          name: 'Bracelet',
          description: 'Product Description',
          image: 'bracelet.jpg',
          price: 15,
          category: 'Accessories',
          quantity: 73,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1005',
          code: 'av2231fwg',
          name: 'Brown Purse',
          description: 'Product Description',
          image: 'brown-purse.jpg',
          price: 120,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1006',
          code: 'bib36pfvm',
          name: 'Chakra Bracelet',
          description: 'Product Description',
          image: 'chakra-bracelet.jpg',
          price: 32,
          category: 'Accessories',
          quantity: 5,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1007',
          code: 'mbvjkgip5',
          name: 'Galaxy Earrings',
          description: 'Product Description',
          image: 'galaxy-earrings.jpg',
          price: 34,
          category: 'Accessories',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
      ],
    }
  },
  methods: {
    handleAddFilter(filter) {
      console.log("Filter nhận được:", filter);
    },
    onFilterChange() {
      console.log(this.filters)
    },

    async loadFilters() {
      await getFilters({screenKey: 1}).then(res => {
        this.filterOptions = res.data
      }).catch(error => {
        console.log(error)
      });
    }
  },
  async created() {
    await this.loadFilters();
  },
}
</script>

<style lang="scss" scoped>
.product-list-td-second {
  .title-name {
    width: 90%;
  }
}

.wrapper-card-content {
  padding-bottom: 15px;
}
</style>
