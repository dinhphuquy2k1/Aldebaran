<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="omni-layout-body">
          <div class="omni-layout-body-lg">
            <div class="row no-gutters pt-30">
              <div class="title--left col align-items-center d-flex">
                <div class="pricing-list-title title-page pricing_list-detail--title"><span>{{
                    $t('create_price_list')
                  }}</span></div>
              </div>
              <div class="col-auto title--right">
                <div class="display-none sf-hidden"></div>
              </div>
            </div>
            <div class="mt-15">
              <div class="row mx-0 pricing-list--summary-content">
                <div class="col-md-8 col-12 px-0">
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
                          </div>
                          <div>
                            <div class="d-flex label-input-group-pricing--list">
                              <label for="" class="font-weight-normal m-0">{{ $t('end_time') }}</label>
                              <Checkbox inputId="has_delivery" class="ml-10"/>
                            </div>
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
                      <div class="p-16px">
                        <div class="omni-alert-pannel">
                          <div class="d-flex justify-content-start alert alert-md alert-default box-shadow">
                            <div class="omni-alert-pannel--icon svg-next-icon-size-22" style="color:rgb(92,95,98)">
                              <div class="icon-help"></div>
                            </div>
                            <div class="p-0 flex-grow-1">
                              <div class="row">
                                <div class="col-12 col-sm omni-alert-pannel--content">
                                  <div class="omni-alert-pannel--description mb-0">{{ $t('applied_products_note') }}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-12 pr-0">
                  <div class="omni-layout-card card-default mt-0 pb-15">
                    <div class="ui-information">
                      <span class="ui-information-title text-transform-normal">{{ $t('apply_condition') }}</span>
                    </div>
                    <div class="ui-information py-0 align-items-center">
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('sale_channel') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_channels') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('channel_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('branch') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_branches') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('branch_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('applied_audience') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('unlimited_customers') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('customer_group') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('customer_options') }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <div class="mb-15">
                        <div class="mb-15 ui-information-title">{{ $t('staff') }}</div>
                        <div class="d-flex flex-column">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{ $t('all_staff') }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton />
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
</template>

<script>
import InputText from 'primevue/inputtext';
import Textarea from "primevue/textarea";
import Checkbox from "primevue/checkbox";
import RadioButton from 'primevue/radiobutton';

export default {
  components: {
    InputText,
    Textarea,
    Checkbox,
    RadioButton,
  }
}
</script>

<style lang="scss">

</style>
