<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div>
          <div class="order-detail-header ui-title-bar-container max-width-center">
            <div class="row align-items-start">
              <div class="col-lg col-sm-12">
                <div class="order-detail--list-status">
                  <div class="ui-toolbar-product-info">
                    <div class="ui-product-body pl-0">{{ $t('code') }}</div>
                    <div class="ui-product-head">
                      <div class="table-break-word">
                        <strong class="order-detail--list-status-code">#10004</strong>
                      </div>
                    </div>
                  </div>
                  <div class="ui-toolbar-product-info">
                    <div class="ui-product-body">{{ $t('delivery_status') }}</div>
                    <div class="ui-product-head">
                      <div class="table-break-word">
                        <span class="order-detail--list-status-name">
                          <span class="omni-badge badge-light-success badge-M order-status-badge">
                            <span class="d-flex align-items-center">
                              <span>{{ $t('delivered') }}</span>
                            </span>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="ui-toolbar-product-info">
                    <div class="ui-product-body">{{ $t('payment_status') }}</div>
                    <div class="ui-product-head">
                      <div class="table-break-word">
                        <span class="order-detail--list-status-name">
                          <span class="omni-badge badge-light-success badge-M order-status-badge undefined">
                            <span class="d-flex align-items-center">
                              <span>{{ $t('paid') }}</span>
                            </span>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <span>20/08/2025 09:05 SA</span>
                </div>
              </div>
              <div class="col-lg-auto col-sm-12 text-end pt-2">
                <div class="d-inline-block ml-3">
                  <div class="d-inline-block ml-3 mt-2"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="padding-container pt-30">
            <div class="row">
              <div class="col-lg-9 col-12">
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--header line-bottom">
                    <span class="omni-badge badge-light-success badge-M order-status-badge">
                      <span class="d-flex align-items-center">
                        <span>{{ $t('shipping_completed') }}</span>
                      </span>
                    </span>
                  </div>
                  <div>
                    <div class="ui-table-normal-container">
                      <div class="display-none sf-hidden"></div>
                    </div>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-lg-6 mt-16">
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('shipping_code') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('carrier') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('service_package') }}</p>
                          </div>
                          ---
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('tracking_code') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-lg-6">
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('shipping_status') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('pickup_warehouse') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('total_weight') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0">{{ $t('cod_amount') }}</p>
                          </div>
                          <div class="d-flex align-items-center justify-content-end text-primary">
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                            <span
                                class="omni-badge badge-rounded badge-light-warning badge-M order-status-badge py-3px ml-3">
                              <span class="d-flex align-items-center h-100"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mt-0">
                        <div class="d-flex flex-wrap justify-content-between mb-2x5">
                          <div class="word-break-all">
                            <p class="mb-0 text-nodata">{{ $t('no_note') }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mt-10">
                        <div class="row">
                          <div class="col-12 col-sm-4">
                            <Button class="ms-btn btn-danger fix-height--button btn-xs-block mb-5">
                              <div class="p-button-label">{{
                                  $t('cancel_delivery')
                                }}
                              </div>
                            </Button>
                          </div>
                          <div class="col-12 col-sm-8 text-end">
                            <Button class="ms-btn btn-clean fix-height--button btn-bg btn-xs-block m-xs-b-2 mb-5">
                              <div class="svg-next-icon-size-16 mr-5 text-secondary d-none d-lg-block">
                                <div class="icon-edit"></div>
                              </div>
                              <div class="p-button-label ml-3">{{
                                  $t('update_tracking_code')
                                }}
                              </div>
                            </Button>
                            <Button
                                class="ms-btn btn-clean ml-10 fix-height--button btn-bg btn-xs-block ml-10 m-xs-l-0 mb-5">
                              <div class="svg-next-icon-size-16 mr-5 text-secondary d-none d-lg-block">
                                <div class="icon-print"></div>
                              </div>
                              <div class="p-button-label ml-3">{{
                                  $t('print_waybill')
                                }}
                              </div>
                            </Button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--header line-bottom">
                    <span class="omni-badge badge-light-success badge-M order-status-badge undefined">
                      <span class="d-flex align-items-center">
                        <span>{{ $t('paid') }}</span>
                      </span>
                    </span>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-15">
                          <label for="" class="title-level--sub">{{ $t('order_note') }}</label>
                          <Textarea :placeholder="$t('add_order_note')"
                                    style="overflow:hidden;overflow-wrap:break-word;height:40px" class="hrv-ui-textarea"
                                    rows="1"/>
                        </div>
                        <div class="mb-15 text-end">
                          <Button class="ms-btn btn-default">
                            <div class="p-button-label ml-3">{{ $t('update') }}</div>
                          </Button>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('product_quantity') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('total_product_amount') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('discount') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('shipping') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('total_order_value') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('paid') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('refunded') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                        <div class="ui-information-body pb-15">
                          <div class="row">
                            <div class="col">
                              {{ $t('net_amount') }}
                            </div>
                            <div class="col-auto text-end">6</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="omni-layout-card card-default ghosty">
                  <HistoryTimeLine :title="$t('history')"></HistoryTimeLine>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--header line-bottom">
                    <span class="header-title">{{ $t('verify_order') }}</span>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="mb-16">{{ $t('please_verify_order') }}</div>
                    <Button class="ms-btn btn-primary w-100">
                      <div class="p-button-label">{{ $t('verify_order') }}</div>
                    </Button>
                  </div>
                  <div class="omni-layout-card--section">
                    <p class="mb-0 d-flex align-items-center">
                      <div class="svg-next-icon-size-16 text-primary mr-10">
                        <div class="icon-accuracy"></div>
                      </div>
                      <span>{{ $t('order_verified') }}</span>
                    </p>
                  </div>
                </div>
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--header line-bottom">
                    <span class="header-title">
                      {{ $t('buyer_info') }}
                    </span>
                  </div>
                  <div class="omni-layout-card--section">
                    <span class="d-block">Haravan Demo</span>
                    <p class="mt-2 mb-0 color-gray-solid table-break-word">hello@haravan.com</p>
                    <div class="mt-2 color-black table-break-word d-flex justify-content-between">
                      <span class="mr-2x5">• <span class="label-hover-description cursor-pointer">{{
                          $t('ordered')
                        }}</span></span>
                      <b>11 Đơn hàng</b>
                    </div>
                  </div>
                  <div class="omni-layout-card--header">
                    <div class="row align-items-center">
                      <div class="col">
                        <span class="header-title">{{ $t('shipping_info') }}</span>
                      </div>
                      <div class="col-auto">
                        <div class="display-none sf-hidden"></div>
                        <div class="svg-next-icon-size-12 text-secondary">
                          <div class="icon-edit"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="omni-layout-card--section-section">
                      <p class="mb-5 table-break-word">Haravan Demo</p>
                      <p class="mb-5 color-gray-solid table-break-word">
                        <span class="text-nodata">{{ $t('no_company_info') }}</span>
                      </p>
                      <p class="mb-5"></p>
                    </div>
                    <div class="omni-layout-card--section-section">
                      <p class="header-title">{{ $t('shipping_address') }}</p>
                      <p class="mb-0 table-break-word">182 Lê Đại Hành, Phường 15, Quận 11, Hồ Chí Minh, Vietnam</p>
                    </div>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="omni-layout-card--section-section">
                      <p class="header-title">{{ $t('customer_note') }}</p>
                      <p class="mb-0 table-break-word text-nodata">{{ $t('no_note') }}</p>
                    </div>
                  </div>
                </div>
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--section">
                    <div class="omni-layout-card--section-section">
                      <p class="header-title">{{ $t('created_by_staff') }}</p>
                      <div class="table-break-word"></div>
                    </div>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="omni-layout-card--section-section">
                      <p class="header-title">{{ $t('sales_stock') }}</p>
                      <div class="table-break-word">
                        <span>{{ $t('default_location') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="omni-layout-card--section">
                    <div class="omni-layout-card--section-section">
                      <div class="d-flex justify-content-between align-content-center">
                        <p class="header-title mb-0">{{ $t('order_conversion') }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="omni-layout-card card-default">
                  <div class="omni-layout-card--section">
                    <div>
                      <div class="d-flex align-items-between justify-content-between mb-2">
                        <span class="label-input-group color-202223">{{ $t('label') }}</span>
                        <div class="display-none sf-hidden"></div>
                        <div></div>
                      </div>
                    </div>
                    <div class="text-end">
                      <Button class="ms-btn btn-default mt-10">
                        <div class="p-button-label">{{ $t('save') }}</div>
                      </Button>
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
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Button from 'primevue/button';
import Textarea from 'primevue/textarea';
import Dropdown from "primevue/dropdown";
import Dialog from 'primevue/dialog';
import Checkbox from 'primevue/checkbox';
import InputNumber from 'primevue/inputnumber';
import RadioButton from 'primevue/radiobutton';
import HistoryTimeLine from "@/components/admin/HistoryTimeLine.vue";

export default {
  components: {
    HistoryTimeLine,
    InputText,
    IconField,
    InputIcon,
    Button,
    Textarea,
    Dropdown,
    Dialog,
    Checkbox,
    InputNumber,
    RadioButton,
  },
  data() {
    return {}
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
.order-detail--list-status {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  margin: 0 -10px;
}

.order-detail-header .ui-toolbar-product-info {
  padding: 6px 10px;
  max-width: 275px;
}

.order-detail--list-status {
  .ui-toolbar-product-info {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    border-right: solid 1px rgba(224, 224, 224, .37);
  }
}

.order-detail--list-status-code {
  font-size: 24px;
}

.order-detail--list-status-name {
  font-size: 16px;
}

.order-detail--list-status .ui-product-body, .order-detail--list-status .ui-product-head {
  margin-bottom: 0 !important;
}

@media (max-width: 575px) {
  .order-detail-header {
    .ui-toolbar-product-info {
      text-align: center;
    }
  }
}
</style>
