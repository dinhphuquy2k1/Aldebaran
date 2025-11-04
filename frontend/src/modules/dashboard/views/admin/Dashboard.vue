<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="row" style="row-gap:var(--space-4)">
            <div class="col-sm-8 col-12">
              <div class="hrv-card overflow-unset">
                <div class="hrv-card-head">{{ $t('today_business_result') }}</div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="dashboard-daily-result">
                      <div class="daily-result__item">
                        <div class="d-flex flex-column align-self-stretch">
                          <span class="text-body-m no-wrap">{{ $t('revenue') }}</span>
                          <span class="flex-fill text-headxl no-wrap">0</span>
                          <Button class="ms-btn ms-btn-size-M btn-accent--link no-wrap align-self-flex-start">
                            <div class="p-button-label">{{ $t('view_report') }}</div>
                          </Button>
                        </div>
                        <div class="flex-fill position-relative h-100" style="width:246px">
                          <div class="d-flex align-items-end h-100">
                            <div
                                style="height:2px;width:100%;background:var(--alias-color-background-accent);margin-bottom:4px;margin-left:24px"></div>
                          </div>
                        </div>
                      </div>
                      <div class="daily-result__item">
                        <div class="d-flex flex-column align-self-stretch">
                          <span class="text-body-m no-wrap">{{ $t('revenue') }}</span>
                          <span class="flex-fill text-headxl no-wrap">0</span>
                          <Button class="ms-btn ms-btn-size-M btn-accent--link no-wrap align-self-flex-start">
                            <div class="p-button-label">{{ $t('view_report') }}</div>
                          </Button>
                        </div>
                        <div class="flex-fill position-relative h-100" style="width:246px">
                          <div class="d-flex align-items-end h-100">
                            <div
                                style="height:2px;width:100%;background:var(--alias-color-background-accent);margin-bottom:4px;margin-left:24px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hrv-card">
                <div class="hrv-card-head">
                  <div class="d-flex justify-content-between">
                    <span>{{ $t('order_status') }}</span>
                  </div>
                </div>
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="dashboard-order-summary">
                      <div class="dashboard-order-summary__item">
                        <div class="dashboard-order-summary__icon mgr-2">
                          <div class="svg-next-icon-size-24">
                            <div class="icon-svg-order-unpaid"></div>
                          </div>
                        </div>
                        <span class="text-body-l fw-semi-bold mgr-1">0</span>
                        <span class="text-body-m flex-fill text-lowercase"> {{ $t('unpaid') }}</span>
                        <div class="svg-next-icon-size-7">
                          <div class="icon-next"></div>
                        </div>
                      </div>
                      <div class="dashboard-order-summary__item">
                        <div class="dashboard-order-summary__icon mgr-2">
                          <div class="svg-next-icon-size-24">
                            <div class="icon-svg-order-not-delivered"></div>
                          </div>
                        </div>
                        <span class="text-body-l fw-semi-bold mgr-1">0</span>
                        <span class="text-body-m flex-fill text-lowercase"> {{ $t('not_delivered') }}</span>
                        <div class="svg-next-icon-size-7">
                          <div class="icon-next"></div>
                        </div>
                      </div>
                      <div class="dashboard-order-summary__item">
                        <div class="dashboard-order-summary__icon mgr-2">
                          <div class="svg-next-icon-size-24">
                            <div class="icon-svg-order-on-delivery"></div>
                          </div>
                        </div>
                        <span class="text-body-l fw-semi-bold mgr-1">0</span>
                        <span class="text-body-m flex-fill text-lowercase"> {{ $t('shipping_in_progress') }}</span>
                        <div class="svg-next-icon-size-7">
                          <div class="icon-next"></div>
                        </div>
                      </div>
                      <div class="dashboard-order-summary__item">
                        <div class="dashboard-order-summary__icon mgr-2">
                          <div class="svg-next-icon-size-24">
                            <div class="icon-svg-order-cancel-order"></div>
                          </div>
                        </div>
                        <span class="text-body-l fw-semi-bold mgr-1">0</span>
                        <span class="text-body-m flex-fill text-lowercase"> {{ $t('cancel_order') }}</span>
                        <div class="svg-next-icon-size-7">
                          <div class="icon-next"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="hrv-card overflow-unset">
                <div class="hrv-card-body">
                  <div class="hrv-card-section">
                    <div class="row">
                      <div class="col-12 mb-10"></div>
                      <div class="general-salechannel col-12">
                        <div class="d-flex align-items-center">
                          <Dropdown
                              :options="options"
                              optionLabel="label"
                              :placeholder="$t('add_filter_condition')"
                              class="ms-selection"
                          />
                          <Button class="ms-btn btn-mono--secondary ms-btn-size-m mgl-2 pdl-2 pdr-2">
                            <div class="svg-next-icon-size-20">
                              <div class="icon-refresh"></div>
                            </div>
                          </Button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="setting-line"></div>
                  <div class="hrv-card-section">
                    <div class="text-headl pdt-1 pdb-1">Doanh Thu Thuần - Tất cả kênh bán hàng</div>
                    <div class="d-flex align-items-center flex-wrap mgt-3 border-default radius-m pd-2 gap-3">
                      <div class="flex-shrink-0 line-height-20px">
                        <div class="text-body-m fw-semi-bold">0 ₫</div>
                      </div>
                    </div>
                  </div>
                  <div class="setting-line"></div>
                  <div class="pdl-4 pdr-4">
                    <div class="d-flex align-item-center justify-content-between pdt-3 pdb-3 text-body-m">
                      <span>{{ $t('total_orders') }}</span>
                      <span class="fw-semi-bold">0</span>
                    </div>
                    <div class="setting-line"></div>
                    <div class="d-flex align-item-center justify-content-between pdt-3 pdb-3 text-body-m">
                      <span>{{ $t('sold_quantity') }}</span>
                      <span class="fw-semi-bold">0</span>
                    </div>
                    <div class="setting-line"></div>
                    <div class="d-flex align-item-center justify-content-between pdt-3 pdb-3 text-body-m">
                      <span>{{ $t('product_cost') }}</span>
                      <span class="fw-semi-bold">0</span>
                    </div>
                    <div class="setting-line"></div>
                    <div class="d-flex align-item-center justify-content-between pdt-3 pdb-3 text-body-m">
                      <span>{{ $t('product_profit') }}</span>
                      <span class="fw-semi-bold">0</span>
                    </div>
                  </div>
                  <div class="setting-line"></div>
                  <div class="hrv-card-section">
                    <div class="text-headl pdt-1 pdb-1">{{ $t('best_selling_products') }}</div>
                    <div class="general-bestsale--nodata mgt-3">
                      <div class="text-center">
                        <img src="/assets/icons/empty_data.svg" alt="" width="100" height="100">
                        <p class="mb-0 text-center text-secondary">{{ $t('no_best_selling_products') }}</p>
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
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';

export default {
  components: {
    Dropdown,
    Button,
  },
  data() {
    return {
      options: [],
    }
  },
}
</script>

<style lang="scss">
.setting-line {
  height: 1px;
  width: 100%;
  background: var(--alias-color-border-default);
}

.dashboard-daily-result {
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: 1fr 1fr;
  gap: var(--space-3);

  .daily-result__item {
    display: flex;
    padding: 16px;
    align-items: flex-start;
    gap: var(--space-6);
    border-radius: var(--radius-rounded-l, 16px);
    border: 1px solid var(--alias-color-border-default);
    flex-grow: 0;
    flex-shrink: 0;
    height: 120px;
  }
}

.dashboard-order-summary {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--space-3);
}


.dashboard-order-summary__item {
  display: flex;
  padding: 12px;
  align-items: center;
  border-radius: var(--radius-rounded-l, 16px);
  border: 1px solid var(--alias-color-border-default);
  background: #fff;
  cursor: pointer;
}

@media screen and (min-width: 768px) {
  .dashboard-daily-result {
    grid-template-columns: calc(50% - (var(--space-3) / 2)) calc(50% - (var(--space-3) / 2));
    grid-template-rows: 100%;
  }

  .dashboard-order-summary {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
