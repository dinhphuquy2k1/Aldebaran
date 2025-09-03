<template>
  <div id="contextual-portal" style="display: block; top: 0; height: var(--header-height)">
    <div class="ContextualSaveBar contextual-enter-done">
      <div class="ui-header--notification">
        <div class="padding-container p-0 w-100 d-flex justify-content-between align-items-center">
          <div class="ContextualSaveBar__Message mb-0 pr-5">{{ $t('unsaved_changes') }}</div>
          <div class="flex-shrink-0 flex-nowrap"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
</script>