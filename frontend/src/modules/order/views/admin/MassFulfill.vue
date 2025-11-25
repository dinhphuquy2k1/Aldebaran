<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="omni-layout-body">
            <div class="omni-layout-body-lg">
              <div class="omni-layout-card card-default ghosty mt-5">
                <div class="omni-layout-card--item-stack-cover stack-nowrap">
                  <div class="omni-layout-card--item-stack fill">
                    <h2>{{ $t('bulk_shipping') }}</h2>
                  </div>
                  <div class="omni-layout-card--item-stack">
                    <Button class="omni-btn omni-btn-secondary mgl-2 pdl-2 pdr-2">
                      <div>{{ $t('delivery_history_hl') }}</div>
                    </Button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-8">
                  <div class="omni-layout-card card-default position-relative">
                    <div class="omni-layout-card--section">
                      <div class="omni-layout-card--item-stack-cover stack-nowrap align-items-center">
                        <div class="omni-layout-card--item-stack">
                          <strong>{{ $t('warehouse_dispatch') }}</strong>
                        </div>
                        <div class="omni-layout-card--item-stack">
                          <Dropdown
                              :options="[
                                { label: 'Hiển thị 10', value: 10 },
                                { label: 'Hiển thị 20', value: 20 },
                                { label: 'Hiển thị 50', value: 50 }
                                ]"
                              optionLabel="label"
                              optionValue="value"
                              class="hrv-btn width-250"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="omni-layout-card--section">
                      <div class="omni-layout-card--section-section">
                        <div class="d-flex align-items-center">
                          <strong>{{ $t('delivery_settings') }}</strong>
                          <div class="svg-next-icon-size-16 svg-color-gray-solid mgl-1">
                            <div class="icon-question-mark"></div>
                          </div>
                        </div>
                      </div>
                      <div class="omni-layout-card--section-section omni-card-wrapper">
                        <div class="mb-10">
                          <div class="omni-card card-m card-touchable fulfill-profile--add h-100">
                            <div>+ {{ $t('add') }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="omni-tabs-wrapper">
                      <TabMenu :model="tabMenus" class="omni-tabs">
                        <template #item="{ item, props }">
                          <a class="p-menuitem-link">
                            <span class="p-menuitem-text">{{ item.name }}</span>
                          </a>
                        </template>
                      </TabMenu>
                      <div class="p-15 d-flex gap-3">
                        <div class="flex-grow-1">
                          <div class="omni-input-wrapper">
                            <InputText v-model="value1" :placeholder="$t('search')" class="omni-input flex-1"/>
                          </div>
                        </div>
                        <Button class="omni-btn omni-btn-secondary mgl-2 pdl-2 pdr-2">
                          <div class="svg-next-icon-size-16">
                            <div class="icon-setting"></div>
                          </div>
                          <div class="ml-5">{{ $t('column') }}</div>
                        </Button>
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
                      <div class="position-relative">
                        <div class="table-list--config table-list-mass-fulfill">
                          <div class="wrapper-content">
                            <div class="row no-gutters align-items-center justify-content-center min-height-300px">
                              <div class="col flex-column text-center align-items-center">
                                <span class="omni-svg-create svg-next-icon mb-30 color-heather svg-next-icon-size-100">
                                  <div class="icon-empty"></div>
                                </span>
                                <div class="text-center font-size-20px mb-3 text-no--data">{{
                                    $t('order_not_found')
                                  }}
                                </div>
                                <div class="text-center text-secondary">{{
                                    $t('edit_or_choose_other_delivery_setting')
                                  }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="omni-layout-card card-default">
                    <div class="omni-layout-card--header">
                      <span class="header-title">{{ $t('bulk_order_preparation') }}</span>
                    </div>
                    <div class="omni-layout-card--item">
                      <div class="omni-layout-card--item-inner">
                        <div class="omni-layout-card--item-stack-cover">
                          <div class="omni-layout-card--item-stack fill content-secondary">{{
                              $t('selected_orders')
                            }}
                          </div>
                          <div class="omni-layout-card--item-stack text-end">
                            <strong>0</strong>
                          </div>
                        </div>
                        <div class="omni-layout-card--item-stack-cover">
                          <div class="omni-layout-card--item-stack fill content-secondary flex-shrink-0">
                            {{ $t('warehouse_dispatch') }}
                          </div>
                          <div class="omni-layout-card--item-stack"><strong>{{ $t('default_location') }}</strong></div>
                        </div>
                      </div>
                    </div>
                    <div class="omni-layout-card--item">
                      <div class="omni-layout-card--item-inner">
                        <div class="omni-layout-card--item-stack-cover">
                          <div class="omni-layout-card--item-stack fill content-secondary flex-shrink-0">
                            {{ $t('carrier') }}
                          </div>
                          <div class="omni-layout-card--item-stack text-nodata">{{ $t('not_available') }}</div>
                        </div>
                        <div class="omni-layout-card--item text-center pt-15">
                          <div class="omni-layout-card--item-inner">
                            <p class="m-0">{{ $t('choose_carrier_in_section') }}</p>
                            <strong>{{ $t('delivery_settings') }}</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="omni-layout-card card-default ghosty">
                    <Button class="omni-btn omni-btn-ghost w-100 mt-15" disabled>
                      <div class="p-button-label">{{ $t('print_product_list') }}</div>
                    </Button>
                    <Button class="omni-btn omni-btn-primary w-100 mt-15">
                      <div class="p-button-label">{{ $t('bulk_shipping') }}</div>
                    </Button>
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
import InputText from 'primevue/inputtext';

export default {
  components: {
    TabMenu,
    TabView,
    Button,
    Dropdown,
    InputText,
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
    }
  }
}
</script>
