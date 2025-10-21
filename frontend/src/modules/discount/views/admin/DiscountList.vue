<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="discount_empty" v-if="discounts.length === 0">
            <div class="row">
              <div class="col-xs-12 col-md-6 m-auto pb-md-0 pb-3">
                <p class="discount_empty__title mb-10">{{ $t('promotion_management') }}</p>
                <p class="discount_empty__desc mb-10">{{ $t('promotion_management_desc') }}</p>
                <div class="d-flex flex-wrap" style="gap:10px">
                  <Button class="ms-btn btn-default fix-height--button btn-bg btn-xs-block m-xs-b-2 mb-5">
                    <div class="svg-next-icon-size-16 mr-5 text-secondary d-none d-lg-block">
                      <div class="icon-edit"></div>
                    </div>
                    <div class="p-button-label ml-3">{{
                        $t('suggest_promotions')
                      }}
                    </div>
                  </Button>
                  <Button class="ms-btn btn-primary fix-height--button btn-xs-block m-xs-b-2 mb-5">
                    <div class="svg-next-icon-size-16 mr-5 text-secondary d-none d-lg-block">
                      <div class="icon-edit"></div>
                    </div>
                    <div class="p-button-label ml-3">{{
                        $t('create_promotion')
                      }}
                    </div>
                  </Button>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 m-auto">
                <img src="/assets/images/discount_empty.svg" alt="" class="img-fluid w-100">
              </div>
            </div>
          </div>
          <div class="omni-layout-body">
            <div class="omni-layout-body-md">
              <div class="row">
                <div class="col-lg-8 col-12">
                  <div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--section">
                          <div>
                            <div class="d-flex justify-content-between">
                              <label for="">{{ $t('discount_code') }}</label>
                            </div>
                            <div class="mt-5">
                              <InputText class="next-input" :placeholder="$t('enter_promotion_code')"></InputText>
                            </div>
                            <p class="text-nodata mt-5">{{ $t('auto_generate_code_desc') }}</p>
                          </div>
                          <div class="mt-15">
                            <label for="" class="mb-5">{{ $t('description') }}</label>
                            <Textarea :rows="2" class="hrv-ui-textarea"
                                      style="overflow:hidden;overflow-wrap:break-word;height:56px"
                                      :placeholder="$t('description')"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('active_time') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="row">
                            <div class="col-6">
                              <div class="mb-5">{{ $t('start_time') }}</div>
                              <div>
                                <Calendar class="input-date-picker input-date-picker--old-style" dateFormat="dd/mm/yy"/>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="hrv-next-input-checkbox ui-table d-flex label-input-group-pricing--list mb-5">
                                <Checkbox v-model="checked" inputId="end_time" class="hrv-next-checkbox"
                                          :binary="true"/>
                                <label for="end_time" class="hrv-next-label--switch">{{ $t('has_end_time') }}</label>
                              </div>
                              <Calendar class="input-date-picker input-date-picker--old-style" dateFormat="dd/mm/yy"/>
                            </div>
                          </div>
                          <div class="row mt-0">
                            <div class="col-12">
                              <div
                                  class="d-flex label-input-group-pricing--list mt-16 hrv-next-input-checkbox ui-table mb-5">
                                <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                                <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                    $t('limit_day_and_time')
                                  }}</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="omni-layout-card card-default">
                      <div class="omni-layout-card--header">
                        <span class="header-title">{{ $t('promotion_type') }}</span>
                      </div>
                      <div class="omni-layout-card--section">
                        <div class="d-flex justify-content-between flex-wrap"></div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('order_discount') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex">
                            <div class="w-50">
                              <label for="" class="mb-15">{{ $t('discount_value') }}</label>
                              <div class="d-flex">
                                <InputNumber inputId="minmax-buttons" mode="decimal"
                                             class="ms-input-number next-input ms-input-number-wrapper" showButtons
                                             :min="0" :max="100"/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('shipping_discount') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex">
                            <div class="w-50">
                              <label for="" class="mb-15">{{ $t('discount_value') }}</label>
                              <div class="d-flex">
                                <InputNumber inputId="minmax-buttons" mode="decimal"
                                             class="ms-input-number next-input ms-input-number-wrapper" showButtons
                                             :min="0" :max="100"/>
                              </div>
                            </div>
                          </div>
                          <div class="border-top mt-10">
                            <div
                                class="d-flex label-input-group-pricing--list mt-16 hrv-next-input-checkbox ui-table mb-5">
                              <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                              <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                  $t('shipping_discount_condition')
                                }}</label>
                            </div>
                            <div class="mt-10 w-50">
                              <InputNumber inputId="minmax-buttons" mode="decimal"
                                           inputClass="text-start"
                                           class="ms-input-number next-input ms-input-number-wrapper" showButtons
                                           :min="0" :max="100"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('applied_products') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div>
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                              <label for="" class="ms-next-label--switch">{{ $t('product_groups') }}</label>
                            </div>
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                              <label for="" class="ms-next-label--switch">{{ $t('products') }}</label>
                            </div>
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                              <label for="" class="ms-next-label--switch">{{ $t('variant') }}</label>
                            </div>
                            <div class="ui-information-body pt-16 pb-16">
                              <InputGroup iconPosition="left" class="next-icon-group--stylized h-40">
                                <InputGroupAddon class="pi pi-search"></InputGroupAddon>
                                <InputText :placeholder="$t('search')"
                                           class="next-input next-input--invisible"
                                />
                              </InputGroup>
                            </div>
                          </div>
                          <div class="border-top mt-15">
                            <div
                                class="d-flex label-input-group-pricing--list mt-16 hrv-next-input-checkbox ui-table my-3">
                              <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                              <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                  $t('promotion_apply_once_per_order')
                                }}</label>
                            </div>
                            <span class="font-italic text-secondary">{{ $t('promotion_apply_each_item_note') }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('minimum_condition') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('no_requirement') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('minimum_order_value') }}</label>
                          </div>
                          <div class="w-50 discount-channel--option mb-15">
                            <div class="my-4">
                              <InputNumber inputId="minmax-buttons" mode="decimal"
                                           :placeholder="$t('price_zero')"
                                           inputClass="text-start"
                                           class="ms-input-number next-input ms-input-number-wrapper text-start"
                                           showButtons
                                           :min="0" :max="100"/>
                            </div>
                            <span class="text-secondary">{{ $t('apply_for', {for: $t('selected_variants')}) }}</span>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('minimum_product_quantity') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('customer_target') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('unlimited_customers') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('customer_groups') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('customer_option') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('applied_channels') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('all_channel') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('channel_options') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('applied_branches') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('all_branches') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('branch_option') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('delivery_area') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('nationwide') }}</label>
                          </div>
                          <div class="d-flex align-items-center pointer ms-next-input-radio">
                            <RadioButton v-model="checked" input-id="conditionOption-1" value="2"/>
                            <label for="" class="ms-next-label--switch">{{ $t('province_option') }}</label>
                          </div>
                          <div class="ui-information-body pt-16 pb-16">
                            <InputGroup iconPosition="left" class="next-icon-group--stylized h-40">
                              <InputGroupAddon class="pi pi-search"></InputGroupAddon>
                              <InputText :placeholder="$t('search')"
                                         class="next-input next-input--invisible"
                              />
                            </InputGroup>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('promotion_combination') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="mb-10">
                            <span>{{ $t('promotion_combination_desc') }}:</span>
                          </div>
                          <div class="mb-10 d-flex mb-5">
                            <div class="d-flex label-input-group-pricing--list hrv-next-input-checkbox ui-table">
                              <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                              <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                  $t('other_promotions')
                                }}</label>
                            </div>
                            <Button class="ms-btn btn-link no-padding text-secondary text-right border-0 ml-5"
                                    style="line-height: 19px">
                              <div class="p-button-label">{{ $t('promotion_count', {count: 0}) }}</div>
                            </Button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="omni-layout-card card-default">
                        <div class="omni-layout-card--header">
                          <span class="header-title">{{ $t('usage_limit') }}</span>
                        </div>
                        <div class="omni-layout-card--section">
                          <div class="d-flex label-input-group-pricing--list hrv-next-input-checkbox ui-table">
                            <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                            <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                $t('total_usage_limit')
                              }}</label>
                          </div>
                          <div class="my-4 w-50">
                            <InputNumber inputId="minmax-buttons" mode="decimal"
                                         :placeholder="$t('price_zero')"
                                         inputClass="text-start"
                                         class="ms-input-number next-input ms-input-number-wrapper text-start"
                                         showButtons
                                         :min="0" :max="100"/>
                          </div>
                          <div class="d-flex label-input-group-pricing--list hrv-next-input-checkbox ui-table">
                            <Checkbox inputId="periodTime" class="hrv-next-checkbox"/>
                            <label for="periodTime" class="font-weight-normal hrv-next-label--switch">{{
                                $t('usage_limit_per_customer')
                              }}</label>
                          </div>
                          <div class="my-4 w-50">
                            <InputNumber inputId="minmax-buttons" mode="decimal"
                                         :placeholder="$t('price_zero')"
                                         inputClass="text-start"
                                         class="ms-input-number next-input ms-input-number-wrapper text-start"
                                         showButtons
                                         :min="0" :max="100"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-12">
                  <div class="discount--right-column">
                    <div class="omni-layout-card card-secondary">
                      <div class="omni-layout-card--header">
                        <div class="header-title">{{ $t('summary') }}</div>
                      </div>
                      <div class="omni-layout-card--section">
                        <div class="d-flex justify-content-between">
                          <strong>{{ $t('type_and_method') }}</strong>
                        </div>
                        <div class="pl-15 m-15 discount-summary">
                          <ul>
                            <li class="mb-5 discount-summary--text-capitalize">{{ $t('discount_code') }}</li>
                          </ul>
                        </div>
                        <div class="d-flex justify-content-between">
                          <strong>{{ $t('details') }}</strong>
                        </div>
                        <div class="my-4">
                          <div class="d-flex justify-content-between">
                            <strong>{{ $t('limit') }}</strong>
                          </div>
                        </div>
                        <div class="pl-15 m-15 discount-summary">
                          <ul>
                            <li class="mb-5">
                              {{ $t('valid_period', {start_date: '10/10/2025', end_date: '10/10/2025'}) }}
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="omni-layout-card card-secondary">
                      <div class="omni-layout-card--header">
                        <span class="header-title">{{ $t('settings') }}</span>
                      </div>
                      <div class="omni-layout-card--section">
                        <div class="d-flex flex-row gap-2 align-items-center justify-content-between">
                          <div>{{ $t('show_suggestions') }}</div>
                          <InputSwitch/>
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

  <Dialog v-model:visible="visibleCreateDiscount" modal
          :draggable="false"
          class="modal_container modal-md modal-dialog omni-modal">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('create_promotion') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <div class="p-15 d-none">
        <div class="discount-template-tabs d-flex">
          <SelectButton v-model="selectedTemplateOption" :options="discountTemplateOptions" optionLabel="value"
                        optionValue="value"
                        dataKey="value"
                        aria-labelledby="basic" class="ms-next-button-group-default" :allowEmpty="false"
                        @change="changeTemplate">
          </SelectButton>
        </div>
        <div class="discount-template-filter">
          <SelectButton v-model="selectedTemplateFilter" :options="discountTemplateFilterOptions" optionLabel="value"
                        optionValue="value"
                        dataKey="value"
                        aria-labelledby="basic" :allowEmpty="false"
                        @change="changeTemplate">
          </SelectButton>
        </div>
        <div class="discount-template-wrapper">
          <div class="discount-template-list">
            <div class="discount-template-item">
              <div class="discount-template-item-icon">
                <div class="svg-next-icon-size-40">
                  <div class="icon-discount-live"></div>
                </div>
              </div>
              <div>
                <div>
                  <p class="discount-template-item-title">{{ $t('discount_specific_products') }}</p>
                  <p class="discount-template-item-desc">{{ $t('discount_specific_products_example') }}</p>
                </div>
                <div class="discount-template-item-tags">
                  <div class="discount-template-item-tag is-popular">{{ $t('popular') }}</div>
                  <div class="discount-template-item-tag">{{ $t('increase_conversion_rate') }}</div>
                  <div class="discount-template-item-tag">{{ $t('increase_repeat_purchase_rate') }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="modal-body-item">
          <div class="modal-body-item-icon border-0 p-0">
            <div class="svg-next-icon-size-40">
              <div class="icon-discount"></div>
            </div>
          </div>
          <div class="modal-body-item-icon-right">
            <div class="svg-next-icon-size-12">
              <div class="icon-next"></div>
            </div>
          </div>
          <div class="modal-body-item-title">
            <label for="">{{ $t('create_discount_code') }}</label>
            <span>{{ $t('discount_code_desc') }}</span>
          </div>
        </div>
        <div class="modal-body-item">
          <div class="modal-body-item-icon border-0 p-0">
            <div class="svg-next-icon-size-40">
              <div class="icon-discount-program"></div>
            </div>
          </div>
          <div class="modal-body-item-icon-right">
            <div class="svg-next-icon-size-12">
              <div class="icon-next"></div>
            </div>
          </div>
          <div class="modal-body-item-title">
            <label for="">{{ $t('create_discount_program') }}</label>
            <span>{{ $t('discount_program_desc') }}</span>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-content-end flex-1">
        <div class="d-flex gap-2">
          <Button class="ms-btn btn-default">
            <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
          </Button>
        </div>
      </div>
    </template>
  </Dialog>
</template>

<script>
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import SelectButton from 'primevue/selectbutton';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Calendar from 'primevue/calendar';
import Checkbox from "primevue/checkbox";
import InputNumber from 'primevue/inputnumber';
import RadioButton from 'primevue/radiobutton';
import InputSwitch from 'primevue/inputswitch';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import {getDiscountDetail} from "@/api/discount";

export default {
  components: {
    Button,
    Dialog,
    SelectButton,
    InputText,
    Textarea,
    Calendar,
    Checkbox,
    InputSwitch,
    InputNumber,
    RadioButton,
    InputGroup,
    InputGroupAddon,
  },
  data() {
    return {
      visibleCreateDiscount: false,
      selectedTemplateOption: null,
      selectedTemplateFilter: null,
      discountTemplateOptions: [
        {
          value: this.$t('promotion_program'),
        },
        {
          value: this.$t('discount_code'),
        },
      ],
      discountTemplateFilterOptions: [
        {
          value: this.$t('all'),
        },
        {
          value: this.$t('increase_conversion_rate'),
        },
        {
          value: this.$t('increase_sales'),
        },
        {
          value: this.$t('increase_repeat_purchase_rate'),
        },
      ],
      discounts: [1],
      checked: false,
    }
  },
  methods: {
    /**
     * click change template discount
     */
    changeTemplate() {
      console.log(this.selectedTemplateOption)
    },

    /**
     * init value
     */
    init() {
      this.selectedTemplateOption = this.discountTemplateOptions[0]?.value;
      this.selectedTemplateFilter = this.discountTemplateFilterOptions[0]?.value;
    }
  },
  created() {
    this.init();
  }
}
</script>

<style lang="scss">
.discount_empty {
  width: 100%;
  height: 100%;
  border-radius: 8px;
  padding: 40px 32px;
  gap: 16px;
  overflow: hidden;

  .row {
    min-height: calc(100vh - 250px);
  }
}

.discount_empty__title {
  font-weight: 600;
  font-size: 20px;
  line-height: 28px;
  color: var(--content-default);
}

.discount_empty__desc {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  color: var(--alias-color-content-neutral);
}

.discount-template-filter {
  margin-top: 12px;

  .p-selectbutton {
    gap: 4px;

    .p-button {
      padding: 6px 10px;
      border: 1px solid var(--alias-color-content-faded);
      border-radius: 4px;
      margin-right: 4px;
      color: var(--alias-color-content-neutral);
      cursor: pointer;

      .p-button-label {
        font-weight: 400;
      }

      &.p-highlight {
        border: 1px solid var(--color-blue-300) !important;
        background: var(--backgroundAccent50);
        color: var(--alias-color-background-accent);
      }
    }
  }
}

.discount-template-wrapper {
  height: 400px;
  overflow: auto;

  .discount-template-list {
    margin-top: 12px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;

    .discount-template-item {
      display: flex;
      border: 1px solid var(--alias-color-border-default);
      border-radius: 8px;
      padding: 12px;
      cursor: pointer;

      &:hover {
        background: var(--bg-tag-color);
      }

      .discount-template-item-icon {
        margin-right: 12px;
      }

      .discount-template-item-title {
        margin-bottom: 10px;
        font-weight: 600;
      }

      .discount-template-item-desc {
        font-size: 12px;
        margin-bottom: 10px;
        color: var(--alias-color-content-neutral);
      }

      .discount-template-item-tags {
        display: flex;
        flex-wrap: wrap;

        .discount-template-item-tag {
          border: 1px solid var(--alias-color-content-faded);
          border-radius: 4px;
          padding: 2px 4px;
          margin-right: 4px;
          color: var(--alias-color-content-neutral);
          font-size: 10px;
          margin-bottom: 4px;

          &.is-popular {
            background: var(--color-green-50);
            border: 1px solid var(--color-green-300);
            color: var(--color-green-600);
          }
        }
      }
    }
  }
}

.discount-summary li {
  list-style-type: initial;
}

.discount-summary--text-capitalize {
  text-transform: lowercase;
}

.discount-channel--option {
  margin-left: 25px;
}
</style>
