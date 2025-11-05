<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="row no-gutters pb-4 page-header">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('pages') }}</p>
            </div>
            <div class="col-auto pl-0 d-flex gap-10">
              <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                <div class="svg-next-icon-size-16">
                  <div class="icon-add-circle"></div>
                </div>
                <div class="p-button-label ml-3">{{ $t('create_page') }}</div>
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
                <div class="pt-0 px-4 pb-15 pl-15 pr-15" v-html="$t('page_count_message', {count: 1})">
                </div>
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
                      <Column style="min-width: 175px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <span class="d-inline-flex align-items-center">
                              <span>{{ $t('title') }}</span>
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
                      <Column style="min-width: 80px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('category_name') }}</span>
                            </div>
                            <span class="d-inline-flex flex-column ml-10">
                              <span class="icon-next svg-next-icon-rotate--90 svg-next-icon-size-7"></span>
                              <span class="icon-next svg-next-icon-rotate-90 svg-next-icon-size-7"></span>
                            </span>
                          </div>
                        </template>
                      </Column>
                      <Column style="min-width: 60px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('author') }}</span>
                            </div>
                          </div>
                        </template>
                      </Column>
                      <Column style="min-width: 125px">
                        <template #header>
                          <div class="d-inline-flex align-items-center">
                            <div class="d-inline-flex align-items-center">
                              <span>{{ $t('publish_date') }}</span>
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
import TabView from 'primevue/tabview';
import TabMenu from 'primevue/tabmenu';
import DynamicFilter from "@/components/admin/DynamicFilter.vue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';

export default {
  components: {
    TabView,
    TabMenu,
    DynamicFilter,
    DataTable,
    Column,
    Dropdown,
    Button,
  },
  data() {
    return {
      tabMenus: [
        {
          name: this.$t('all_pages'),
        }
      ],
    }
  }
}
</script>

<style scoped lang="scss">
</style>
