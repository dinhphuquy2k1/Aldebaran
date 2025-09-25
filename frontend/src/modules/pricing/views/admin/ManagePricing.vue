<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="omni-layout-body">
          <div class="omni-layout-body-lg">
            <div class="row no-gutters pt-30">
              <div class="title--left col align-items-center d-flex">
                <div class="pricing-list-title title-page pricing_list-detail--title">
                  <span>{{ $t('create_price_list') }}</span>
                </div>
                <div class="ml-15 align-self-center">
                  <span class="omni-badge badge-light-default badge-M">{{ $t('inactive') }}</span>
                </div>
              </div>
              <div class="col-auto title--right">
                <div class="display-none sf-hidden"></div>
                <div class="ml-15">
                  <Button class="ms-btn discount--action-disable">
                    <div class="p-button-label lh-normal ml-5">{{ $t('suspend') }}</div>
                  </Button>
                </div>
              </div>
            </div>
            <div class="mt-15">
              <div class="row pricing-list--summary-content g-3">
                <div class="col-md-8 col-12">
                  <div class="omni-layout-card card-default mt-0 mb-15">
                    <div class="ui-information">
                      <div class="mb-15">
                        <span class="ui-information-title text-transform-normal">
                          {{ $t('basic_information') }}
                        </span>
                      </div>
                      <div class="row">
                        <div class="col-12 mb-15">
                          <label for="" class="label-input-group-pricing--list">{{ $t('price_list_name') }}</label>
                          <InputText class="next-input" :placeholder="$t('enter_product_name')"></InputText>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-12">
                          <div class="mb-15">
                            <label for="" class="label-input-group-pricing--list">{{ $t('start_time') }}</label>
                            <Calendar class="input-date-picker input-date-picker--old-style" dateFormat="dd/mm/yy"/>
                          </div>
                          <div>
                            <div class="d-flex label-input-group-pricing--list">
                              <label for="" class="font-weight-normal m-0">{{ $t('end_time') }}</label>
                              <Checkbox inputId="has_delivery" class="ml-10"/>
                            </div>
                            <Calendar class="input-date-picker input-date-picker--old-style" dateFormat="dd/mm/yy"/>
                          </div>
                        </div>
                        <div class="col-lg-6 col-12 mt-lg-0 mt-15">
                          <div class="ui-information-body h-100">
                            <label for="" class="label-input-group-pricing--list">{{ $t('description') }}</label>
                            <Textarea :rows="2" class="hrv-ui-textarea"
                                      style="overflow:hidden;overflow-wrap:break-word;height:118px"
                                      :placeholder="$t('description')"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="omni-layout-card card-default mt-0">
                    <div class="ui-information p-0 position-relative">
                      <div class="p-16px py-0 d-flex align-items-center flex-wrap">
                        <div class="pt-16 ui-information-title text-transform-normal">
                          {{ $t('applied_products') }}
                        </div>
                      </div>
                      <div class="p-16px" v-if="mode === FORM_MODE.INSERT">
                        <div class="omni-alert-pannel">
                          <div class="d-flex justify-content-start alert alert-md alert-default box-shadow">
                            <div class="omni-alert-pannel--icon svg-next-icon-size-22" style="color:rgb(92,95,98)">
                              <div class="icon-help"></div>
                            </div>
                            <div class="p-0 flex-grow-1">
                              <div class="row">
                                <div class="col-12 col-sm omni-alert-pannel--content">
                                  <div class="omni-alert-pannel--description mb-0">{{
                                      $t('applied_products_note')
                                    }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                          class="border-radius-8px row no-gutters align-items-center justify-content-center empty-wrap w-100"
                          style="padding:30px 0px 50px;background:rgb(255,255,255)"
                          v-else>
                        <div class="col flex-column text-center d-flex align-items-center">
                          <div class="svg-next-icon-size-100 color-heather">
                            <svg class="svg-next-icon color-heather svg-next-icon-size-100" width="100" height="100">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91 57" fill="none">
                                <path
                                    d="M45.5 57C70.3528 57 90.5 52.5228 90.5 47C90.5 41.4772 70.3528 37 45.5 37C20.6472 37 0.5 41.4772 0.5 47C0.5 52.5228 20.6472 57 45.5 57Z"
                                    fill="#E0E7FF"></path>
                                <path
                                    d="M77.8438 18.7395L63.5759 2.74893C62.8911 1.65898 61.8913 1 60.838 1H30.162C29.1088 1 28.1089 1.65898 27.4241 2.74754L13.1562 18.7409V31.5854H77.8438V18.7395Z"
                                    fill="#E0E7FF" stroke="#2962FF"></path>
                                <path
                                    d="M59.0183 23.148C59.0183 20.9166 60.4161 19.0746 62.15 19.0732H77.8438V44.288C77.8438 47.2395 75.9875 49.6585 73.6953 49.6585H17.3047C15.0125 49.6585 13.1562 47.2381 13.1562 44.288V19.0732H28.85C30.5839 19.0732 31.9817 20.9125 31.9817 23.1438V23.1744C31.9817 25.4057 33.395 27.2075 35.1275 27.2075H55.8725C57.605 27.2075 59.0183 25.3891 59.0183 23.1577V23.148Z"
                                    fill="white" stroke="#2962FF"></path>
                              </svg>
                            </svg>
                          </div>
                          <div class="text-center font-size-20px mb-3 text-no--data">{{
                              $t('price_list_no_products')
                            }}
                          </div>
                          <div class="d-flex justify-content-center flex-wrap gap-2">
                            <Button
                                class="ms-btn d-inline-block btn-bg btn-clean border-0 content-secondary font-weight-semibold height-40px">
                              <div class="p-button-label ml-3 lh-normal">{{
                                  $t('price_list_import_products')
                                }}
                              </div>
                            </Button>
                            <Button class="ms-btn btn-primary align-items-center">
                              <div class="svg-next-icon-size-14">
                                <div class="icon-add"></div>
                              </div>
                              <div class="p-button-label lh-normal ml-5">{{ $t('price_list_add_product') }}</div>
                            </Button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="my-5 logs-wrapper" v-if="mode === FORM_MODE.UPDATE">
                    <HistoryTimeLine :title="$t('history')"></HistoryTimeLine>
                  </div>
                  <div class="d-flex" v-if="mode === FORM_MODE.UPDATE">
                    <div class="mt-5">
                      <Button class="ms-btn ms-btn-danger">
                        <div class="p-button-label lh-normal ml-5">{{ $t('price_list_delete') }}</div>
                      </Button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <div class="omni-layout-card card-default mt-0 pb-15">
                    <div class="ui-information">
                      <span class="ui-information-title text-transform-normal">{{ $t('apply_condition') }}</span>
                    </div>
                    <div class="ui-information py-0 align-items-center">
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('sale_channel') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_channels') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('channel_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('branch') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_branches') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('branch_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('applied_audience') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{
                                $t('unlimited_customers')
                              }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('customer_group') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{
                                $t('customer_options')
                              }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('staff') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_staff') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('staff_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
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
  <Dialog v-model:visible="visibleSelectProduct" modal :style="{ width: '800px' }" class="modal_container">
    <template #container>
      <ProductSelector :title="$t('find_product')" :finish-title="$t('add')"/>
    </template>
    <ProductSelector/>
  </Dialog>
</template>

<script>
import InputText from 'primevue/inputtext';
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import RadioButton from 'primevue/radiobutton';
import Calendar from 'primevue/calendar';
import Button from "primevue/button";
import HistoryTimeLine from "@/components/admin/HistoryTimeLine.vue";
import {FORM_MODE} from "@/core/constants";
import Dialog from "primevue/dialog";
import ProductSelector from "@/components/admin/ProductSelector.vue";

export default {
  computed: {
    FORM_MODE() {
      return FORM_MODE
    }
  },
  components: {
    ProductSelector,
    InputText,
    Textarea,
    Checkbox,
    RadioButton,
    Calendar,
    Button,
    HistoryTimeLine,
    Dialog,
  },
  data() {
    return {
      mode: null,
      visibleSelectProduct: true,
    }
  },
  created() {
    this.mode = this.$route.params['id'] ? FORM_MODE.UPDATE : FORM_MODE.INSERT;
  }
}
</script>

<style lang="scss" scoped>
.label-input-group-pricing--list {
  margin: 5px 0;
  font-weight: unset;
}
</style>
