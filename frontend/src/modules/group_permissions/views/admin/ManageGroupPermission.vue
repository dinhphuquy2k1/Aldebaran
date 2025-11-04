<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="omni-layout-body new-grid-layout">
            <div class="omni-layout-body-sm">
              <p class="text-headxl mgb-6">{{ $t('create_role') }}</p>
              <div class="hrv-card">
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <p class="text-headl mgb-4">{{ $t('general_info') }}</p>
                    <div class="row mgb-3 row-gap-3">
                      <div class="col-12 col-md-6">
                        <label class="control-label mb-5">{{ $t('roles') }}</label>
                        <InputText class="ms-input" :placeholder="$t('enter_role_name')"></InputText>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="control-label mb-5">{{ $t('role_code') }}</label>
                        <InputText class="ms-input" :placeholder="$t('enter_role_code')"></InputText>
                      </div>
                    </div>
                    <div>
                      <label class="control-label mb-5">{{ $t('note') }}</label>
                      <Textarea :rows="2" class="ms-textarea"
                                style="overflow:hidden;overflow-wrap:break-word;height:56px"
                                :placeholder="$t('enter_note')"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="d-flex align-items-center justify-content-between mgb-4 flex-wrap gap-4">
                      <p class="text-headl mgb-0">{{ $t('permission_by_role') }}</p>
                      <Button class="ms-btn btn-mono--secondary ms-btn-size-m" @click="chooseSampleRole">
                        <div class="p-button-label ml-3">{{ $t('select_sample_role') }}</div>
                      </Button>
                    </div>
                    <div class="mgt-4">
                      <div class="position-relative"></div>
                      <div class="border-heavy radius-m overflow-hidden ms-tree-table-permissions">
                        <TreeTable v-model:expanded-keys="expandedKeys" v-model:selectionKeys="selectedKey"
                                   :value="permissions"
                                   selectionMode="checkbox"
                                   :metaKeySelection="true"
                                   @node-expand="handleExpandRowClick"
                                   :pt="{
                                      row: (options) => ({
                                          class: [
                                            // JSON.stringify(options.props.ariaPosInset ),
                                            `row-size-${options.props.ariaPosInset}`,
                                            `row-pos-${options.props.ariaPosInset}`,
                                              {
                                                'row-last': options.props.ariaPosInset === options.props.ariaSetSize,
                                                'row-section': options.instance.node?.data?.type === 1,
                                              }
                                          ],
                                          onclick: onRowClick
                                      }),
                                      }
                                   ">
                          <Column expander>
                            <template #header>
                              <div class="d-inline-flex align-items-center">
                               <span class="d-inline-flex align-items-center">
                                 <span>{{ $t('product_name') }}</span>
                               </span>
                              </div>
                            </template>
                            <template #body="slotProps">
                              <div class="cursor-pointor background-light border-top-heavy">
                                <div class="d-flex align-items-center justify-content-between">
                                  <label @click="triggerCheckbox($event, slotProps.node)"
                                         class="pointer">{{ slotProps.node.data.name }}</label>
                                </div>
                              </div>
                            </template>
                          </Column>
                        </TreeTable>
                      </div>
                    </div>
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
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import TreeTable from 'primevue/treetable';
import Column from 'primevue/column';
import {PermissionType} from "@/modules/group_permissions/enums/PermissionType";

export default {
  components: {
    Button,
    InputText,
    Textarea,
    TreeTable,
    Column,
  },
  data() {
    return {
      permissions: [
        {
          key: '0',
          data: {name: 'Chọn tất cả', type: 'Module'},
        },
        {
          key: '1',
          data: {name: 'Trang tổng quan', type: 'Module'},
          children: [
            {
              key: '1-0',
              data: {name: 'Xem', type: 'Action'},
            },
          ],
        },
        {
          key: '2',
          data: {name: 'Đơn hàng', type: 'Module'},
          children: [
            {key: '2-0', data: {name: 'Xem', type: 'Action'}},
            {key: '2-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {key: '2-2', data: {name: 'Tạo và phát hành hoá đơn', type: 'Action'}},
            {key: '2-3', data: {name: 'Xuất dữ liệu', type: 'Action'}},
            {key: '2-4', data: {name: 'Truy cập dữ liệu tất cả chi nhánh', type: 'Action'}},
          ],
        },
        {
          key: '3',
          data: {name: 'Vận chuyển', type: 'Module'},
          children: [
            {key: '3-0', data: {name: 'Xem', type: 'Action'}},
            {key: '3-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {key: '3-2', data: {name: 'Xuất dữ liệu', type: 'Action'}},
            {key: '3-3', data: {name: 'Truy cập dữ liệu tất cả chi nhánh', type: 'Action'}},
            {key: '3-4-0', data: {name: 'Biên bản bàn giao', type: 1}},
            {key: '3-4-0', data: {name: 'Xem', type: 'Action'}},
            {key: '3-4-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {key: '3-5-0', data: {name: 'Biên bản hoàn hàng', type: 1},},
            {key: '3-5-0', data: {name: 'Xem', type: 'Action'}},
            {key: '3-5-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {key: '3-5-2', data: {name: 'Truy cập dữ liệu tất cả chi nhánh', type: 'Action'}},
          ],
        },
        {
          key: '4',
          data: {name: 'Sản phẩm', type: 'Module'},
          children: [
            {key: '4-0', data: {name: 'Xem', type: 'Action'}},
            {key: '4-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {key: '4-2', data: {name: 'Xuất dữ liệu', type: 'Action'}},
            {
              key: '4-3',
              data: {name: 'Nhóm sản phẩm', type: 'Section'},
              children: [
                {key: '4-3-0', data: {name: 'Xem', type: 'Action'}},
                {key: '4-3-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
              ],
            },
          ],
        },
        {
          key: '5',
          data: {name: 'Kho', type: 'Module'},
          children: [
            {key: '5-0', data: {name: 'Xem', type: 'Action'}},
            {key: '5-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
            {
              key: '5-2',
              data: {name: 'Biên bản kiểm hàng', type: 'Section'},
              children: [
                {key: '5-2-0', data: {name: 'Xem', type: 'Action'}},
                {key: '5-2-1', data: {name: 'Tạo và chỉnh sửa', type: 'Action'}},
              ],
            },
          ],
        },
        {
          key: '6',
          data: {name: 'Báo cáo', type: 'Module'},
          children: [
            {key: '6-0', data: {name: 'Xem báo cáo tổng hợp', type: 'Action'}},
            {key: '6-1', data: {name: 'Xuất dữ liệu báo cáo', type: 'Action'}},
          ],
        },
      ],
      expandedKeys: {},
      selectedKey: null,
    }
  },
  methods: {
    /**
     * Click button select sample role
     */
    chooseSampleRole() {
      console.log(this.selectedKey)
    },

    /**
     * trigger checkbox
     * @param event
     * @param node
     */
    triggerCheckbox(event, node) {
      if (node?.data?.type === PermissionType.SECTION) {
        return;
      }

      const td = event.target.closest('td');

      if (!td) return;

      const checkbox = td.querySelector('.p-checkbox input');

      if (checkbox) {
        checkbox.click();
      }
    },
    /**
     * Handle click to expand row children
     * @param node
     */
    handleExpandRowClick(node) {
      this.expandedKeys = this.expandNodeByKey(node.key, true)
    },
    /**
     * Click row
     * @param event
     */
    onRowClick(event) {
      if (event.target.closest('.p-checkbox, .p-treetable-toggler')) return;
      const tr = event.target.closest('tr');
      const toggler = tr?.querySelector('.p-treetable-toggler');
      toggler?.click();
    },
    /**
     * expand node
     * @param key
     * @param expandChildren
     * @returns {{}}
     */
    expandNodeByKey(key, expandChildren = false) {
      const expanded = {};

      const traverse = (nodes) => {
        for (const node of nodes) {
          if (node.key === key) {
            expanded[node.key] = true;
            if (expandChildren && node.children) markAllChildren(node.children);
            return true;
          }

          if (node.children && traverse(node.children)) {
            expanded[node.key] = true; // mở cha
            return true;
          }
        }
        return false;
      };

      const markAllChildren = (nodes) => {
        for (const n of nodes) {
          expanded[n.key] = true;
          if (n.children) markAllChildren(n.children);
        }
      };

      traverse(this.permissions);
      return expanded;
    },
  }
}
</script>

<style lang="scss">
.ms-tree-table-permissions {
  .p-treetable-tbody {
    tr {
      cursor: pointer;

      td {
        .p-treetable-toggler {
          order: 3;
          border-radius: 8px;
          margin-left: auto !important;

          &:enabled {
            &:hover {
              background: var(--alias-color-background-overlay-neutral);
            }
          }

          svg {
            width: 8px !important;
          }
        }

        display: flex;
        align-items: center;
        padding: var(--space-2) var(--space-3) !important;

        label {
          font-weight: 400;
          margin-bottom: 0;
          display: inline-block;
          cursor: pointer;
          color: var(--color-coolgray-900);
          white-space: pre-wrap;
          font-size: 14px;
          line-height: 21px;
        }

        .p-checkbox {
          .p-checkbox-box {
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-items: center;
            border: 1px solid var(--global-color-coolgray-400);

            &:hover {
              border: 1px solid var(--alias-color-content-neutral);
            }

            .p-checkbox-icon {
              width: 10px;
              height: 10px;
            }

            &.p-highlight {
              background-color: var(--Primary-color) !important;
              border-color: transparent;
            }
          }
        }
      }

      &[aria-level="1"] {
        border-top: 1px solid var(--alias-color-background-overlay-heavy);
        border-bottom: 1px solid var(--alias-color-background-overlay-heavy);
        background: var(--alias-color-background-light) !important;

        &:last-child {
          border-bottom: 0;
        }

        td {
          label {
            font-weight: 500;
          }
        }

        & + tr[aria-level="2"] {
          td {
            border-top: 0;
          }
        }
      }

      &[aria-level="2"] {
        td {
          margin: 0 var(--space-3) !important;
          padding: var(--space-2) var(--space-2) var(--space-2) var(--space-3) !important;
        }

        & + tr[aria-level="2"] {
          &:not(.row-section) {
            td {
              padding-bottom: 0 !important;
            }

            &:not([aria-posinset="1"]) {
              td {
                padding-top: 0 !important;
              }
            }
          }

          &.row-last {
            td {
              padding-bottom: var(--space-3) !important;
            }
          }
        }
      }

      &[aria-level="2"][aria-setsize]:not([aria-setsize="1"]) {
        td {
          padding-bottom: 0 !important;
        }
      }

      &.row-section {
        td {
          border-top: 1px solid var(--alias-color-background-overlay-heavy);
          padding-bottom: 0 !important;
          margin-top: var(--space-3) !important;

          .p-treetable-toggler {
            height: 0;
          }

          label {
            cursor: default;
          }

          .p-checkbox, .p-checkbox-box {
            display: none;
          }
        }
      }
    }
  }
}
</style>
