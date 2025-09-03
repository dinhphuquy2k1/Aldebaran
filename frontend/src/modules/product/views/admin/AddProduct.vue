<template>
  <div id="contextual-portal" style="display: block; top: 0; height: var(--header-height)">
    <div class="ContextualSaveBar contextual-enter-done">
      <div class="ui-header--notification">
        <div class="padding-container p-0 w-100 d-flex justify-content-between align-items-center">
          <div class="ContextualSaveBar__Message mb-0 pr-5">Chưa lưu thay đổi</div>
          <div class="flex-shrink-0 flex-nowrap"></div>
        </div>
      </div>
    </div>
  </div>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="padding-container">
          <div class="row no-gutters pb-4">
            <div class="col align-items-center d-flex">
              <p class="title-page">{{ $t('product_list') }}</p>
            </div>
            <div class="col-auto pl-0"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script setup lang="ts">
import DynamicFilter from "@/components/admin/DynamicFilter.vue";
</script>