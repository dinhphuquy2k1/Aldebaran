<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('product_list') }}</p>
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
                <DynamicFilter :options="filterOptions"></DynamicFilter>
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


export default {
  components: {
    DynamicFilter,
    TabView,
    TabPanel,
    TabMenu,
  },
  data() {
    return {
      filterOptions: [
        { label: "Loại sản phẩm", value: "category", children: [
            { label: "Điện thoại", value: "phone", children: [
                { label: "iPhone", value: "iphone" },
                { label: "Samsung", value: "samsung" }
              ]},
            { label: "Laptop", value: "laptop" }
          ]},
        { label: "Giá", value: "price" }
      ],
      tabMenus: [
        {
          name: this.$t('all_products'),
        },
        {
          name: this.$t('all_products'),
        }
      ]
    }
  },
  methods: {
    handleAddFilter(filter) {
      console.log("Filter nhận được:", filter);
    }
  }
}
</script>

<style>

</style>
