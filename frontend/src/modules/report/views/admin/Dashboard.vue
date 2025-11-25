<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub" style="padding-bottom: 90px;">
      <TabMenu :model="tabMenus" class="omni-tabs">
        <template #item="{ item, props }">
          <a class="p-menuitem-link">
            <span class="p-menuitem-text">{{ item.name }}</span>
          </a>
        </template>
      </TabMenu>
      <div class="mt-16 d-flex justify-content-between">
        <div class="flex-1">
          <div>
            <span class="text-xl fw-semi-bold">{{ $t('overview') }}</span>
          </div>
        </div>
        <div class="d-none d-sm-flex">
          <Button class="ms-btn btn-mono--secondary ms-btn-size-m" @click="changeChartData">
            <div class="svg-next-icon-size-20">
              <div class="icon-custom-setting"></div>
            </div>
            <div class="p-button-label ml-3 lh-base">{{ $t('search') }}</div>
          </Button>
          <Button class="ms-btn btn-mono--secondary ms-btn-size-m ml-8">
            <div class="svg-next-icon-size-20">
              <div class="icon-custom-setting"></div>
            </div>
            <div class="p-button-label ml-3 lh-base">{{ $t('search') }}</div>
          </Button>
        </div>
      </div>
      <div class="mt-16">
        <div class="hrv-card">
          <div class="hrv-card-section">
            <div class="row gap-3">
              <div class="col-lg-6 col-12 row">
                <div class="col-6">
                  <Dropdown
                      :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                      optionLabel="label"
                      optionValue="value"
                      class="hrv-btn w-0"
                  />
                </div>
                <div class="col-6">
                  <Dropdown
                      :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                      optionLabel="label"
                      optionValue="value"
                      class="hrv-btn w-0"
                  />
                </div>
              </div>
              <div class="col-lg-6 col-12 row">
                <div class="col-6">
                  <Dropdown
                      :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                      optionLabel="label"
                      optionValue="value"
                      class="hrv-btn w-0"
                  />
                </div>
                <div class="col-6">
                  <Dropdown
                      :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                      optionLabel="label"
                      optionValue="value"
                      class="hrv-btn w-0"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16">
        <div class="row">
          <div class="col-xxl-8 col-12">
            <div class="row">
              <div class="col-sm-6 col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('order_quantity') }}</div>
                  <div class="hrv-card-section">
                    <div class="py-8">
                      <div class="overflow-y-auto">
                        <p>0</p>
                        <div>
                          <span>--</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('refund') }}</div>
                  <div class="hrv-card-section">
                    <div class="py-8">
                      <div class="overflow-y-auto">
                        <p>0</p>
                        <div>
                          <span>--</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('net_revenue') }}</div>
                  <div class="hrv-card-section">
                    <div class="py-8">
                      <div class="overflow-y-auto">
                        <p>0</p>
                        <div>
                          <span>--</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('net_amount') }}</div>
                  <div class="hrv-card-section">
                    <div class="py-8">
                      <div class="overflow-y-auto">
                        <p>0</p>
                        <div>
                          <span>--</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">{{ $t('net_revenue') }}</div>
                <div class="hrv-card-section" style="height:438px;">
                  <div class="d-flex justify-content-center align-items-center flex-column"
                       style="height:379px;overflow-y:auto;z-index:1">
                    <div class="svg-next-icon-size-88">
                      <div class="icon-thin-list"></div>
                    </div>
                    <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">{{ $t('net_revenue_by_branch') }}</div>
                <div class="hrv-card-section" style="height:438px;">
                  <div class="d-flex justify-content-center align-items-center flex-column"
                       style="height:379px;overflow-y:auto;z-index:1">
                    <div class="svg-next-icon-size-88">
                      <div class="icon-thin-list"></div>
                    </div>
                    <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">{{ $t('net_revenue_by_supplier') }}</div>
                <div class="hrv-card-section" style="height:438px;">
                  <DoughnutChart
                      ref="doughnutChart"
                      :data="chartData"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-4 col-12">
            <div class="row">
              <div class="col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('order_volume') }}</div>
                  <div class="hrv-card-section">
                    <div class="d-flex justify-content-center align-items-center flex-column"
                         style="height:379px;overflow-y:auto;z-index:1">
                      <div class="svg-next-icon-size-88">
                        <div class="icon-thin-list"></div>
                      </div>
                      <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('net_revenue_by_sales_channel') }}</div>
                  <div class="hrv-card-section"
                       style="overflow-y:scroll;max-height:214px;height:214px;margin-top:-12px">
                    <div class="d-flex justify-content-center align-items-center flex-column"
                         style="height:214px">
                      <div class="svg-next-icon-size-88">
                        <div class="icon-thin-list"></div>
                      </div>
                      <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('top_sales_staff') }}</div>
                  <div class="hrv-card-section"
                       style="overflow-y:scroll;max-height:214px;height:214px;margin-top:-12px">
                    <div class="d-flex justify-content-center align-items-center flex-column"
                         style="height:214px">
                      <div class="svg-next-icon-size-88">
                        <div class="icon-thin-list"></div>
                      </div>
                      <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="hrv-card">
                  <div class="hrv-card-head">{{ $t('best_selling_products') }}</div>
                  <div class="hrv-card-section"
                       style="overflow-y:scroll;max-height:214px;height:214px;margin-top:-12px">
                    <div class="d-flex justify-content-center align-items-center flex-column"
                         style="min-height:240px">
                      <div class="svg-next-icon-size-88">
                        <div class="icon-thin-list"></div>
                      </div>
                      <p class="mt-16 text-secondary">{{ $t('no_data') }}</p>
                    </div>
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
import Button from 'primevue/button';
import Dropdown from "primevue/dropdown";
import Chart from 'primevue/chart';
import ChartWithCenterTextExample from "@/modules/report/examples/ChartWithCenterTextExample.vue";
import DoughnutChart from "@/components/admin/DoughnutChart.vue";

export default {
  components: {
    TabView,
    TabMenu,
    Button,
    Dropdown,
    Chart,
    ChartWithCenterTextExample,
    DoughnutChart,
  },
  data() {
    return {
      tabMenus: [
        {
          name: this.$t('all_products'),
        },
        {
          name: this.$t('all_products'),
        }
      ],
      chartData: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3'],
        datasets: [
          {
            data: [1000000, 500000],
          },
        ],
      },
    }
  },
  methods: {
    changeChartData() {
      this.chartData = {
        labels: ['Tháng 1', 'Tháng 2'],
        datasets: [
          { data: [100, 200] }
        ]
      };
    }
  },
  mounted() {
  },
}
</script>

<style lang="scss">

</style>
