<template>
  <header class="ms-header d-flex">
    <div class="ms-header-container flex-1">
      <div class="d-none d-lg-block">
        <div class="_logo_zone_wrapper_1urjr_1">
          <router-link to="/admin">
            <img src="/assets/images/logo.png" alt="" width="120" height="28">
          </router-link>
        </div>
      </div>
      <div class="header-actions">
        <div class="d-none d-lg-block min-width-0">
          <div class="breadcrumb-item">Danh sách nhóm sản phẩm</div>
        </div>
        <div class="d-block d-lg-none"></div>
        <div class="header-right-actions">
          <div class="d-none d-lg-block">
            <div class="trigger">
                <span>
                  <img src="/assets/icons/tải%20xuống.svg" alt="" width="20" height="20">
                </span>
            </div>
          </div>
          <div class="trigger">
                <span>
                  <img src="/assets/icons/notification.svg" alt="" width="20" height="20">
                </span>
          </div>
          <div class="trigger">
            <span>
              <Button
                  @click="toggle" aria-haspopup="true"
                  aria-controls="overlay_menu"
                  class="ms-btn bg-transparent h-100 mw-0 d-flex justify-content-center flex-grow-1 account-info-wrapper">
                <p class="account-info-name">
                  Phú Quý
                </p>
                <span class="avatar">
                  <div class="avatar-string">PQ</div>
                </span>
              </Button>
              <Menu ref="menu" id="overlay_menu" :model="items" :popup="true"/>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import Menu from 'primevue/menu';
import Button from 'primevue/button';

export default {
  components: {
    Menu,
    Button,
  },
  data() {
    return {
      items: [
        {
          label: 'Refresh',
          icon: 'pi pi-refresh'
        },
        {
          label: 'Export',
          icon: 'pi pi-upload'
        }
      ]
    }
  },
  methods: {
    toggle(event) {
      this.$refs.menu.toggle(event);
    }
  }
}
</script>

<style lang="scss" scoped>
.ms-header {
  box-shadow: 0 0 2px #0000003d, 0 2px 12px #00000014;
  position: relative;
  z-index: 100;
  height: $header-height-admin;

  .ms-header-container {
    height: var(--header-height);
    display: grid;
    grid-template-columns: var(--sidebar-width) auto;
    gap: 1.6rem;
    align-items: center;
    background-color: var(--color-white);
    box-sizing: border-box;
    position: relative;

    ._logo_zone_wrapper_1urjr_1 {
      padding: 0 1.6rem;
      display: flex;
      align-items: center;
      gap: .8rem;

      img {
        max-width: 100%;
      }
    }

    .header-actions {
      display: flex;
      align-items: center;
      padding-right: 16px;

      .breadcrumb-item {
        font-size: $font-size - 2px;
        color: var(--color-coolgray-900);
      }

      .header-right-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-left: auto;

        .trigger {

          .account-info-wrapper {
            border-radius: 8px;
            border: 1px solid var(--color-coolgray-200) !important;
            padding: 4px 8px !important;
            background-color: transparent;
            min-height: unset !important;
            height: unset !important;
            gap: 8px;

            .account-info-name {
              font-size: 12px;
              font-weight: 600;
              margin-bottom: 0;
              color: var(--color-coolgray-600);
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis;
            }

            .avatar {
              padding: 0;
              width: 24px;
              height: 24px;
              border-radius: 50%;
              font-size: 10px;
              background: rgb(41, 121, 255);
            }
          }

          span {
            border-radius: 8px;
            outline: none;
            border: none;
            padding: 6px;
            margin: 0;
            background-color: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
          }
        }
      }
    }
  }
}
</style>
<script setup lang="ts">
</script>