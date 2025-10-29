<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="new-grid-layout">
            <div class="row mgb-5">
              <div class="col-12 col-lg-4 mgb-4">
                <h2 class="text-headxl mgb-1">
                  {{ $t('store_information') }}
                </h2>
                <p class="text-body-m content-neutral mgb-1">{{ $t('store_name_display') }}</p>
                <p class="text-body-m content-neutral mgb-0">{{ $t('seo_description') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div>
                            <label for="" class="control-label mb-5">{{ $t('store_name') }}</label>
                            <InputText class="ms-input" :placeholder="$t('enter_shop_name')"></InputText>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="mgt-4">
                            <label for="" class="control-label mb-5">{{ $t('email_account') }}</label>
                            <InputText class="ms-input" :placeholder="$t('email_account')"></InputText>
                            <p class="text-body-s mgt-1 mgb-0 content-coolgray--500">{{ $t('shop_contact_email') }}</p>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="mgt-4">
                            <label for="" class="control-label mb-5">{{ $t('customer_email') }}</label>
                            <InputText class="ms-input" :placeholder="$t('customer_email')"></InputText>
                            <p class="text-body-s mgt-1 mgb-0 content-coolgray--500">{{
                                $t('customer_support_email')
                              }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="general-setting-line"></div>
            <div class="row mgy-5">
              <div class="col-12 col-lg-4 mgb-4">
                <h2 class="text-headxl mgb-1">{{ $t('brand_identity') }}</h2>
                <p class="text-body-m content-neutral mgb-1">{{ $t('brand_identity_description') }}</p>
                <p class="text-body-m content-neutral mgb-0">{{ $t('brand_identity_note') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div>
                        <p class="mgb-1 text-body-m fw-medium">{{ $t('logo_settings') }}</p>
                        <p class="mgb-3 text-body-s content-coolgray--500">{{ $t('logo_supported_formats') }}</p>
                        <div class="d-flex gap-4 flex-wrap flex-md-nowrap">
                          <div class="flex-md-1">
                            <div class="hrv-card-section background-light radius-m border-light h-100">
                              <p class="text-body-m mgb-0">{{ $t('brand_logo') }}</p>
                              <p class="text-body-s content-neutral mgb-0 mgt-1">{{ $t('brand_logo_description') }}</p>
                              <div class="general-preview-logo mgt-3">
                                <div class="preview-logo__wrapper">
                                  <div class="svg-next-icon-size-20">
                                    <div class="icon-image-default"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="d-flex gap-3 mgt-3"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="general-setting-line"></div>
            <div class="row mgy-5">
              <div class="col-12 col-lg-4 mgb-4">
                <h2 class="text-headxl mgb-1">{{ $t('store_address') }}</h2>
                <p class="text-body-m content-neutral mgb-0">{{ $t('store_address_description') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div>
                            <label for="" class="control-label mb-5">{{ $t('business_license_name') }}</label>
                            <InputText class="ms-input" :placeholder="$t('enter_business_license')"></InputText>
                          </div>
                        </div>
                        <div class="col-12 col-md-12">
                          <div class="mgt-4">
                            <label for="" class="control-label mb-5">{{ $t('phone_number') }}</label>
                            <InputText class="ms-input" :placeholder="$t('enter_phone_number')"></InputText>
                          </div>
                        </div>
                        <div class="col-12 col-md-12">
                          <div class="mgt-4">
                            <label for="" class="control-label mb-5">{{ $t('address') }}</label>
                            <InputText class="ms-input" :placeholder="$t('enter_address')"></InputText>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="general-setting-line"></div>
            <div class="row mgy-5">
              <div class="col-12 col-lg-4 mgb-4">
                <h2 class="text-headxl mgb-1">{{ $t('standards_and_formats') }}</h2>
                <p class="text-body-m content-neutral mgb-0">{{ $t('standards_and_formats_description') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="mgb-4">
                            <label class="control-label mb-5">{{ $t('timezone') }}</label>
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

export default {
  components: {
    InputText,
  }
}
</script>

<style lang="scss" scoped>
.general-setting-line {
  height: 1px;
  width: 100%;
  background: var(--alias-color-border-default);
}
</style>
