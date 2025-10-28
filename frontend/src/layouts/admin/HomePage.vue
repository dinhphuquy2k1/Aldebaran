<template>
  <div class="ms-wrapper w-100 d-flex h-100vh flex-column">
    <router-view name="header"></router-view>
    <div class="d-flex ms-main flex-grow-1">
      <router-view name="navbar"></router-view>
      <main class="ms-content d-flex flex-1">
        <router-view name="content"></router-view>
      </main>
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
  color: var(--color-coolgray-900);
  background-color: var(--color-coolgray-100);
  overflow: hidden;

  .ms-main {
    height: 100%;
  }
}
</style>
