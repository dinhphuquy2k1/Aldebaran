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

  <Dialog v-model:visible="visibleCancelOrder" modal
          class="modal_container modal-lg modal-dialog omni-modal">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('order_cancel') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <div>
        <div style="padding:20px 20px 0px">
          <div class="form-group mb-0">
            <div class="omni-alert-pannel pb-10">
              <div class="d-flex justify-content-start alert alert-md alert-info">
                <div class="p-0 flex-grow-1">
                  <div class="row">
                    <div class="col-12 col-sm omni-alert-pannel--content">
                      <div class="omni-alert-pannel--description mb-0">
                        <div>
                          <p>{{ $t('order_cancel_note') }}</p>
                          <p class="mb-0">{{ $t('order_cancel_warning') }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-12 pb-3">
                <label for="" class="label-input-group">{{ $t('order_cancel_reason') }}</label>
                <Dropdown
                    :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                    optionLabel="label"
                    optionValue="value"
                    :placeholder="$t('order_cancel_reason_select')"
                    class="hrv-btn w-0 h-40"
                />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <label for="" class="label-input-group">{{ $t('note') }}</label>
                <Textarea rows="1" class="ms-textarea"
                          style="overflow:hidden;overflow-wrap:break-word;height:40px;border-radius: 4px !important;"
                          :placeholder="$t('order_cancel_note_placeholder')"/>
              </div>
            </div>
          </div>
        </div>
        <div class="pd-all-20">
          <div class="row">
            <div class="col-12 mb-15">
              <strong>{{ $t('order_payment_refund') }}</strong>
            </div>
          </div>
          <div>
            <div class="mb-15">
              <div class="col-12">
                <div class="ui-table-normal-container"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group"></div>
              <div class="form-group">
                <div class="row">
                  <div class="col col-sm-4">
                    <span>{{ $t('promotions') }}:</span>
                    <p class="mb-0"></p>
                  </div>
                  <div class="col col-sm-6 text-left">
                    <span>50,000 ₫</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col col-sm-4">
                    <span>{{ $t('shipping_fee') }}:</span>
                    <p class="mb-0"></p>
                  </div>
                  <div class="col col-sm-6 text-left">
                    <span>50,000 ₫</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col col-sm-4">
                    <span>{{ $t('order_refund_total') }}:</span>
                    <p class="mb-0"></p>
                  </div>
                  <div class="col col-sm-6 text-left">
                    <span>50,000 ₫</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col col-sm-4">
                    <span>{{ $t('order_payment_cod') }}:</span>
                    <p class="mb-0"></p>
                  </div>
                  <div class="col col-sm-6 text-left">
                    <span>50,000 ₫</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-end gap-2">
        <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m">
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('order_cancel') }}</div>
        </Button>
      </div>
    </template>
  </Dialog>
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
import Dialog from 'primevue/dialog';
import Textarea from "primevue/textarea";
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
    Dialog,
    Textarea,
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
      visibleCancelOrder: true,
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
