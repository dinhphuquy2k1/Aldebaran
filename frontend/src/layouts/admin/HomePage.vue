<template>
  <div class="ms-wrapper w-100 d-flex h-100vh flex-column">
    <router-view name="header"></router-view>
    <div class="d-flex ma-main flex-grow-1">
      <router-view name="navbar"></router-view>
      <div class="ms-content d-flex">
        <router-view name="content"></router-view>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  components: {},
  data() {
    return {}
  }
}
</script>

<style lang="scss">
.ms-wrapper {
  color: #212121;
  background-color: var(--color-coolgray-100);
  overflow: hidden;
}
</style>
