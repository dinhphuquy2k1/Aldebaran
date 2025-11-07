<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container layout-720px">
          <div class="col mb-15">
            <h2 class="ui-heading title-settings mb-15">{{ $t('address_and_warehouse_info') }}</h2>
            <div class="wrapper-content mb-0 settings-location--block">
              <div class="ui-information">
                <div class="ui-information-body">
                  <div class="row">
                    <div class="col col-md-12">
                      <label class="label-input-group">{{ $t('name') }}</label>
                      <InputText class="ms-input" :placeholder="$t('enter_address_name')"></InputText>
                    </div>
                  </div>
                </div>
                <div class="ui-information-body">
                  <div class="row">
                    <div class="col col-md-12 pt-16">
                      <div class="row">
                        <div class="col-6">
                          <label class="label-input-group">{{ $t('auth_email') }}</label>
                          <InputText class="ms-input" :placeholder="$t('enter_email')"></InputText>
                        </div>
                        <div class="col-6">
                          <label class="label-input-group">{{ $t('phone_number') }}</label>
                          <InputText class="ms-input" :placeholder="$t('enter_phone_number')"></InputText>
                        </div>
                      </div>
                      <div class="pb-0 pt-16">
                        <div class="row">
                          <div class="col-6">
                            <label class="label-input-group">
                              {{ $t('address') }}
                            </label>
                            <InputText class="ms-input" :placeholder="$t('enter_address')"></InputText>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-12 pt-16">
                      <label class="label-input-group text-end">{{ $t('country') }}</label>
                    </div>
                    <div class="col-sm-6 col-12 pt-16">
                      <label class="label-input-group text-end">{{ $t('city') }}</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-12 pt-16">
                      <label class="label-input-group text-end">{{ $t('district') }}</label>
                    </div>
                    <div class="col-sm-6 col-12 pt-16">
                      <label class="label-input-group text-end">{{ $t('ward') }}</label>
                    </div>
                  </div>
                  <div class="pt-16">
                    <label for="isShippingLocation" class="d-flex align-items-center gap-2 pointer">
                      <Checkbox inputId="isShippingLocation"/>
                      {{ $t('pickup_address') }}
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col text-end">
            <Button class="ms-btn btn-primary">
              <div class="p-button-label">{{ $t('save') }}</div>
            </Button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import InputText from 'primevue/inputtext';
import Checkbox from 'primevue/checkbox';
import Button from 'primevue/button';

export default {
  components: {
    InputText,
    Checkbox,
    Button,
  },
  data() {
    return {}
  }
}
</script>

<style>

</style>
