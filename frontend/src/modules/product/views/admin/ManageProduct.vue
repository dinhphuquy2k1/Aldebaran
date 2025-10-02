<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container pb-0 pt-30">
          <div class="row">
            <div class="col">
              <label for="" class="title-header">{{ mode === FORM_MODE.INSERT ? $t('create_product') : '' }}</label>
            </div>
            <div class="col-auto"></div>
          </div>
        </div>
        <div class="padding-container pb-0 pt-30">
          <div class="row">
            <div class="col-lg-9 col-12">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('general_info') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0">
                      <label class="label-input-group">
                        {{ $t('product_name') }}
                      </label>
                      <div>
                        <InputText class="next-input" :placeholder="$t('enter_product_name')"></InputText>
                      </div>
                    </div>
                    <div class="form-group px-0">
                      <div class="row">
                        <div class="col-sm-6 col-12">
                          <label for="" class="label-input-group">{{ $t('brand') }}</label>
                          <Dropdown
                              optionLabel="label"
                              :placeholder="$t('add_filter_condition')"
                              class="next-dropdown"
                              style="margin-bottom: 5px"
                          />
                        </div>
                        <div class="col-sm-6 col-12">
                          <label for="" class="label-input-group">{{ $t('category') }}</label>
                          <Dropdown
                              optionLabel="label"
                              :placeholder="$t('add_filter_condition')"
                              class="next-dropdown"
                              style="margin-bottom: 5px"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="form-group px-0">
                      <label for="" class="label-input-group">{{ $t('product_description') }}</label>
                    </div>
                    <div class="form-group px-0 pb-0">
                      <label for="" class="label-input-group">{{ $t('quote') }}</label>
                      <div>
                        <InputText class="next-input" :placeholder="$t('product_quote')"></InputText>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="row">
                      <div class="col">
                        <span class="ui-information-title">
                          <div class="d-flex align-items-center">
                            {{ $t('product_images') }}
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="ui-product-photo product-upload-image">
                    <ul class="ui-product-photo-grid clearfix">
                      <li class="ui-product-photo-item"></li>
                      <li class="ui-product-photo-item d-block"></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_price') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="row product-pricing">
                      <div class="col-12 col-md-6 pt-15">
                        <label for="" class="mb-5">
                          <div class="d-flex align-items-center">
                            {{ $t('sale_price') }}
                            <span class="trigger d-inline-flex align-items-center mgl-1">
                              <div class="svg-next-icon-size-16 svg-color-lightblue">
                                <div class="icon-question-mark"></div>
                              </div>
                            </span>
                          </div>
                        </label>
                        <div>
                          <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 pt-15">
                        <label for="" class="mb-5">
                          <div class="d-flex align-items-center">
                            {{ $t('product_compare_price') }}
                            <span class="trigger d-inline-flex align-items-center mgl-1">
                              <div class="svg-next-icon-size-16 svg-color-lightblue">
                                <div class="icon-question-mark"></div>
                              </div>
                            </span>
                          </div>
                        </label>
                        <div>
                          <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_inventory_management') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="row">
                      <div class="col-6 pt-15">
                        <div class="hrv-next-input-checkbox ui-table">
                          <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                          <label for="" class="hrv-next-label--switch">{{ $t('product_inventory_tracked') }}</label>
                        </div>
                      </div>
                      <div class="col-6 pt-15"></div>
                      <div class="col-md-6 col-12 pt-15">
                        <label for="" class="mb-5">
                          <div class="d-flex align-items-center">
                            {{ $t('product_cost') }}
                            <span class="trigger d-inline-flex align-items-center mgl-1">
                              <div class="svg-next-icon-size-16 svg-color-lightblue">
                                <div class="icon-question-mark"></div>
                              </div>
                            </span>
                          </div>
                        </label>
                        <div>
                          <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 pt-15">
                        <div class="row pt-15">
                          <div class="col-auto">
                            <p class="font-weight-normal text-secondary">{{ $t('product_margin') }}:</p>
                            <b class="text-secondary">--</b>
                          </div>
                          <div class="col-auto ml-15">
                            <p class="font-weight-normal text-secondary">
                              {{ $t('product_profit') }}
                            </p>
                            <b class="text-secondary">0 ₫</b>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-md-6 pt-15">
                            <label for="" class="mb-5">
                              <div class="d-flex align-items-center">
                                {{ $t('sku') }}
                                <span class="trigger d-inline-flex align-items-center mgl-1">
                              <div class="svg-next-icon-size-16 svg-color-lightblue">
                                <div class="icon-question-mark"></div>
                              </div>
                            </span>
                              </div>
                            </label>
                            <div>
                              <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 pt-15">
                            <label for="" class="mb-5">
                              <div class="d-flex align-items-center">
                                {{ $t('product_barcode') }}
                                <span class="trigger d-inline-flex align-items-center mgl-1">
                                  <div class="svg-next-icon-size-16 svg-color-lightblue">
                                    <div class="icon-question-mark"></div>
                                  </div>
                                </span>
                              </div>
                            </label>
                            <div>
                              <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 pt-15">
                        <div class="hrv-next-input-checkbox ui-table">
                          <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                          <label for="" class="hrv-next-label--switch">{{ $t('product_allow_backorder') }}</label>
                        </div>
                      </div>
                      <div class="col-12 my-4">
                        <div class="row mx-0 pt-10 border-top--line">
                          <div class="col pl-0">
                            <label for="" class="my-3">{{ $t('product_available_stock') }}</label>
                          </div>
                          <div class="col-auto pr-0">
                            <div>
                              <Button class="ms-btn btn-link text-end">
                                <div class="p-button-label lh-normal ml-5">{{ $t('product_select_warehouse') }}</div>
                              </Button>
                            </div>
                          </div>
                        </div>
                        <div class="row pb-10">
                          <div class="col">
                            <IconField iconPosition="left" class="d-flex flex-1">
                              <InputIcon class="pi pi-search"></InputIcon>
                              <InputText v-model="value1" :placeholder="$t('product_search_warehouse')"
                                         class="flex-1 next-input--stylized"/>
                            </IconField>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('shipping') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0">
                      <div class="hrv-next-input-checkbox ui-table">
                        <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                        <label for="" class="hrv-next-label--switch">{{ $t('product_allow_delivery') }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_unit') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0">
                      <div class="hrv-next-input-checkbox ui-table">
                        <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                        <label for="" class="hrv-next-label--switch">{{ $t('product_multi_unit') }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('variant') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div>
                      <div>
                        <div>
                          <div class="col-12 border-bottom padding-y-20px">
                            <div class="row align-items-center">
                              <div class="col-4">
                                <div></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 border-bottom">
                        <div class="product-attribute--add text-primary align-items-center font-weight-500 pointer">
                          <div class="svg-next-icon-size-14">
                            <div class="icon-add"></div>
                          </div>
                          <span>{{ $t('add_another_attribute') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="variants-preview pt-16">
                      <div class="row m-0">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('product_groups') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0 product-new--comboboxCollection">
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('promotions') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0 product-new--comboboxCollection">
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-body">
                    <div class="d-flex align-items-center justify-content-between mb-5">
                      <div class="ui-information-title">{{ $t('label') }}</div>
                      <Button
                          class="ms-btn btn-link no-padding label-input-group"
                          :label="$t('all_labels')"></Button>
                    </div>
                    <div>
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
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
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';
import Checkbox from "primevue/checkbox";
import {FORM_MODE} from "@/core/constants";

export default {
  components: {
    InputText,
    Dropdown,
    Button,
    Checkbox,
  },
  computed: {
    FORM_MODE() {
      return FORM_MODE
    }
  },
  data() {
    return {
      mode: null,
    }
  },
  created() {
    this.mode = this.$route.params['productId'] ? FORM_MODE.UPDATE : FORM_MODE.INSERT;
  }
}
</script>

<style lang="scss" scoped>
.product-attribute--add {
  display: flex;
  margin: 16px 0;
  gap: 15px;
}

.ui-product-photo {
  position: relative;
  padding: 16px 0;

  .ui-product-photo-grid {
    list-style-type: none;
    padding: 0;
    margin: 0 0 -10px -10px;

    .ui-product-photo-item {
      width: 33.33%;
      float: left;
      padding-left: 10px;
      margin: 0 0 11px;
      box-sizing: border-box;
    }
  }
}

@media (min-width: 768px) {
  .ui-product-photo {
    .ui-product-photo-grid {
      .ui-product-photo-item {
        width: 20%;

        &:first-child {
          width: 40%;
        }
      }
    }
  }
}

@media (min-width: 992px) {
  .ui-product-photo {
    .ui-product-photo-grid {
      .ui-product-photo-item {
        width: 16.66%;

        &:first-child {
          width: 33.33%;
        }
      }
    }
  }
}
</style>
