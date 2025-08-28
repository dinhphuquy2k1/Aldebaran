<template>
  <div class="ms-navbar position-relative d-flex flex-column justify-content-between d-none d-lg-flex">
    <div class="left-container flex-grow-1">
      <div class="top-menu">
        <div class="d-flex align-items-center w-100">
          <Button class="ms-btn d-none d-sm-flex w-100">
            <img src="/assets/icons/search_menu.svg" alt="">
            <div class="btn-wrapper-placeholder">Tìm kiếm</div>
            <div class="input-btn-right">
              <span>Ctrl</span>
              <span>K</span>
            </div>
          </Button>
        </div>
      </div>
      <PanelMenu v-model:expanded-keys="expandedKeys" :model="menus" multiple>
        <template #item="{ item }">
          <router-link v-if="item.route && item.items.length===0" :to="item.route"
                       class="ma-navbar-parent d-flex align-items-center">
            <div class="d-flex flex-grow-1 align-items-center gap-1 cursor-pointer menu-item">
              <span v-html="item.icon"></span>
              <span :class="['ml-2', { 'font-semibold': item.items }]">{{ item.label }}</span>
            </div>
          </router-link>
          <div v-else class="ma-navbar-parent d-flex align-items-center"
               :class="{'p-submenu-icon': item.items.length > 0}">
            <div class="menu-item align-items-center gap-1 flex-grow-1 d-flex">
              <span v-html="item.icon"></span>
              <div class="flex-grow-1">{{ item.label }}</div>
              <span v-if="item.items" class="pi arrow-right pi-angle-up text-primary ml-auto"/>
            </div>
          </div>
        </template>
      </PanelMenu>
    </div>
  </div>
</template>

<script>
import PanelMenu from 'primevue/panelmenu';
import Button from 'primevue/button';

import {getMenus} from "@/api/menu";

export default {
  components: {
    PanelMenu,
    Button,
  },
  data() {
    return {
      menus: [],
      expandedKeys: {},
    }
  },
  methods: {
    expandedMenu() {
      for (const [index, item] of this.menus.entries()) {
        const find = item.routes.findIndex(route => route === this.$route.path);
        if (find !== -1) {
          this.expandedKeys = {
            [item.key]: true
          }
          break;
        }
      }
    },
    /**
     * Lấy danh sách menu
     */
    async loadMenu() {
      await getMenus().then(res => {
        this.menus = res.data
      }).catch(error => {
        console.log(error)
      })
    },
  },
  async created() {
    await this.loadMenu();
    this.expandedMenu();
  }
}
</script>

<style lang="scss">
.ms-navbar {
  overflow: hidden;
  width: $navbar-width;
  padding: 1px;
  transition: width .2s;
  box-shadow: inset 0 1.5px 2px 0 rgba(0, 0, 0, .1);
  background-color: var(--alias-color-background-washout);
  border-right: 1px solid var(--color-coolgray-200);
  height: 100%;

  &:hover {
    overflow-y: auto;
  }

  &.collapsed {
    min-width: 56px;
    width: 56px;
  }

  .left-container {
    .top-menu {
      padding: 8px;
      align-items: center;

      .p-button {
        border: 1px solid var(--color-coolgray-300);
        background: #e5e7ebcc !important;
        gap: 8px;
        height: unset !important;
        min-height: unset !important;
        border-radius: 8px;

        &:active {
          border-color: var(--color-blue-600);
          box-shadow: 0 0 0 4px var(--color-blue-100);
          outline: 0;
        }

        img {
          padding: 5px 0 5px 5px;
        }

        .btn-wrapper-placeholder {
          color: var(--color-coolgray-400);
          font-style: normal;
          font-weight: 400;
          line-height: inherit;
          margin: 0;
          padding: 0;
        }

        .input-btn-right {
          position: absolute;
          top: 50%;
          right: 8px;
          transform: translateY(-50%);
          color: var(--color-coolgray-400);
          display: flex;
          gap: 2px;
          font-weight: 600;
        }
      }
    }

    .p-panelmenu .p-panelmenu-header .p-panelmenu-header-content {
      border-radius: unset;
    }

    .p-panelmenu .p-panelmenu-content .p-menuitem:not(.p-highlight):not(.p-disabled).p-focus > .p-menuitem-content {
      background: unset;
    }

    .p-panelmenu .p-panelmenu-content .p-menuitem > .p-menuitem-content {
      color: #000;
    }

    .p-panelmenu .p-panelmenu-content .p-menuitem:not(.p-highlight):not(.p-disabled) > .p-menuitem-content:hover {
      background: transparent;
    }

    .p-panelmenu .p-panelmenu-header .p-panelmenu-header-content {
      color: #000;
    }

    .p-panelmenu .p-panelmenu-content {
      border: unset;
      padding: unset;
      background: transparent;

      .p-submenu-list {
        .p-menuitem {
          .menu-item {
            span {
              padding-left: 10px;
            }
          }
        }
      }
    }


    .p-panelmenu {
      a:hover {

      }

      ol, ul, dl {
        margin: unset;
        padding-left: 1.5rem;
      }

      .p-panelmenu-panel {
        margin: unset;

        .p-panelmenu-header {
          .p-panelmenu-header-content {
            background: transparent;
            border: unset;

            .router-link-active {
              svg {
                width: 20px;
                height: 20px;
                fill: rgb(36, 99, 235);
              }
            }

            .p-submenu-icon {
              .menu-item {
                .pi-angle-up {
                  transition-duration: .4s;
                }
              }
            }
          }

          & {
            .p-submenu-icon {
              .menu-item {
                .pi-angle-up {
                  //background: url('@public/assets/icons/ic_arrow_black_right.c6cd6189.svg');
                  height: 24px;
                  width: 24px;
                  transform: rotate(90deg);
                }
              }
            }
          }

          &:has(+ .p-toggleable-content .router-link-active) {
            .p-submenu-icon {
              .menu-item {
                svg {
                  width: 20px;
                  height: 20px;
                  fill: rgb(36, 99, 235);
                }
              }
            }
          }
        }
      }

      .menu-item {
        padding: 8px;
        margin: 0 8px 0 8px;
        height: 32px;
        border-radius: 8px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: var(--color-coolgray-600);

        span {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 100%;
        }

        &:hover {
          background-color: #e5e7ebcc;
          cursor: pointer;
        }
      }

      .router-link-active {
        .menu-item {
          background-color: var(--color-white) !important;
          box-shadow: 0 1px 2px #00000029;
          color: var(--color-coolgray-900) !important;
        }

        &.ma-navbar-parent {
          font-weight: 500;
          display: block;
          color: #ff6d00;
        }
      }

    }
  }


  .toggle-button-container {
    position: sticky;
    bottom: 0;
    height: 58px;
    background: #fff;

    .toggle-button {
      cursor: pointer;
      margin: 8px 8px 18px 8px;
      height: 40px;
      border-radius: 8px;
      line-height: 40px;
      background: #edf1f5;

      .toggle-title {
        display: block;
      }
    }

    .toggle-button {
      .icon:before {
        content: "";
        display: inline-block;
        margin-top: 8px;
        margin-left: 16px;
        left: 0;
        height: 24px;
        width: 24px;
        //background: transparent url('@public/assets/icons/ic_toggle.4abb3c52.svg') no-repeat;
        transform: rotate(0deg);
        transition-duration: .4s;
      }
    }

    .toggle-button.hidden {
      width: 70%;
    }

    .toggle-button.hidden {
      .icon:before {
        transform: rotate(180deg) !important;
        margin-left: 8px;
      }

      .toggle-title {
        display: none;
      }
    }
  }


}
</style>

