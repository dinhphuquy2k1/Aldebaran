<template>
  <TopActionBar/>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container draft-order">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('create_order') }}</p>
            </div>
            <div class="col-auto pl-0"></div>
          </div>
          <div class="row">
            <div class="col-md-8 col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('products') }}</p>
                    <p class="text-body-m link">{{ $t('create_custom_product') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="d-flex gap-2 align-items-center">
                    <IconField iconPosition="left" class="ms-input-size-m d-flex flex-1">
                      <InputIcon class="pi pi-search"></InputIcon>
                      <InputText v-model="value1" :placeholder="$t('search')" class="flex-1 ms-input-wrapper"/>
                    </IconField>
                    <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
                      <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('search') }}</div>
                    </Button>
                  </div>

                  <div class="header">
                    <div class="linesTableHeader text-body-m align-items-center">
                      <div>{{ $t('products') }}</div>
                      <div class="text-end">{{ $t('quantity') }}</div>
                      <div class="text-end">{{ $t('subtotal') }}</div>
                    </div>
                  </div>
                  <div class="linesTableHeader text-body-m">
                    <div class="w-100 d-flex min-width-0" style="gap: 8px;">
                      <div class="image-wrapper">
                        <div class="hrv-image-thumbnail">
                          <div class="icon-image-default svg-next-icon-size-20 hrv-image-thumbnail--image"></div>
                        </div>
                      </div>
                      <div class="productInfo min-width-0" style="flex-grow: 1;">
                        <div class="d-flex flex-column gap-1">
                          <div class="d-flex d-md-block justify-content-between">
                            <span class="productTitle text-body-m">Loa Bluetooth B&O Beoplay</span>
                          </div>
                          <p class="text-body-m content-neutral">Trắng</p>
                          <div class="d-flex gap-1">
                            <div class="text-content_accent cursor-pointer text-body-m pointer"
                                 @click="showModalAddDiscount">4,550,000 ₫
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-flex flex-column gap-2 align-items-end">
                      <InputNumber inputId="minmax-buttons" mode="decimal"
                                   class="ms-input-number ms-input-number-size-m ms-input-number-wrapper" showButtons
                                   :min="0" :max="100"/>
                    </div>
                    <div class="d-none d-md-block text-end text-body-m">0 đ</div>
                    <div class="d-none d-md-block cursor-pointer trashWrapper pointer">
                      <div class="svg-next-icon-size-20" style="color: var(--global-color-coolgray-400)">
                        <div class="icon-trash"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgb-4">
                <div class="hrv-card-head">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-headl">{{ $t('payment') }}</p>
                  </div>
                </div>
                <div class="hrv-card-section">
                  <div class="w-100 pdb-3">
                    <div class="d-flex justify-content-between align-items-center">
                      <Button
                          class="ms-btn bg-transparent ms-btn-size-m p-0 text-content_accent"
                          @click="showModalAddDiscount(0)">
                        <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('add_promotion') }}</div>
                      </Button>
                      <div>
                        <span class="recommend-button disabled"></span>
                      </div>
                    </div>
                  </div>
                  <div style="height: 1px; width: 100%; background: var(--alias-color-border-default, #E5E7EB);"></div>
                  <div class="pricing-wrapper">
                    <div class="pricing-line">
                      <p class="text-body-m">{{ $t('product_amount') }}</p>
                      <p class="text-body-m">--</p>
                      <p class="text-body-m text-end">0 ₫</p>
                    </div>
                    <div class="pricing-line">
                      <p class="text-body-m pointer" style="width: fit-content; color: rgb(36, 99, 235);">
                        {{ $t('shipping_fee') }}</p>
                      <p class="text-body-m">--</p>
                      <p class="text-body-m text-end">0 ₫</p>
                    </div>
                    <div class="pricing-line">
                      <p class="text-body-m fw-600">{{ $t('total_amount') }}</p>
                      <p class="text-body-m">--</p>
                      <p class="text-body-m text-end fw-600">0 ₫</p>
                    </div>
                  </div>
                  <div class="create-order-btn">
                    <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
                      <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('copy_cart_link') }}</div>
                    </Button>
                    <Button class="ms-btn btn-accent--primary ms-btn-size-m" disabled>
                      <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('create_order') }}</div>
                    </Button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="hrv-card order-informations">
                <div class="hrv-card-head order-informations--header d-flex justify-content-between align-items-center">
                  {{ $t('customers') }}
                  <div class="btn-mono--plain svg-next-icon-size-20">
                    <div class="icon-close-no-circle"></div>
                  </div>
                </div>
                <div class="hrv-card-section order-informations--section">
                  <div class="customer-membership-wrapper-default">
                    <div class="d-flex align-items-center gap-4 w-100">
                      <div class="d-flex gap-2 flex-grow-1 min-width-0">
                        <span class="avatar" style="background: rgb(252, 98, 93);">
                          <span class="omni-avatar-string">HD</span>
                        </span>
                        <div class="d-flex flex-column gap-1 flex-grow-1 min-width-0">
                          <p class="text-body-m fw-semi-bold">Haravan Demo</p>
                          <p class="text-body-s content-neutral text-truncate">hello@haravan.com</p>
                        </div>
                        <div class="icon-next svg-next-icon-size-10" style="margin: auto 0"></div>
                      </div>
                    </div>
                  </div>
                  <div class="order-informations--section--shipping">
                    <div
                        class="order-informations--section--shipping-title pdb-2 d-flex justify-content-between align-items-center">
                      <p class="text-headm">{{ $t('shipping_info') }}</p>
                      <div class="text-end">
                        <div class="svg-next-icon-size-12 text-secondary">
                          <div class="icon-edit"></div>
                        </div>
                      </div>
                    </div>
                    <div class="order-informations--section--shipping-info">
                      <p class="text-body-m">182 Lê Đại Hành, Phường 15, Quận 11, Hồ Chí Minh, Vietnam</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card order-informations">
                <div class="hrv-card-head">{{ $t('other_info') }}</div>
                <div class="hrv-card-section order-informations--section">
                  <div class="d-flex gap-2 align-items-center justify-content-between">
                    <p class="text-body-m" style="max-width: 88px; min-width: 88px;">{{ $t('sale_channel') }}</p>
                    <Dropdown
                        :options="options"
                        optionLabel="label"
                        :placeholder="$t('add_filter_condition')"
                        class="ms-selection"
                        style="margin-bottom: 5px"
                    />
                  </div>
                  <div class="d-flex gap-2 align-items-center justify-content-between">
                    <p class="text-body-m" style="max-width: 88px; min-width: 88px;">{{ $t('sales_stock') }}</p>
                    <Dropdown
                        :options="options"
                        optionLabel="label"
                        :placeholder="$t('add_filter_condition')"
                        class="ms-selection"
                        style="margin-bottom: 5px"
                    />
                  </div>
                  <div class="d-flex gap-2 align-items-center justify-content-between">
                    <p class="text-body-m" style="max-width: 88px; min-width: 88px;">{{ $t('price_list') }}</p>
                    <Dropdown
                        :options="options"
                        optionLabel="label"
                        :placeholder="$t('add_filter_condition')"
                        class="ms-selection"
                        style="margin-bottom: 5px"
                    />
                  </div>
                </div>
              </div>

              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('note') }}</p>
                </div>
                <div class="hrv-card-section">
                  <div class="d-flex flex-column justify-content-between">
                    <Textarea rows="3" class="ms-textarea"
                              style="overflow: hidden; overflow-wrap: break-word; height: 58px;"
                              :placeholder="$t('enter_note')"/>
                  </div>
                </div>
              </div>

              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('attribute') }}</p>
                </div>
                <div class="hrv-card-section">
                  <div class="draft-order-attributes">
                    <div class="draft-order-attributes--item-wrapper">
                      <div class="draft-order-attributes--item-wrapper-item">
                        <InputText class="ms-input"></InputText>
                        <InputText class="ms-input"></InputText>
                      </div>
                      <div class="btn-mono--plain svg-next-icon-size-20 pointer">
                        <div class="icon-close-no-circle svg-next-icon-size-20"></div>
                      </div>
                    </div>
                  </div>
                  <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
                    <div class="svg-next-icon-size-20">
                      <div class="icon-add-circle"></div>
                    </div>
                    <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('add_attribute') }}</div>
                  </Button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <Dialog v-model:visible="visibleCreateProductCustom" modal :header="$t('create_custom_product')"
          :style="{ width: '400px' }" class="modal_container">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('create_custom_product') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <div class="hrv-card-section create-product-wrapper">
        <div class="row">
          <div class="col-12">
            <label for="" class="mb-5">{{ $t('product_name') }}</label>
            <InputText class="ms-input" :placeholder="$t('enter_product_name')"></InputText>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-12">
            <label for="" class="mb-5">{{ $t('price') }}</label>
            <InputText class="ms-input" :placeholder="$t('enter_product_name')"></InputText>
          </div>
          <div class="col-sm-6 col-12">
            <label for="" class="mb-5">{{ $t('quantity') }}</label>
            <InputText class="ms-input" :placeholder="$t('enter_product_name')"></InputText>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="has_delivery" class="d-flex align-items-center gap-2 pointer">
              <Checkbox inputId="has_delivery"/>
              {{ $t('has_delivery') }}
            </label>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-end gap-2">
        <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m" disabled>
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('create_product') }}</div>
        </Button>
      </div>
    </template>
  </Dialog>
  <Dialog v-model:visible="visibleCreateDiscount" modal
          @afterHide="hideModalAddDiscount"
          :style="{ width: '600px' }" class="modal_container">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('add_promotion') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <div class="hrv-card-section create-product-wrapper">
        <div class="row">
          <div class="col-12">
            <label for="claim-coupon" class="d-flex align-items-center gap-2 pointer">
              <RadioButton v-model="promotionsType" name="coupon" input-id="claim-coupon" value="1"/>
              {{ createDiscountType ? $t('set_new_price_for_product') : $t('enter_promotion_code') }}
            </label>
          </div>
        </div>
        <div class="row" v-if="promotionsType === '1'">
          <div class="col-12">
            <InputText class="ms-input" :placeholder="$t('enter_product_name')"></InputText>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="claim-custom" class="d-flex align-items-center gap-2 pointer">
              <RadioButton v-model="promotionsType" name="coupon" input-id="claim-custom" value="2"/>
              {{ createDiscountType ? $t('discount_product') : $t('enter_custom_promotion') }}
            </label>
          </div>
        </div>
        <div class="row" v-if="promotionsType === '2'">
          <div class="col-sm-6 col-12">
            <label for="" class="mb-5">{{ $t('price') }}</label>
            <Dropdown
                :disabled="promotionsType === '1'"
                :options="options"
                optionLabel="label"
                :placeholder="$t('add_filter_condition')"
                class="ms-selection"
                style="margin-bottom: 5px"
            />
          </div>
          <div class="col-sm-6 col-12">
            <label for="" class="mb-5">{{ $t('quantity') }}</label>
            <InputNumber :disabled="promotionsType === '1'" min="0" inputId="integeronly"
                         class="ms-input-number ms-input-number-size-m ms-input-number-wrapper"/>
          </div>
        </div>
        <div class="row" v-if="promotionsType === '2'">
          <div class="col-12">
            <label for="" class="mb-5">{{ $t('discount_reason') }}</label>
            <InputText class="ms-input"></InputText>
            <p class="pdt-1 content-coolgray--500 text-body-m add-promotions-wrapper--reason-title">
              {{ $t('discount_reason_visible') }}</p>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-end gap-2">
        <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m">
          <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('save') }}</div>
        </Button>
      </div>
    </template>
  </Dialog>

  <Dialog v-model:visible="visibleAddProduct" modal :style="{ width: '800px' }" class="modal_container">
    <template #container>
      <ProductSelector :title="$t('all_products')"/>
    </template>
    <ProductSelector/>
  </Dialog>
</template>
<script>
import TopActionBar from "@/components/admin/TopActionBar.vue";
import InputText from 'primevue/inputtext';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import Button from 'primevue/button';
import Textarea from 'primevue/textarea';
import Dropdown from "primevue/dropdown";
import Dialog from 'primevue/dialog';
import Checkbox from 'primevue/checkbox';
import InputNumber from 'primevue/inputnumber';
import RadioButton from 'primevue/radiobutton';
import ProductSelector from "@/components/admin/ProductSelector.vue";

export default {
  components: {
    TopActionBar,
    InputText,
    InputGroup,
    InputGroupAddon,
    Button,
    Textarea,
    Dropdown,
    Dialog,
    Checkbox,
    InputNumber,
    RadioButton,
    ProductSelector,
  },
  data() {
    return {
      options: [],
      visibleCreateProductCustom: false,
      visibleCreateDiscount: false,
      createDiscountType: 1,
      promotionsType: '1',
      visibleAddProduct: false,
    }
  },
  methods: {
    showModalAddDiscount(type = 1) {
      this.createDiscountType = type;
      this.visibleCreateDiscount = true;
    },
    hideModalAddDiscount() {
      this.createDiscountType = 1;
      this.promotionsType = '1';
    }
  }
}
</script>

<style lang="scss" scoped>
.order-informations--section {
  display: flex;
  flex-direction: column;
  gap: var(--gap-3);
}

.pricing-wrapper {
  display: flex;
  gap: var(--gap-2);
  padding-top: var(--gap-3);
  flex-direction: column;

  .pricing-line {
    display: grid;
    width: 100%;
    grid-template-columns: 1fr 1fr 100px;
  }
}

.customer-membership-wrapper-default {
  padding: 12px;
  border: 1px solid #d4d4d4;
  border-radius: var(--gap-2);
  overflow: hidden;
}

.order-informations--section--shipping {
  padding-top: var(--gap-3);
  border-top: 1px solid var(--alias-color-border-default);
}

.create-order-btn {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding-top: var(--gap-3);
  gap: var(--gap-2);
}

.draft-order-attributes {
  display: flex;
  flex-direction: column;
  gap: var(--gap-3);
  margin-bottom: var(--gap-3);

  .draft-order-attributes--item-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: var(--gap-2, 8px);

    .draft-order-attributes--item-wrapper-item {
      flex-grow: 1;
      gap: var(--gap-2, 8px);
      display: grid;
      grid-template-columns:  2fr 3fr;
    }
  }
}

.create-product-wrapper {
  display: flex;
  flex-direction: column;
  gap: var(--gap-3);
}

.draft-order {
  .header {
    display: block;

    .hrv-image-thumbnail {
      &:before {
        border-radius: var(--gap-2);
      }
    }
  }

  .linesTableHeader {
    display: grid;
    gap: var(--gap-2);
    min-height: 36px;
    border-bottom: 1px solid var(--alias-color-border-default);
    padding: 12px 0;
    grid-column-gap: 8px;
  }

  .productTitle {
    color: var(--alias-color-content-accent);
    cursor: pointer;
    width: -moz-fit-content;
    width: fit-content;
  }
}

@media only screen and (min-width: 320px) {
  .draft-order {
    .header {
      display: none;
    }
  }
}

@media only screen and (min-width: 808px) {
  .draft-order {
    .header {
      display: block;
    }

    .linesTableHeader {
      grid-template-columns: 2fr minmax(80px, 130px) minmax(108px, 1fr) minmax(24px, 24px);
    }
  }
}
</style>
