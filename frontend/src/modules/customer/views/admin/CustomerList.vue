<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('customer_list') }}</p>
            </div>
            <div class="col-auto pl-0 d-flex gap-10">
              <Button class="ms-btn btn-mono--secondary ms-btn-size-m mr-5">
                <div class="svg-next-icon-size-18">
                  <div class="icon-blog"></div>
                </div>
                <div class="p-button-label ml-3">{{ $t('export_data') }}</div>
              </Button>
              <Button class="ms-btn btn-mono--secondary ms-btn-size-m mr-5">
                <div class="svg-next-icon-size-18">
                  <div class="icon-comment"></div>
                </div>
                <div class="p-button-label ml-3">{{ $t('import_data') }}</div>
              </Button>
              <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                <div class="svg-next-icon-size-16">
                  <div class="icon-add-circle"></div>
                </div>
                <div class="p-button-label ml-3">{{ $t('create_customer') }}</div>
              </Button>
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
                      <Column selectionMode="multiple" header-class="table-header--check"></Column>
                      <Column field="code" style="min-width: 175px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <span class="d-inline-flex align-items-center">
                              <span>{{ $t('product_name') }}</span>
                            </span>
                            <span class="d-inline-flex flex-column ml-10">
                              <span class="icon-next svg-next-icon-rotate--90 svg-next-icon-size-7"></span>
                              <span class="icon-next svg-next-icon-rotate-90 svg-next-icon-size-7"></span>
                            </span>
                          </div>
                        </template>
                        <template #body="{data}">
                          <div class="product-list-td-second">
                            <div class="d-flex">
                              <div class="table-cell--image m-0">
                                <img src="/assets/images/slide_4_img.jpg" alt="" class="box-image">
                              </div>
                              <div class="ml-10 align-self-center title-name pointer">
                                <div class="table-break-word text-primary">
                                  <span>{{ data.name }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="name" style="min-width: 80px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('stock') }}</span>
                            </div>
                            <span class="d-inline-flex flex-column ml-10">
                              <span class="icon-next svg-next-icon-rotate--90 svg-next-icon-size-7"></span>
                              <span class="icon-next svg-next-icon-rotate-90 svg-next-icon-size-7"></span>
                            </span>
                          </div>
                        </template>
                      </Column>
                      <Column field="category" style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('category') }}</span>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column field="quantity" style="min-width: 125px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('brand') }}</span>
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

  <Dialog v-model:visible="visibleImportCustomer" modal
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
          <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m">
          <div class="p-button-label ml-3">{{ $t('order_cancel') }}</div>
        </Button>
      </div>
    </template>
  </Dialog>
</template>

<script>
import TabView from 'primevue/tabview';
import TabMenu from 'primevue/tabmenu';
import DynamicFilter from "@/components/admin/DynamicFilter.vue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';

export default {
  components: {
    DynamicFilter,
    TabView,
    TabMenu,
    DataTable,
    Column,
    Dropdown,
    Button,
    Dialog,
  },
  data() {
    return {
      visibleImportCustomer: false,
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
      tabMenus: [
        {
          name: this.$t('all_customers'),
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        }, {
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        },
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
        {
          id: '1008',
          code: 'vbb124btr',
          name: 'Game Controller',
          description: 'Product Description',
          image: 'game-controller.jpg',
          price: 99,
          category: 'Electronics',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 4
        },
        {
          id: '1009',
          code: 'cm230f032',
          name: 'Gaming Set',
          description: 'Product Description',
          image: 'gaming-set.jpg',
          price: 299,
          category: 'Electronics',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1010',
          code: 'plb34234v',
          name: 'Gold Phone Case',
          description: 'Product Description',
          image: 'gold-phone-case.jpg',
          price: 24,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1011',
          code: '4920nnc2d',
          name: 'Green Earbuds',
          description: 'Product Description',
          image: 'green-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 23,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1012',
          code: '250vm23cc',
          name: 'Green T-Shirt',
          description: 'Product Description',
          image: 'green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 74,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1013',
          code: 'fldsmn31b',
          name: 'Grey T-Shirt',
          description: 'Product Description',
          image: 'grey-t-shirt.jpg',
          price: 48,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 3
        },
        {
          id: '1014',
          code: 'waas1x2as',
          name: 'Headphones',
          description: 'Product Description',
          image: 'headphones.jpg',
          price: 175,
          category: 'Electronics',
          quantity: 8,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1015',
          code: 'vb34btbg5',
          name: 'Light Green T-Shirt',
          description: 'Product Description',
          image: 'light-green-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 34,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1016',
          code: 'k8l6j58jl',
          name: 'Lime Band',
          description: 'Product Description',
          image: 'lime-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 12,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1017',
          code: 'v435nn85n',
          name: 'Mini Speakers',
          description: 'Product Description',
          image: 'mini-speakers.jpg',
          price: 85,
          category: 'Clothing',
          quantity: 42,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1018',
          code: '09zx9c0zc',
          name: 'Painted Phone Case',
          description: 'Product Description',
          image: 'painted-phone-case.jpg',
          price: 56,
          category: 'Accessories',
          quantity: 41,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1019',
          code: 'mnb5mb2m5',
          name: 'Pink Band',
          description: 'Product Description',
          image: 'pink-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 63,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1020',
          code: 'r23fwf2w3',
          name: 'Pink Purse',
          description: 'Product Description',
          image: 'pink-purse.jpg',
          price: 110,
          category: 'Accessories',
          quantity: 0,
          inventoryStatus: 'OUTOFSTOCK',
          rating: 4
        },
        {
          id: '1021',
          code: 'pxpzczo23',
          name: 'Purple Band',
          description: 'Product Description',
          image: 'purple-band.jpg',
          price: 79,
          category: 'Fitness',
          quantity: 6,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1022',
          code: '2c42cb5cb',
          name: 'Purple Gemstone Necklace',
          description: 'Product Description',
          image: 'purple-gemstone-necklace.jpg',
          price: 45,
          category: 'Accessories',
          quantity: 62,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1023',
          code: '5k43kkk23',
          name: 'Purple T-Shirt',
          description: 'Product Description',
          image: 'purple-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 2,
          inventoryStatus: 'LOWSTOCK',
          rating: 5
        },
        {
          id: '1024',
          code: 'lm2tny2k4',
          name: 'Shoes',
          description: 'Product Description',
          image: 'shoes.jpg',
          price: 64,
          category: 'Clothing',
          quantity: 0,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1025',
          code: 'nbm5mv45n',
          name: 'Sneakers',
          description: 'Product Description',
          image: 'sneakers.jpg',
          price: 78,
          category: 'Clothing',
          quantity: 52,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
        {
          id: '1026',
          code: 'zx23zc42c',
          name: 'Teal T-Shirt',
          description: 'Product Description',
          image: 'teal-t-shirt.jpg',
          price: 49,
          category: 'Clothing',
          quantity: 3,
          inventoryStatus: 'LOWSTOCK',
          rating: 3
        },
        {
          id: '1027',
          code: 'acvx872gc',
          name: 'Yellow Earbuds',
          description: 'Product Description',
          image: 'yellow-earbuds.jpg',
          price: 89,
          category: 'Electronics',
          quantity: 35,
          inventoryStatus: 'INSTOCK',
          rating: 3
        },
        {
          id: '1028',
          code: 'tx125ck42',
          name: 'Yoga Mat',
          description: 'Product Description',
          image: 'yoga-mat.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 15,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1029',
          code: 'gwuby345v',
          name: 'Yoga Set',
          description: 'Product Description',
          image: 'yoga-set.jpg',
          price: 20,
          category: 'Fitness',
          quantity: 25,
          inventoryStatus: 'INSTOCK',
          rating: 8
        }
      ],
    }
  },
  methods: {
    handleAddFilter(filter) {
      console.log("Filter nhận được:", filter);
    }
  }
}
</script>

<style lang="scss">
.product-list-td-second {
  .title-name {
    width: 90%;
  }
}
</style>
