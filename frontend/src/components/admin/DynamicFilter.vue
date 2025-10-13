<template>
  <div class="row no-gutters">
    <div class="col">
      <div>
        <div class="row no-gutters">
          <div class="col-auto pr-10">
            <div class="trigger">
              <span>
                <Button @click="toggle" aria-haspopup="true" aria-controls="overlay_menu"
                        class="filter-options__childrent__dropdown__menu">
                  <div class="p-button-icon">
                      <svg class="svg-next-icon svg-next-icon-size-14" width="14" height="14">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 459 459">
                          <g>
                            <path
                                d="M178.5,382.5h102v-51h-102V382.5z M0,76.5v51h459v-51H0z M76.5,255h306v-51h-306V255z"></path>
                          </g>
                        </svg>
                      </svg>
                    </div>
                  <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('add_filter_condition') }}</div>
                </Button>
              </span>
            </div>
          </div>
          <div class="col">
            <InputGroup iconPosition="left" class="next-icon-group--stylized h-40">
              <InputGroupAddon class="pi pi-search"></InputGroupAddon>
              <InputText v-model="search" :placeholder="$t('search')" class="next-input next-input--invisible"
                         @input="changeSearch"/>
            </InputGroup>
          </div>
        </div>

        <OverlayPanel ref="menuFilters" class="filter-options__overlay__menu" :dismissable="true">
          <div>
            <div style="margin-bottom: 5px" class="sub_title">Hiển thị tất cả sản phẩm theo:</div>
            <template v-for="(level, idx) in levels" :key="idx">
              <component
                  :is="getInputComponent(level)"
                  v-model="level.inputValue"
                  v-bind="getInputProps(level)"
                  @change="onSelect(idx)"
              />
            </template>

            <div class="d-flex gap-2 justify-end mt-3" style="gap: 10px">
              <Button :label="$t('cancel')" class="btn-hover-opacity ms-btn btn-default" outlined @click="close"/>
              <Button :label="$t('add_filter_condition')" class="ms-btn btn-primary" style="padding: 9px 22px"
                      @click="addFilter"/>
            </div>
          </div>
        </OverlayPanel>
      </div>
    </div>
    <div class="col-auto pl-0" v-if="layout">
      <div class="view-layout-options ml-15 mr-5 text-end">
        <SelectButton v-model="selectedLayoutOption" :options="layoutOptions" optionLabel="value" optionValue="value"
                      dataKey="value"
                      aria-labelledby="basic" class="medium-button-group medium-button-group-default"
                      optionDisabled="constant" @change="changeLayout" :allowEmpty="false">
          <template #option="slotProps">
            <div class="svg-next-icon-size-16">
              <div :class="slotProps.option.icon"></div>
            </div>
          </template>
        </SelectButton>
      </div>
    </div>
  </div>
</template>

<script>
import SelectButton from 'primevue/selectbutton';
import Dropdown from "primevue/dropdown";
import Button from "primevue/button";
import OverlayPanel from "primevue/overlaypanel";
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';
import InputNumber from "primevue/inputnumber";
import MultiSelect from 'primevue/multiselect';
import Calendar from 'primevue/calendar';
import {DEBOUNCE, LAYOUT_TYPE} from "@/core/constants";

export default {
  name: "DynamicFilter",
  components: {
    Dropdown,
    Button,
    OverlayPanel,
    InputGroup,
    InputGroupAddon,
    InputText,
    SelectButton,
    InputNumber,
    MultiSelect,
    Calendar,
  },
  props: {
    options: {type: Array, required: true},
    defaultValue: {type: [Object, String, Number], default: null},
    modelValue: {
      type: Object,
      default: () => ({
        search: '',
        select: null,
        selectedLayoutOption: null,
      })
    },
    layout: {
      type: Boolean,
      default: false,
    }
  },
  emits: ['update:modelValue', 'change'],
  data() {
    return {
      levels: [],
      layoutOptions: [
        {
          icon: 'icon-list',
          value: LAYOUT_TYPE.LIST,
          constant: true,
        },
        {
          icon: 'icon-grid',
          value: LAYOUT_TYPE.GRID,
          constant: false,
        },
      ],
      selectedLayoutOption: null,
      search: null,
      filters: [],
    };
  },
  methods: {
    toggle(event) {
      this.$refs.menuFilters.toggle(event);
    },
    close() {
      this.$refs.menuFilters.hide();
    },
    onSelect(levelIndex) {
      this.levels.splice(levelIndex + 1);

      const selected = this.levels[levelIndex].inputValue;
      if (!selected) return;
      if (selected.type === "group") {
        selected.children.forEach(c => {
          this.autoFillChildren([c], levelIndex + 1);
        });
      } else if (selected.children) {
        this.autoFillChildren(selected.children, levelIndex + 1);
      } else if (selected?.type === "input" || selected?.type === "number") {
        this.levels[levelIndex].inputValue = null;
      }

      console.log(this.levels)
    },

    autoFillChildren(children, levelIndex) {
      if (!children || !children.length) return;

      const first = children[0];
      let newLevel = {options: children, value: first, inputValue: first};

      if (first.type === "input" || first.type === "number" || first.type === 'date') {
        newLevel.inputValue = null;
      } else if (first.type === 'multiselect') {
        newLevel.inputValue = children.map(c => c.value);
      }

      this.levels.push(newLevel);

      if (first.children) {
        this.autoFillChildren(first.children, levelIndex + 1);
      }
    },

    addFilter() {
      if (!this.levels.length) return;

      let filter = {
        field: null,
        label: null,
        operator: null,
        value: null,
      };

      for (let idx = 0; idx < this.levels.length; idx++) {
        const level = this.levels[idx];
        const sel = level.inputValue;
        if (!sel) continue;

        if (idx === 0) {
          filter.field = sel.value;
          filter.label = sel.label;
        } else if (sel.type === "input" || sel.type === "number") {
          filter.value = sel.inputValue ?? null;
        } else if (sel.type === "group") {
          filter.value = sel.children
              .map(c => {
                const childLevel = this.levels.find(l => l.value.value === c.value);
                return childLevel?.inputValue ?? "";
              })
              .join("|");
          filter.operator = sel.value;
          break;
        } else if (sel.children) {
          filter.operator = sel.value;
        } else if (sel.type === "select") {
          filter.value = sel.value;
        } else {
          filter.value = sel;
        }
      }

      if (!filter.operator) filter.operator = "=";

      this.filters.push(filter);
      console.log("Filter built:", filter);
    },

    getInputComponent(level) {
      switch (level.value?.type) {
        case 'multiselect':
          return 'MultiSelect';
        case 'group':
          return 'GroupInput';
        case 'number':
          return 'InputNumber';
        case 'date':
          return 'Calendar';
        case 'select':
          return 'Dropdown';
        default:
          return 'InputText';
      }
    },

    getInputProps(level) {
      const type = level.value?.type;
      if (!type || type === 'select') {
        return {options: level.options, optionLabel: 'label', placeholder: this.levelPlaceholder(level)};
      }
      if (type === 'multiselect') {
        return {
          options: level.options,
          optionLabel: 'label',
          optionValue: 'value',
          display: 'chip',
          placeholder: 'Chọn nhiều...'
        };
      }
      if (type === 'group') {
        return {level}; // GroupInput tự xử lý children
      }
      if (type === 'number') {
        return {placeholder: 'Nhập giá trị', class: 'w-full mb-2'};
      }
      if (type === 'date') {
        return {showIcon: true, iconDisplay: 'input'};
      }
      if (type === 'input') {
        return {placeholder: 'Nhập giá trị', style: 'margin-bottom: 5px'};
      }
      return {};
    },

    levelPlaceholder(level) {
      return 'Nhập giá trị';
    },

    changeLayout() {
      this.layoutOptions = this.layoutOptions.map(option => ({
        ...option,
        constant: option.value === this.selectedLayoutOption
      }));

      this.emitChange();
    },
    changeSearch() {
      clearTimeout(this.debounce);
      this.debounce = setTimeout(() => {
        this.emitChange();
      }, DEBOUNCE.INPUT)
    },

    emitChange() {
      const newValue = {
        search: this.search,
        select: null,
        selectedLayoutOption: this.selectedLayoutOption,
      };

      this.$emit('update:modelValue', newValue);
      this.$emit('change', newValue);
    },

    // initialize default condition value
    initLevels() {
      if (this.options.length === 0) return
      let first = this.options[0];
      this.levels = [{options: this.options, value: first || null, inputValue: first || null}];

      let current = first;
      while (current?.children) {
        let inputValue = null;
        if (current.children[0]?.type === 'multiselect') {
          inputValue = [];
        } else {
          inputValue = current.children[0];
        }

        this.levels.push({options: current.children, value: current.children[0], inputValue});
        current = current.children[0];
      }
    },

    /**
     * initialize value
     */
    init() {
      if (!this.modelValue.selectedLayoutOption) {
        this.$emit('update:modelValue', {
          ...this.modelValue,
          selectedLayoutOption: this.layoutOptions[0].value,
        });
      }
    },
  },
  watch: {
    options: {
      handler(newOptions) {
        if (Array.isArray(newOptions) && newOptions.length > 0) {
          this.levels[0] = {
            inputValue: newOptions[0],
            value: newOptions[0],
            options: newOptions
          }

          this.onSelect(0)
        }
      },
      immediate: true,
      deep: true,
    },
  },
  created() {
    this.init();
  }
};
</script>

<style lang="scss">
.filter-options__childrent__dropdown__menu {
  max-height: 40px;
  min-height: 40px;
  display: flex;
  align-items: center;
  padding: 3px 10px;
  cursor: pointer;
  background: #fff;
  border: 1px solid var(--color-light-gray) !important;
  border-radius: 4px;
  box-shadow: unset !important;

  .p-button-icon {
    width: 14px;
    height: 14px;
    display: flex;
    align-items: center;

    svg {
      width: 100%;
      height: 100%;
    }
  }

  .p-button-label {
    color: var(--color-coolgray-900);
    font-weight: 400;
    margin-left: 10px;
  }
}

.filter-options__overlay__menu {
  .p-overlaypanel-content {
    padding: 15px;

    .sub_title {
      color: var(--color-coolgray-900);
      line-height: 18px;
      font-size: 14px;
      font-weight: 400;
    }
  }
}
</style>
