<template>
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
        <IconField iconPosition="left">
          <InputIcon class="pi pi-search"></InputIcon>
          <InputText v-model="value1" :placeholder="$t('search')" />
        </IconField>
      </div>
    </div>

    <!-- Panel -->
    <OverlayPanel ref="menuFilters" id="overlay_menu" :dismissable="true">
      <div class="p-3 w-72">
        <!-- render dropdown đa cấp -->
        <template v-for="(level, idx) in levels" :key="idx">
          <Dropdown
              v-model="level.selected"
              :options="level.options"
              optionLabel="label"
              :placeholder="$t('add_filter_condition')"
              class="w-full mb-3"
              @change="onSelect(idx)"
          />
        </template>

        <!-- nút hành động -->
        <div class="flex gap-2 justify-end mt-3">
          <Button :label="$t('cancel')" severity="secondary" outlined @click="close"/>
          <Button :label="$t('add_filter_condition')" @click="addFilter"/>
        </div>
      </div>
    </OverlayPanel>
  </div>
</template>

<script>
import Dropdown from "primevue/dropdown";
import Button from "primevue/button";
import OverlayPanel from "primevue/overlaypanel";
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';

export default {
  name: "DynamicFilter",
  components: {
    Dropdown,
    Button,
    OverlayPanel,
    IconField,
    InputIcon,
    InputText,
  },
  props: {
    options: {type: Array, required: true},
    defaultValue: {type: [Object, String, Number], default: null}
  },
  data() {
    return {
      levels: [] // [{ options, selected }]
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
</style>
