<template>
  <div class="product-selector-wrapper">
    <div class="product-selector-header">
      <div class="pdr-10">
        <div class="d-flex align-items-center">{{ computedTitle }}</div>
      </div>
      <div class="svg-next-icon-size-20 selector-close pointer">
        <div class="icon-close-no-circle"></div>
      </div>
    </div>
    <div class="product-selector-body">
      <div class="h-100 d-flex flex-column overflow-hidden">
        <div class="product-filter-modal__section">
          <InputGroup iconPosition="left" class="ms-input-size-m d-flex flex-1">
            <InputGroupAddon class="pi pi-search"></InputGroupAddon>
            <InputText v-model="value1" :placeholder="$t('search')" class="flex-1 ms-input-wrapper"/>
          </InputGroup>
        </div>
        <div class="product-filter-modal__list overflow-auto">
          <div class="product-filter-modal__table">
            <TreeTable v-model:expanded-keys="expandedKeys" v-model:selectionKeys="selectedKey" :value="products"
                       selectionMode="checkbox">
              <Column expander style="min-width: 320px; width: 320px">
                <template #header>
                  <div class="d-inline-flex align-items-center">
                     <span class="d-inline-flex align-items-center">
                       <span>{{ $t('product_name') }}</span>
                     </span>
                  </div>
                </template>
                <template #body="slotProps">
                  <div class="variant-row__info d-flex align-items-center pl-0">
                    <div class="flex-shrink-0 pdl-4">
                      <img src="/assets/images/slide_4_img.jpg" alt=""
                           class="product-filter__img product-filter__img--border">
                    </div>
                    <div class="variant-row__title">{{ slotProps.node.data.name }}</div>
                  </div>
                </template>
              </Column>
              <Column field="size" style="width: 100px;">
                <template #header>
                  <div class="d-inline-flex align-items-center">
                     <span class="d-inline-flex align-items-center">
                       <span>{{ $t('sale_price') }}</span>
                     </span>
                  </div>
                </template>
              </Column>
              <Column field="type" style="width: 100px;">
                <template #header>
                  <div class="d-inline-flex align-items-center">
                     <span class="d-inline-flex align-items-center">
                       <span>{{ $t('inventory') }}</span>
                     </span>
                  </div>
                </template>
              </Column>
            </TreeTable>
          </div>
        </div>
      </div>
    </div>
    <div class="product-selector-footer">
      <div class="d-flex justify-content-end gap-2">
        <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
          <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m" disabled>
          <div class="p-button-label ml-3">{{ computedFinishTitle }}</div>
        </Button>
      </div>
    </div>
  </div>
</template>

<script>
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import TreeTable from 'primevue/treetable';
import Column from 'primevue/column';

export default {
  components: {
    InputGroup,
    InputGroupAddon,
    InputText,
    TreeTable,
    Column,
  },
  props: {
    title: {
      type: String,
      default: '',
    },
    finishTitle: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      products: [
        {
          key: '0',
          data: {
            name: 'Applications',
            size: '100kb',
            type: 'Folder'
          },
          children: [
            {
              key: '0-0',
              data: {
                name: 'Vue',
                size: '25kb',
                type: 'Folder'
              },
              children: [
                {
                  key: '0-0-0',
                  data: {
                    name: 'vue.app',
                    size: '10kb',
                    type: 'Application'
                  }
                },
                {
                  key: '0-0-1',
                  data: {
                    name: 'native.app',
                    size: '10kb',
                    type: 'Application'
                  }
                },
                {
                  key: '0-0-2',
                  data: {
                    name: 'mobile.app',
                    size: '5kb',
                    type: 'Application'
                  }
                }
              ]
            },
            {
              key: '0-1',
              data: {
                name: 'editor.app',
                size: '25kb',
                type: 'Application'
              }
            },
            {
              key: '0-2',
              data: {
                name: 'settings.app',
                size: '50kb',
                type: 'Application'
              }
            }
          ]
        },
        {
          key: '1',
          data: {
            name: 'Cloud',
            size: '20kb',
            type: 'Folder'
          },
          children: [
            {
              key: '1-0',
              data: {
                name: 'backup-1.zip',
                size: '10kb',
                type: 'Zip'
              }
            },
            {
              key: '1-1',
              data: {
                name: 'backup-2.zip',
                size: '10kb',
                type: 'Zip'
              }
            }
          ]
        },
        {
          key: '2',
          data: {
            name: 'Desktop',
            size: '150kb',
            type: 'Folder'
          },
          children: [
            {
              key: '2-0',
              data: {
                name: 'note-meeting.txt',
                size: '50kb',
                type: 'Text'
              }
            },
            {
              key: '2-1',
              data: {
                name: 'note-todo.txt',
                size: '100kb',
                type: 'Text'
              }
            }
          ]
        },
        {
          key: '3',
          data: {
            name: 'Documents',
            size: '75kb',
            type: 'Folder'
          },
          children: [
            {
              key: '3-0',
              data: {
                name: 'Work',
                size: '55kb',
                type: 'Folder'
              },
              children: [
                {
                  key: '3-0-0',
                  data: {
                    name: 'Expenses.doc',
                    size: '30kb',
                    type: 'Document'
                  }
                },
                {
                  key: '3-0-1',
                  data: {
                    name: 'Resume.doc',
                    size: '25kb',
                    type: 'Resume'
                  }
                }
              ]
            },
            {
              key: '3-1',
              data: {
                name: 'Home',
                size: '20kb',
                type: 'Folder'
              },
              children: [
                {
                  key: '3-1-0',
                  data: {
                    name: 'Invoices',
                    size: '20kb',
                    type: 'Text'
                  }
                }
              ]
            }
          ]
        },
        {
          key: '4',
          data: {
            name: 'Downloads',
            size: '25kb',
            type: 'Folder'
          },
          children: [
            {
              key: '4-0',
              data: {
                name: 'Spanish',
                size: '10kb',
                type: 'Folder'
              },
              children: [
                {
                  key: '4-0-0',
                  data: {
                    name: 'tutorial-a1.txt',
                    size: '5kb',
                    type: 'Text'
                  }
                },
                {
                  key: '4-0-1',
                  data: {
                    name: 'tutorial-a2.txt',
                    size: '5kb',
                    type: 'Text'
                  }
                }
              ]
            },
            {
              key: '4-1',
              data: {
                name: 'Travel',
                size: '15kb',
                type: 'Text'
              },
              children: [
                {
                  key: '4-1-0',
                  data: {
                    name: 'Hotel.pdf',
                    size: '10kb',
                    type: 'PDF'
                  }
                },
                {
                  key: '4-1-1',
                  data: {
                    name: 'Flight.pdf',
                    size: '5kb',
                    type: 'PDF'
                  }
                }
              ]
            }
          ]
        },
        {
          key: '5',
          data: {
            name: 'Main',
            size: '50kb',
            type: 'Folder'
          },
          children: [
            {
              key: '5-0',
              data: {
                name: 'bin',
                size: '50kb',
                type: 'Link'
              }
            },
            {
              key: '5-1',
              data: {
                name: 'etc',
                size: '100kb',
                type: 'Link'
              }
            },
            {
              key: '5-2',
              data: {
                name: 'var',
                size: '100kb',
                type: 'Link'
              }
            }
          ]
        },
        {
          key: '6',
          data: {
            name: 'Other',
            size: '5kb',
            type: 'Folder'
          },
          children: [
            {
              key: '6-0',
              data: {
                name: 'todo.txt',
                size: '3kb',
                type: 'Text'
              }
            },
            {
              key: '6-1',
              data: {
                name: 'logo.png',
                size: '2kb',
                type: 'Picture'
              }
            }
          ]
        },
        {
          key: '7',
          data: {
            name: 'Pictures',
            size: '150kb',
            type: 'Folder'
          },
          children: [
            {
              key: '7-0',
              data: {
                name: 'barcelona.jpg',
                size: '90kb',
                type: 'Picture'
              }
            },
            {
              key: '7-1',
              data: {
                name: 'primevue.png',
                size: '30kb',
                type: 'Picture'
              }
            },
            {
              key: '7-2',
              data: {
                name: 'prime.jpg',
                size: '30kb',
                type: 'Picture'
              }
            }
          ]
        },
        {
          key: '8',
          data: {
            name: 'Videos',
            size: '1500kb',
            type: 'Folder'
          },
          children: [
            {
              key: '8-0',
              data: {
                name: 'primefaces.mkv',
                size: '1000kb',
                type: 'Video'
              }
            },
            {
              key: '8-1',
              data: {
                name: 'intro.avi',
                size: '500kb',
                type: 'Video'
              }
            }
          ]
        }
      ],
      expandedKeys: {},
      selectedKey: null,
    }
  },
  methods: {
    expandAll() {
      this.expandedKeys = this.products.reduce((acc, node) => {
        acc[node.key] = true;
        return acc;
      }, {});
    }
  },
  computed: {
    computedFinishTitle() {
      return this.finishTitle || this.$t('complete_selection')
    },
    computedTitle() {
      return this.title || this.$t('all_products')
    }
  },
  mounted() {
    this.expandAll();
  },
}
</script>

<style lang="scss">
.product-selector-wrapper {
  display: flex;
  flex-direction: column;
  height: calc(100vh - 160px);
  background: var(--background-default);
  border-radius: var(--radius-rounded-l);

  .product-selector-header {
    display: flex;
    flex: 0 0 56px;
    padding: 8px 16px;
    align-items: center;
    gap: 16px;
    background: var(--background-default);
    border-bottom: 1px solid var(--alias-color-border-default);
    position: relative;
    font-size: 16px;
    font-weight: 600;
    line-height: 24px;
    color: var(--content-default);
    white-space: pre-wrap;
    border-radius: var(--radius-rounded-l) var(--radius-rounded-l) 0 0;

    .selector-close {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
    }
  }

  .product-selector-body {
    flex: 1 1 auto;
    overflow: auto;

    .product-filter-modal__section {
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      padding: 12px 16px;
      border-bottom: 1px solid var(--bg-button);
    }

    .product-filter-modal__table {
      tr {
        border-bottom: 1px solid var(--alias-color-border-default);
      }

      td {
        padding: 10px 16px;
        line-height: 20px;
      }

      .p-treetable-thead {
        th {
          position: sticky;
          position: -webkit-sticky;
          top: -1px;
          z-index: 999;
          background-color: var(--alias-color-border-light);
          font-weight: 500;
          color: #000;
          line-height: 16px;
          font-size: 12px;
          padding: 10px 16px;
          white-space: nowrap;
          text-align: inherit;
        }

      }

      .p-treetable-tbody {
        tr {

          &:hover {
            background-color: var(--color-coolgray-50);
          }

          td {
            &:first-child {
              display: flex;
              align-items: center;

              .p-checkbox {
                margin: 0 !important;

                &.p-indeterminate {
                  .p-checkbox-icon {
                    display: none;
                  }
                }
              }
            }

            .variant-row__title, .variant-row__info {
              padding-left: 16px;
            }

            .product-filter__img {
              width: 40px;
              height: 40px;
              object-fit: contain;
              border-radius: 4px;
              overflow: hidden;
            }

            .product-filter__img--border {
              border: 1px solid var(--color-truegray-300);
            }

            .p-treetable-toggler {
              display: none;
            }
          }

          &[aria-level="2"] {
            td {
              &:first-child {
                padding-left: 68px;
              }
            }
          }
        }
      }
    }
  }

  .product-selector-footer {
    background: var(--background-default);
    padding: 12px 16px;
    border-top: 1px solid var(--alias-color-border-default);
    flex: 0 0 56px;
    display: flex;
    align-items: center;
    justify-content: end;
    border-radius: 0 0 var(--radius-rounded-l) var(--radius-rounded-l);
  }
}

@media (max-width: 768px) {

  .product-selector-footer, .product-selector-header {
    border-radius: 0 !important;
  }

  @supports (height:100dvh) {
    .product-filter-modal {
      height: 100dvh;
      max-height: 100dvh;
      width: 100% !important;
    }

    .product-selector-wrapper {
      height: 100dvh;
      width: 100% !important;
      max-height: 100dvh;
    }
  }
}
</style>
