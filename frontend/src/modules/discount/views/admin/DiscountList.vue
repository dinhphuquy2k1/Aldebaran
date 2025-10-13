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
                              <div class="d-flex label-input-group-pricing--list">
                                <Checkbox inputId="has_delivery"/>
                                <label for="" class="font-weight-normal ml-10 mb-5">{{ $t('has_end_time') }}</label>
                              </div>
                              <Calendar class="input-date-picker input-date-picker--old-style" dateFormat="dd/mm/yy"/>
                            </div>
                          </div>
                          <div class="row mt-0">
                            <div class="col-12">
                              <div class="d-flex label-input-group-pricing--list mt-16">
                                <Checkbox inputId="has_delivery"/>
                                <label for="" class="font-weight-normal ml-10 mb-5">{{ $t('has_end_time') }}</label>
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
import InputSwitch from 'primevue/inputswitch';

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
</style>
