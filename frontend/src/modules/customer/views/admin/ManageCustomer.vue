<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="row">
            <div class="col-md-8 col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('general_info') }}</p>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <div>
                      <label>{{ $t('full_name') }}</label>
                    </div>
                    <div class="mt-5">
                      <InputText class="ms-input"
                                 :placeholder="$t('enter_full_name')"></InputText>
                    </div>
                    <p class="mt-2 ml-1 mb-0 mh-15"></p>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('phone_number') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_phone_number')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('auth_email') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_email')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('date_of_birth') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_promotion_code')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12 d-flex flex-column">
                      <div>
                        <label>{{ $t('gender') }}</label>
                      </div>
                      <div class="mt-5 flex-1 d-flex">
                        <div class="d-flex">
                          <div class="hrv-next-input-radio d-flex align-items-center">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{
                                $t('gender_male')
                              }}</label>
                            <span class="trigger"></span>
                          </div>
                          <div class="hrv-next-input-radio d-flex align-items-center mt-0">
                            <RadioButton/>
                            <label class="hrv-next-label--switch" for="hrv-radio-15">{{
                                $t('gender_female')
                              }}</label>
                            <span class="trigger"></span>
                          </div>
                        </div>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('shipping_address') }}</p>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('company') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_company_name')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('phone_number') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_phone_number')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('address') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_address')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('country') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_promotion_code')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('invoice_information') }}</p>
                </div>
                <div class="hrv-card-section">
                  <div class="row">
                    <div class="col-12 mb-15">
                      <div class="d-flex align-items-center">
                        <div class="hrv-next-input-radio d-flex align-items-center">
                          <RadioButton name="eInvoiceInfo.isCompany"/>
                          <label class="hrv-next-label--switch" for="«r14»">{{
                              $t('personal')
                            }}</label>
                          <span class="trigger"></span>
                        </div>
                        <div class="hrv-next-input-radio d-flex align-items-center mt-0">
                          <RadioButton name="eInvoiceInfo.isCompany"/>
                          <label class="hrv-next-label--switch" for="«r15»">{{
                              $t('company')
                            }}</label>
                          <span class="trigger"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('full_name') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   :placeholder="$t('enter_full_name')"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div>
                        <label>{{ $t('citizen_id')  }} ({{ $t('not_required') }})</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   placeholder="123456789012"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-12">
                      <div>
                        <label>{{ $t('Email') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   placeholder="abc@gmail.com"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                    <div class="col-12">
                      <div>
                        <label>{{ $t('address') }}</label>
                      </div>
                      <div class="mt-5">
                        <InputText class="ms-input"
                                   placeholder="abc@gmail.com"></InputText>
                      </div>
                      <p class="mt-2 ml-1 mb-0 mh-15"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('note') }}</p>
                </div>
                <div class="hrv-card-section">
                  <Textarea :rows="2" class="ms-textarea"
                            style="min-height:80px;height:78px"
                            :placeholder="$t('enter_note')"/>
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
import RadioButton from 'primevue/radiobutton';
import Calendar from 'primevue/calendar';
import Dropdown from 'primevue/dropdown';

export default {
  components: {
    InputText,
    RadioButton,
    Calendar,
    Dropdown,
  },
  data() {
    return {}
  },
}
</script>

<style>

</style>
