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
                    <path d="M178.5,382.5h102v-51h-102V382.5z M0,76.5v51h459v-51H0z M76.5,255h306v-51h-306V255z"></path>
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
            <IconField iconPosition="left" class="next-icon-field--stylized h-40">
              <InputIcon class="pi pi-search"></InputIcon>
              <InputText v-model="search" :placeholder="$t('search')" class="next-input next-input--invisible"
                         @input="changeSearch"/>
            </IconField>
          </div>
        </div>

        <OverlayPanel ref="menuFilters" class="filter-options__overlay__menu" :dismissable="true">
          <div>
            <div style="margin-bottom: 5px" class="sub_title">Hiển thị tất cả sản phẩm theo:</div>
            <template v-for="(level, idx) in levels" :key="idx">
              <Dropdown
                  v-model="level.selected"
                  :options="level.options"
                  optionLabel="label"
                  :placeholder="$t('add_filter_condition')"
                  class="omni-selection"
                  style="margin-bottom: 5px"
                  @change="onSelect(idx)"
              />
            </template>

            <!-- nút hành động -->
            <div class="d-flex gap-2 justify-end mt-3" style="gap: 10px">
              <Button :label="$t('cancel')" class="btn-hover-opacity ms-btn btn-default" outlined @click="close"/>
              <Button :label="$t('add_filter_condition')" class="ms-btn btn-primary" style="padding: 9px 22px" disabled
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
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import {DEBOUNCE, LAYOUT_TYPE} from "@/core/constants";

export default {
  name: "DynamicFilter",
  components: {
    Dropdown,
    Button,
    OverlayPanel,
    IconField,
    InputIcon,
    InputText,
    SelectButton,
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
    };
  },
  mounted() {
    // khởi tạo cấp đầu tiên
    let first = this.defaultValue
        ? this.options.find(opt => opt.value === this.defaultValue || opt.label === this.defaultValue)
        : this.options[0];
    this.levels = [{options: this.options, selected: first || null}];

    // nếu có children thì tự động mở tiếp
    let current = first;
    while (current?.children) {
      this.levels.push({options: current.children, selected: current.children[0]});
      current = current.children[0];
    }
  },
  methods: {
    toggle(event) {
      this.$refs.menuFilters.toggle(event);
    },
    close() {
      this.$refs.menuFilters.hide();
    },
    onSelect(levelIndex) {
      // cắt bỏ các level sau
      this.levels.splice(levelIndex + 1);

      const selected = this.levels[levelIndex].selected;
      if (selected?.children) {
        this.levels.push({options: selected.children, selected: selected.children[0]});
      }
    },
    addFilter() {
      // lấy đường dẫn lựa chọn
      const path = this.levels.map(l => l.selected?.value);
      console.log("Filter path:", path);
      this.close();
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
    }
  },
  created() {
    if (!this.modelValue.selectedLayoutOption) {
      this.$emit('update:modelValue', {
        ...this.modelValue,
        selectedLayoutOption: this.layoutOptions[0].value,
      });
    }
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
