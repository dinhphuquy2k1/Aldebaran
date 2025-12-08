<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="row">
            <div class="col-12">
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('customer_group_name') }}</p>
                </div>
                <div class="hrv-card-section">
                  <InputText class="ms-input"
                             :placeholder="$t('enter_customer_group_name')"></InputText>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('filter_condition') }}</p>
                </div>
                <div class="hrv-card-section">
                  <VerticalTreeOperator></VerticalTreeOperator>
                  <div class="mt-25 d-flex justify-content-end">
                    <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                      <div class="p-button-label ml-3">{{ $t('apply') }}</div>
                    </Button>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <p class="text-headl">{{ $t('customers') }}</p>
                </div>
                <div class="hrv-card-section">
                  <InputGroup iconPosition="left" class="ms-input-size-m d-flex flex-1">
                    <InputGroupAddon class="pi pi-search"></InputGroupAddon>
                    <InputText v-model="value1" :placeholder="$t('search')" class="flex-1 ms-input-wrapper"/>
                  </InputGroup>
                  <div style="text-align:center;padding-top:8em;padding-bottom:2em;min-height:350px">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect width="64" height="64" rx="32" fill="#F3F4F6"></rect>
                      <g clip-path="url(#hrv-cust-segment-table-empty-icon-clip0_6105_151189)">
                        <path
                            d="M37.8126 16.2267C37.6719 15.7814 37.2972 15.4766 36.8519 15.4064L34.2268 14.9531L33.0549 12.5859C32.844 12.1873 32.4219 12 32.0002 12C31.5785 12 31.1565 12.1873 30.9455 12.5859L29.7737 14.9531L27.1485 15.4061C26.7033 15.4766 26.3285 15.7811 26.1879 16.2267C26.0707 16.6484 26.1879 17.1172 26.5159 17.4217L28.3909 19.2266L27.9456 21.758C27.8751 22.1798 28.0394 22.625 28.4144 22.9064C28.7659 23.1642 29.2582 23.1874 29.633 23.0001L32.0002 21.7812L34.3674 23.0001C34.7657 23.2109 35.2344 23.1639 35.5863 22.9063C35.9611 22.625 36.1253 22.1798 36.0548 21.7577L35.6096 19.2266L37.4846 17.4217C37.8127 17.1172 37.9301 16.6484 37.8127 16.2267H37.8126Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M42.4687 27.586C42.2931 27.4568 42.1571 27.2811 42.076 27.0787C41.9949 26.8764 41.972 26.6554 42.0097 26.4407L42.4551 23.9092L40.5665 22.1123C40.4072 21.9605 40.2938 21.7668 40.2395 21.5535C40.1851 21.3402 40.1919 21.1159 40.259 20.9063C40.3258 20.6964 40.4504 20.5096 40.6187 20.3675C40.7869 20.2253 40.9919 20.1336 41.21 20.1028L43.8433 19.7286L45.0164 17.409C45.4147 16.6195 46.7101 16.6195 47.1084 17.409L48.2812 19.7286L50.9926 20.1028C51.4379 20.1659 51.8075 20.4782 51.9436 20.9063C52.0108 21.1159 52.0175 21.3403 51.9631 21.5536C51.9088 21.7669 51.7954 21.9605 51.636 22.1124L49.6694 23.9093L50.1147 26.4407C50.1523 26.6554 50.1292 26.8763 50.0481 27.0786C49.967 27.2809 49.8311 27.4566 49.6557 27.586C49.2965 27.8506 48.8204 27.8915 48.4255 27.6854L46.0622 26.4724L43.7001 27.6854C43.506 27.7852 43.2878 27.8287 43.0703 27.8112C42.8527 27.7936 42.6444 27.7156 42.4687 27.586Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M14.3437 27.586C14.1681 27.4568 14.0321 27.2811 13.951 27.0787C13.8699 26.8764 13.847 26.6554 13.8847 26.4407L14.3301 23.9092L12.3634 22.1123C12.2041 21.9605 12.0907 21.7668 12.0363 21.5535C11.9819 21.3402 11.9887 21.1159 12.0559 20.9063C12.192 20.4782 12.6397 20.1657 13.085 20.1028L15.7183 19.7286L16.8914 17.409C17.2897 16.6195 18.5851 16.6195 18.9834 17.409L20.1562 19.7286L22.7895 20.1028C23.2348 20.1659 23.6044 20.4782 23.7404 20.9063C23.8076 21.1159 23.8144 21.3403 23.76 21.5536C23.7056 21.7669 23.5922 21.9605 23.4329 22.1124L21.5444 23.9093L21.9897 26.4407C22.0273 26.6554 22.0042 26.8763 21.9231 27.0786C21.842 27.2809 21.7061 27.4566 21.5307 27.586C21.1715 27.8506 20.6976 27.8915 20.3005 27.6854L17.9372 26.4724L15.5751 27.6854C15.381 27.7852 15.1628 27.8287 14.9453 27.8112C14.7277 27.7936 14.5194 27.7156 14.3437 27.586Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M44.8906 42.5469C43.1562 42.5469 41.5392 43.2033 40.2969 44.2577L42.5469 52H50.8281C51.4845 52 52 51.4845 52 50.8281V49.6562C52 45.7891 48.7578 42.5469 44.8906 42.5469ZM44.8906 33.1719C42.3125 33.1719 40.2031 35.2812 40.2031 37.8594C40.2031 40.4375 42.3125 42.5469 44.8906 42.5469C47.4688 42.5469 49.5781 40.4375 49.5781 37.8594C49.5781 35.2812 47.4688 33.1719 44.8906 33.1719Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M19.1094 42.5469C15.2422 42.5469 12 45.7891 12 49.6562V50.8281C12 51.4845 12.5936 52 13.25 52H21.4531L23.7031 44.2577C22.4609 43.2033 20.8438 42.5469 19.1094 42.5469ZM19.1094 33.1719C16.5312 33.1719 14.4219 35.2812 14.4219 37.8594C14.4219 40.4375 16.5312 42.5469 19.1094 42.5469C21.6875 42.5469 23.7969 40.4375 23.7969 37.8594C23.7969 35.2812 21.6875 33.1719 19.1094 33.1719Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M37.8594 34.3438C37.8594 37.578 35.2342 40.2031 32 40.2031C28.7658 40.2031 26.1406 37.578 26.1406 34.3438C26.1406 31.1095 28.7658 28.4844 32 28.4844C35.2342 28.4844 37.8594 31.1095 37.8594 34.3438Z"
                            fill="#D1D5DB"></path>
                        <path
                            d="M42.5469 50.8281V52H21.4531V50.8281C21.4531 48.3906 22.2734 46.0391 23.7031 44.2577C25.6252 41.7733 28.625 40.2031 32 40.2031C35.4922 40.2031 38.6095 41.9609 40.2969 44.2577C41.7266 46.0391 42.5469 48.3907 42.5469 50.8281Z"
                            fill="#D1D5DB"></path>
                      </g>
                      <defs>
                        <clipPath id="hrv-cust-segment-table-empty-icon-clip0_6105_151189">
                          <rect width="40" height="40" fill="white" transform="translate(12 12)"></rect>
                        </clipPath>
                      </defs>
                    </svg>
                    <p class="mt-20">{{ $t('no_customers') }}</p>
                    <p class="text-nodata fst-normal">{{ $t('list_updates_after_filter') }}</p>
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
import VerticalTreeOperator from "@/components/admin/VerticalTreeOperator.vue";
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';

export default {
  components: {
    VerticalTreeOperator,
    InputText,
    InputGroup,
    InputGroupAddon,
  },
  data() {
    return {}
  },
}
</script>

<style lang="scss" scoped>

</style>
