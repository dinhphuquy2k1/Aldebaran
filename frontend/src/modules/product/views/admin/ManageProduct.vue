<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container draft-order">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ mode === FORM_MODE.INSERT ? $t('create_product') : '' }}</p>
            </div>
            <div class="col-auto pl-0"></div>
          </div>
          <div class="row">
            <div class="col-lg-9 col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('general_info') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <div>
                      <label>{{ $t('product_name') }}</label>
                    </div>
                    <div class="mt-5">
                      <InputText class="ms-input"
                                 :placeholder="$t('enter_product_name')"></InputText>
                    </div>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('brand') }}</label>
                      </div>
                      <div class="mt-5">
                        <Dropdown
                            optionLabel="label"
                            :placeholder="$t('select_brand')"
                            class="ms-selection"
                        />
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('category') }}</label>
                      </div>
                      <div class="mt-5">
                        <Dropdown
                            optionLabel="label"
                            :placeholder="$t('select_product_type')"
                            class="ms-selection"
                        />
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div>
                      <label>{{ $t('quote') }}</label>
                    </div>
                    <div class="mt-5">
                      <InputText class="ms-input"
                                 :placeholder="$t('product_quote')"></InputText>
                    </div>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                </div>
              </div>

              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('product_images') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">

                </div>
              </div>

              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('product_price') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('sale_price') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputNumber inputId="minmax-buttons" mode="decimal"
                                     class="ms-input-number ms-input-number-size-m ms-input-number-wrapper" showButtons
                                     :min="0" :max="100"/>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('product_compare_price') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputNumber inputId="minmax-buttons" mode="decimal"
                                     class="ms-input-number ms-input-number-size-m ms-input-number-wrapper" showButtons
                                     :min="0" :max="100"/>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('product_inventory_management') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <label for="checkbox-inv" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="checkbox-inv"/>
                      <span class="lh-normal">{{ $t('product_inventory_tracked') }}</span>
                    </label>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('product_cost') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputNumber inputId="minmax-buttons" mode="decimal"
                                     class="ms-input-number ms-input-number-size-m ms-input-number-wrapper" showButtons
                                     :min="0" :max="100"/>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="row pt-15">
                        <div class="col-auto">
                          <p class="font-weight-normal text-secondary">{{ $t('product_margin') }}:</p>
                          <p class="text-secondary">--</p>
                        </div>
                        <div class="col-auto ml-15">
                          <p class="font-weight-normal text-secondary">{{ $t('product_profit') }}:</p>
                          <p class="text-secondary">0đ</p>
                        </div>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('sku') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                        ></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('product_barcode') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                        ></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <label for="checkbox-allow-order" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="checkbox-allow-order"/>
                      <span class="lh-normal">{{ $t('product_allow_backorder') }}</span>
                    </label>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                  <div class="line"></div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('shipping') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <label for="product-shipping" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="product-shipping"/>
                      <span class="lh-normal">{{ $t('product_allow_delivery') }}</span>

                    </label>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('product_weight') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputNumber inputId="minmax-buttons" mode="decimal"
                                     class="ms-input-number ms-input-number-size-m ms-input-number-wrapper" showButtons
                                     :min="0" :max="100"/>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('product_unit') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <label for="product-unit" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="product-unit"/>
                      <span class="lh-normal">{{ $t('product_multi_unit') }}</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('variant') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <label for="checkbox-variants" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="checkbox-variants"/>
                      <span class="lh-normal"> {{ $t('product_multi_variant') }}</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('promotions') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <label for="promotion" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="promotion"/>
                      <span class="lh-normal">{{ $t('no_promotion_applied') }}</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Dialog v-model:visible="visibleComparePrice" modal
          :draggable="false"
          class="modal_container modal-dialog omni-modal modal-lg">
    <template #header>
      <div class="modal-header">
        <h5 class="modal-title">
          {{ $t('edit_compare_price') }}
        </h5>
      </div>
    </template>
    <div class="modal-body">
      <div class="pd-all-20">
        <div class="row no-gutters edit-compared-price">
          <div class="col-12">
            <label for="" class="mb-5">{{ $t('apply_price_all_variants') }}</label>
          </div>
          <div class="col-12 pb-10">
            <div class="d-flex">
              <div class="w-100">
                <div>
                  <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                </div>
              </div>
              <div class="ml-15">
                <Button class="ms-btn ms-btn-default">
                  <div class="p-button-label ml-3">{{ $t('apply') }}</div>
                </Button>
              </div>
            </div>
          </div>
          <div class="col-12 py-3" style="border-top:1px solid rgb(217,217,217)">
            <div class="row">
              <div class="col word-break align-self-center">
                <b>Kem</b>
              </div>
              <div class="col">
                <label class="mb-5">{{ $t("sale_price") }}</label>
                <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
              </div>
              <div class="col">
                <label class="mb-5">{{ $t("product_compare_price") }}</label>
                <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-content-between flex-1">
        <div>
        </div>
        <div class="d-flex gap-2">
          <Button class="ms-btn btn-default">
            <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
          </Button>
          <Button class="ms-btn btn-accent--primary">
            <div class="p-button-label ml-3">{{ $t('update') }}</div>
          </Button>
        </div>
      </div>
    </template>
  </Dialog>
  <Dialog v-model:visible="visibleEditBarcode" modal
          :draggable="false"
          class="modal_container modal-dialog omni-modal">
    <template #header>
      <div class="modal-header">
        <h5 class="modal-title">
          {{ $t('edit_barcode') }}
        </h5>
      </div>
    </template>
    <div class="modal-body">
      <div class="pd-all-20">
        <div class="mb-5 word-break">
          <div class="row">
            <div class="col-12 pt-30">
              <div class="d-flex pb-30 thin-b-line">
                <div class="align-self-center w-75">
                  <b>Kem</b>
                </div>
                <div class="align-self-center">
                  <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                </div>
              </div>
            </div>
            <div class="col-12 pt-30">
              <div class="d-flex pb-30 thin-b-line">
                <div class="align-self-center w-75">
                  <b>Kem</b>
                </div>
                <div class="align-self-center">
                  <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-content-between flex-1">
        <div>
        </div>
        <div class="d-flex gap-2">
          <Button class="ms-btn btn-default">
            <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
          </Button>
          <Button class="ms-btn btn-accent--primary">
            <div class="p-button-label ml-3">{{ $t('update') }}</div>
          </Button>
        </div>
      </div>
    </template>
  </Dialog>
  <Dialog v-model:visible="visibleEditSKU" modal
          :draggable="false"
          class="modal_container modal-dialog omni-modal">
    <template #header>
      <div class="modal-header">
        <h5 class="modal-title">
          {{ $t('edit_sku') }}
        </h5>
      </div>
    </template>
    <div class="modal-body">
      <div class="pd-all-20">
        <div class="mb-5 word-break">
          <div class="row">
            <div class="col-12 pt-30">
              <div class="d-flex pb-30 thin-b-line">
                <div class="align-self-center w-75">
                  <b>Kem</b>
                </div>
                <div class="align-self-center">
                  <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                </div>
              </div>
            </div>
            <div class="col-12 pt-30">
              <div class="d-flex pb-30 thin-b-line">
                <div class="align-self-center w-75">
                  <b>Kem</b>
                </div>
                <div class="align-self-center">
                  <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-content-between flex-1">
        <div>
        </div>
        <div class="d-flex gap-2">
          <Button class="ms-btn btn-default">
            <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
          </Button>
          <Button class="ms-btn btn-accent--primary">
            <div class="p-button-label ml-3">{{ $t('update') }}</div>
          </Button>
        </div>
      </div>
    </template>
  </Dialog>
</template>

<script>
import InputText from 'primevue/inputtext';
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';
import Checkbox from "primevue/checkbox";
import Dialog from "primevue/dialog";
import InputNumber from 'primevue/inputnumber';
import {FORM_MODE} from "@/core/constants";

export default {
  components: {
    InputText,
    Dropdown,
    Button,
    Checkbox,
    Dialog,
    InputNumber,
  },
  computed: {
    FORM_MODE() {
      return FORM_MODE
    }
  },
  data() {
    return {
      mode: null,
      visibleComparePrice: false,
      visibleEditBarcode: false,
      visibleEditSKU: false,
    }
  },
  created() {
    this.mode = this.$route.params['productId'] ? FORM_MODE.UPDATE : FORM_MODE.INSERT;
  }
}
</script>

<style lang="scss" scoped>
.line {
  height: 1px;
  width: 100%;
  background: var(--alias-color-border-default);
}

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
