<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="omni-layout-body new-grid-layout">
            <div class="omni-layout-body-sm">
              <div class="hrv-card">
                <div class="hrv-card-head card-divider pdb-4">
                  <h2 class="text-headl mgb-1">{{ $t('customer_account') }}</h2>
                  <p class="text-body-m content-neutral mgb-0">{{ $t('customer_account_description') }}</p>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="d-flex flex-column">
                      <div>
                        <p class="mgb-3 text-body-m fw-medium">{{ $t('account_customization') }}</p>
                        <div class="input-radio-groups">
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('account_disable') }}</label>
                            </div>
                            <div class="input-radio__extend">
                              <p class="text-body-s content-neutral mgb-0">{{ $t('account_disable_note') }}</p>
                            </div>
                          </div>
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('account_required') }}</label>
                            </div>
                            <div class="input-radio__extend">
                              <p class="text-body-s content-neutral mgb-0">{{ $t('account_required_note') }}</p>
                            </div>
                          </div>
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('account_optional') }}</label>
                            </div>
                            <div class="input-radio__extend">
                              <p class="text-body-s content-neutral mgb-0">{{ $t('account_optional_note') }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="setting-line mgy-4"></div>
                      <div>
                        <div class="d-flex align-items-center gap-2">
                          <p class="text-body-m fw-medium mgb-0">{{ $t('multipass_login') }}</p>
                          <span>{{ $t('inactive') }}</span>
                        </div>
                        <div class="mgt-2 d-flex gap-4">
                          <p class="mb-0 text-body-m content-neutral">
                            <span class="mb-0 mr-2">{{ $t('multipass_description') }}</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <h2 class="text-headl mgb-1">{{ $t('login_settings') }}</h2>
                  <p class="text-body-m content-neutral mgb-0">{{ $t('login_type_select') }}</p>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <p class="text-body-m fw-medium mgb-3">{{ $t('login_version_option') }}</p>
                    <div class="d-flex flex-wrap gap-3"></div>
                    <div class="setting-line mgy-4"></div>
                    <p class="text-body-m fw-medium mgb-3">{{ $t('account_auth_method') }}</p>
                    <div class="pd-4 radius-m border-default">
                      <div class="d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                          <p class="text-body-m fw-medium mgb-1">{{ $t('auth_email') }}</p>
                          <p class="text-body-s content-neutral mgb-0">{{ $t('auth_email_description') }}</p>
                        </div>
                      </div>
                      <div class="setting-line mgy-4"></div>
                      <div class="d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                          <p class="text-body-m fw-medium mgb-1">{{ $t('phone_number') }}</p>
                          <p class="text-body-s content-neutral mgb-0">{{ $t('auth_zalo_description') }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <h2 class="text-headl mgb-1">{{ $t('require_email') }}</h2>
                  <p class="text-body-m content-neutral mgb-0">{{ $t('require_email_description') }}</p>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <p class="text-body-m fw-medium mgb-3">{{ $t('require_email_option') }}</p>
                    <div class="input-radio-groups">
                      <div class="input-radio-wrapper">
                        <div class="d-flex align-items-center pointer ms-next-input-radio">
                          <RadioButton input-id="0"/>
                          <label for="0" class="ms-next-label--switch">{{ $t('not_required') }}</label>
                        </div>
                      </div>
                      <div class="input-radio-wrapper">
                        <div class="d-flex align-items-center pointer ms-next-input-radio">
                          <RadioButton input-id="0"/>
                          <label for="0" class="ms-next-label--switch">{{ $t('required') }}</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <h2 class="text-headl mgb-1">{{ $t('order_processing') }}</h2>
                  <p class="text-body-m content-neutral mgb-0">{{ $t('order_process_change_note') }}</p>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="d-flex flex-column gap-6">
                      <div>
                        <p class="mgb-3 text-body-m fw-medium">{{ $t('reminder_email') }}</p>
                        <div class="input-radio-groups">
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('reminder_never') }}</label>
                            </div>
                          </div>
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('reminder_after_6h') }}</label>
                            </div>
                          </div>
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('reminder_after_24h') }}</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <p class="mgb-3 text-body-m fw-medium">{{ $t('reminder_after_payment') }}</p>
                        <div class="input-radio-groups">
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('auto_fulfillment_enable') }}</label>
                            </div>
                          </div>
                          <div class="input-radio-wrapper">
                            <div class="d-flex align-items-center pointer ms-next-input-radio">
                              <RadioButton input-id="0"/>
                              <label for="0" class="ms-next-label--switch">{{ $t('auto_fulfillment_disable') }}</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <p class="mgb-3 text-body-m fw-medium">{{ $t('after_fulfillment_and_payment') }}</p>
                        <label for="fulfilledOrderBehavior" class="d-flex align-items-center gap-2 pointer">
                          <Checkbox inputId="fulfilledOrderBehavior"/>
                          {{ $t('auto_archive_order') }}
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <div class="d-flex align-items-center justify-content-between gap-4">
                    <div>
                      <h2 class="text-headl mgb-1">{{ $t('deposit_setting') }}</h2>
                      <p class="text-body-m content-neutral mgb-0">{{ $t('deposit_setting_description') }}</p>
                    </div>
                  </div>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div>
                      <p class="text-body-m fw-medium mgb-3">{{ $t('require_deposit_on_order') }}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <div class="d-flex align-items-center justify-content-between gap-4">
                    <h2 class="text-headl mgb-0">{{ $t('pickup_in_store') }}</h2>
                  </div>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <p class="text-body-m fw-medium mgb-2">{{ $t('pickup_branch_setting') }}</p>
                    <p class="text-body-m mgb-0">{{ $t('allow_customer_pickup') }}</p>
                  </div>
                </div>
              </div>

              <div class="hrv-card mgt-6">
                <div class="hrv-card-head card-divider pdb-4">
                  <div class="d-flex align-items-center justify-content-between gap-4">
                    <div>
                      <h2 class="text-headl mgb-1">{{ $t('language') }}</h2>
                      <p class="text-body-m content-neutral mgb-0">{{ $t('checkout_language_customization') }}</p>
                    </div>
                  </div>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <p class="text-body-m fw-medium mgb-2">{{ $t('select_default_language') }}</p>
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
import RadioButton from 'primevue/radiobutton';
import Checkbox from 'primevue/checkbox';
export default {
  components: {
    Checkbox,
    RadioButton,
  },
}
</script>

<style lang="scss">
.setting-line {
  height: 1px;
  width: 100%;
  background: var(--alias-color-border-default);
}
</style>
