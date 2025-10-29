<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="general-block">
            <div class="row">
              <div class="col-12">
                <h2 class="ui-heading title-settings">{{ $t('address_and_warehouse') }}</h2>
                <p class="sub-settings">{{ $t('store_locations_description') }}</p>
              </div>
            </div>
            <div class="d-flex align-items-center gap-4">
              <Button class="ms-btn btn-primary">
                <div class="p-button-label">{{ $t('add_address') }}</div>
              </Button>
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
  }
}
</script>
