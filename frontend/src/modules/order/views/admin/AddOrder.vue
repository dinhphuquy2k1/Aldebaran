<template>
  <TopActionBar/>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
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
                      <p style="color: rgb(156, 163, 176); cursor: not-allowed; width: fit-content;">
                        {{ $t('add_promotion') }}</p>
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
                        <InputText></InputText>
                        <InputText></InputText>
                      </div>
                      <div class="btn-mono--plain svg-next-icon-size-20 pointer">
                        <div class="icon-close-no-circle svg-next-icon-size-20"></div>
                      </div>
                    </div>
                    <div class="draft-order-attributes--item-wrapper">
                      <div class="draft-order-attributes--item-wrapper-item">
                        <InputText></InputText>
                        <InputText></InputText>
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
</template>
<script>
import TopActionBar from "@/components/admin/TopActionBar.vue";
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Button from 'primevue/button';
import Textarea from 'primevue/textarea';
import Dropdown from "primevue/dropdown";

export default {
  components: {
    TopActionBar,
    InputText,
    IconField,
    InputIcon,
    Button,
    Textarea,
    Dropdown,
  },
  data() {
    return {
      options: [],
    }
  },
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
</style>
