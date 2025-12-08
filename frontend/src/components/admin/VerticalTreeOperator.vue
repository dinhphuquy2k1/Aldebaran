<template>
  <div class="vertical-tree-operator-container position-relative">
    <div class="vertical-tree-operator">
      <div>
        <div>
          <SelectButton v-model="value" :options="options" aria-labelledby="basic" optionLabel="label"
                        optionValue="value" :allowEmpty="false"/>
        </div>
      </div>
    </div>
    <div class="vertical-parent-ul vertical-parent-solid">
      <div class="ml-0 ms-cust-md-ml-75">
        <div class="vertical-tree-parrent-li">
          <div class="ml-12 bg-color-gray-18 pdy-3 pl-12 border-8 pr-12 pr-lg-0">
            <div>
              <div class="vertical-tree-child-li">
                <div class="row gap-0 g-0">
                  <div class="col-12 col-lg-3">
                    <Dropdown optionLabel="name" :placeholder="$t('select')" class="ms-selection"/>
                  </div>
                  <div class="col-12 col-lg-9">
                    <div class="d-lg-flex">
                      <InputText class="ms-input ml-lg-8 mt-lg-0 mt-8"
                                 :placeholder="$t('value')"></InputText>
                      <div class="d-flex align-items-center" style="min-width:80px">
                        <div class="d-none d-lg-block pointer ml-5" style="min-width: 26px; padding: 0 8px;">
                          <Button class="ms-btn btn-tertiary ms-btn-size-m col-lg-2 content-neutral">
                            <div class="svg-next-icon-size-18">
                              <div class="icon-add-circle"></div>
                            </div>
                          </Button>
                        </div>
                        <div class="d-none d-lg-block pointer" style="min-width: 26px; padding: 0 8px;">
                          <Button class="ms-btn btn-tertiary ms-btn-size-m col-lg-2 content-neutral">
                            <div class="svg-next-icon-size-18">
                              <div class="icon-delete"></div>
                            </div>
                          </Button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="vertical-tree-parrent-li">
          <div class="row gap-0 g-0">
            <Button class="ms-btn btn-tertiary ms-btn-size-m col-lg-2 content-neutral justify-content-center">
              <div class="svg-next-icon-size-20">
                <div class="icon-add-circle"></div>
              </div>
              <div class="p-button-label ml-3 mw-content lh-normal">{{ $t('add_condition') }}</div>
            </Button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SelectButton from 'primevue/selectbutton';
import InputText from 'primevue/inputtext';
import Dropdown from 'primevue/dropdown';
import Button from 'primevue/button';

export default {
  components: {
    SelectButton,
    InputText,
    Dropdown,
    Button,
  },
  data() {
    return {
      value: 'and',
      options: [
        {
          value: 'and',
          label: this.$t('and'),
        },
        {
          value: 'or',
          label: this.$t('or'),
        }
      ],
      filterConditions: [
        {}
      ],
    }
  },
}
</script>

<style lang="scss">
.vertical-tree-operator-container {
  .vertical-tree-operator {
    .p-selectbutton {
      width: 90px;
      display: flex;
      padding: 4px;
      position: relative;
      background: #fff;
      line-height: 28px;
      box-shadow: 0 0 2.5px #0000002e;
      border-radius: 4px;
      transition: transform .3s cubic-bezier(.77, 0, .175, 1);

      .p-button {
        width: 50%;
        padding: 0;
        margin: 0;
        text-align: center;
        cursor: pointer;
        color: var(--color-coolgray-600);
        font-size: 12px !important;
        font-weight: 600;
        border: none;
        text-transform: uppercase;

        &.p-highlight {
          border-radius: 4px;
          background: #dcebfe;
          font-weight: 600;
        }
      }
    }
  }

  .vertical-parent-ul {
    padding-left: 30px;

    .vertical-tree-parrent-li {
      margin: 0;
      list-style-type: none;
      position: relative;
      padding-top: 16px;

      &:before {
        content: "";
        position: absolute;
        width: 1px;
        height: 100%;
        inset: 0 auto 50px -18px;
      }

      &:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 18px;
        margin-top: 10px;
        height: 20px;
        right: auto;
        left: -18px;
      }

      &:first-child {
        padding-top: 8px;

        &:after {
          margin-top: 4px;
        }
      }

      &:last-child {
        &:before {
          height: 22px;
          top: 0;
        }

        &:after {
          top: 4px;
          border-top: none;
          border-bottom-left-radius: 8px;
        }
      }
    }

    &.vertical-parent-solid {
      .vertical-tree-parrent-li {
        &:before {
          border-left: 1px solid var(--blue600);
        }

        &:after {
          border-top: 1px solid var(--blue600);
        }

        &:last-child {
          &:after {
            border-top: none;
            border-bottom: 1px solid var(--blue600);
            border-left: 1px solid var(--blue600);
          }
        }
      }
    }
  }
}

@media (min-width: 769px) {
  .vertical-tree-operator-container {
    .vertical-parent-ul {
      .vertical-tree-parrent-li {
        &:before {
          left: -58px;
        }

        &:after {
          width: 58px;
          left: -58px;
        }
      }
    }
  }
}


</style>
