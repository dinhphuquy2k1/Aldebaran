<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="general-block">
            <div class="row">
              <div class="col-lg-4 col-12 d-flex flex-lg-column">
                <div class="d-flex flex-column">
                  <h2 class="text-headxl">{{ $t('shipping_fee') }}</h2>
                  <p class="text-body-m content-neutral mgb-4">{{ $t('add_shipping_fee_note') }}</p>
                </div>
                <div class="ml-auto ml-lg-0">
                  <div>
                    <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                      <div class="svg-next-icon-size-16">
                        <div class="icon-add-circle"></div>
                      </div>
                      <div class="p-button-label ml-3">{{ $t('add_shipping_zone') }}</div>
                    </Button>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-12">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div>
                        <div class="d-flex align-items-center cursor-pointer">
                          <p class="text-body-m mgb-0 fw-medium"></p>
                        </div>
                        <div class="ui-information-body mgt-4">
                          <div class="shipping-data-block py-3">
                            <div class="shipping-data-head d-flex justify-content-between align-items-center">
                              <div class="shipping-data-head--action d-flex justify-content-between flex-end"></div>
                            </div>
                            <div class="shipping-data-list">
                              <table class="w-100">
                                <thead>
                                <tr class="border-bottom">
                                  <td class="p-3">{{ $t('shipping_rate_name') }}</td>
                                  <td class="text-end p-3">{{ $t('shipping_calculation_standard') }}</td>
                                  <td class="text-end p-3">{{ $t('shipping_price') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="border-b">
                                  <td class="p-3">
                                    <p class="shipping-data-name text-primary cursor-pointer mb-0 d-inline-block max-width-350px text-truncate">
                                      {{ $t('home_delivery') }}</p>
                                  </td>
                                  <td class="text-end p-3">
                                    <p class="mb-0 shipping-data-price">{{ $t('from_price_up', {price: 0}) }}</p>
                                  </td>
                                  <td class="text-end p-3">
                                    <p class="mb-0 shipping-data-name font-weight-bold">0d</p>
                                  </td>
                                </tr>
                                <tr class="settings-transport--edit">
                                  <td class="p-3" colspan="3">
                                    <div class="row mt-15">
                                      <div class="col-12">
                                        <div class="mb-15">
                                          <label class="label-input-group">{{ $t('shipping_rate_name') }}</label>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                </tbody>
                              </table>
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
    </div>
  </section>
</template>

<script>
import Button from 'primevue/button';

export default {
  components: {
    Button,
  },
  data() {
    return {}
  }
}
</script>

<style>

</style>
