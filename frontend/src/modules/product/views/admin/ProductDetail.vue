<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container pb-0 pt-30">
          <div class="row">
            <div class="col">
              <label for="" class="title-header">Ghế sofa giường kéo Roots</label>
            </div>
            <div class="col-auto"></div>
          </div>
        </div>
        <div class="padding-container pb-0 pt-30">
          <div class="row">
            <div class="col-lg-9 col-12">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('general_info') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0">
                      <label class="label-input-group">
                        {{ $t('product_name') }}
                      </label>
                      <div>
                        <InputText class="next-input" :placeholder="$t('enter_product_name')"></InputText>
                      </div>
                    </div>
                    <div class="form-group px-0">
                      <div class="row">
                        <div class="col-sm-6 col-12">
                          <label for="" class="label-input-group">{{ $t('brand') }}</label>
                          <Dropdown
                              optionLabel="label"
                              :placeholder="$t('add_filter_condition')"
                              class="next-dropdown"
                              style="margin-bottom: 5px"
                          />
                        </div>
                        <div class="col-sm-6 col-12">
                          <label for="" class="label-input-group">{{ $t('category') }}</label>
                          <Dropdown
                              optionLabel="label"
                              :placeholder="$t('add_filter_condition')"
                              class="next-dropdown"
                              style="margin-bottom: 5px"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="form-group px-0">
                      <label for="" class="label-input-group">{{ $t('product_description') }}</label>
                    </div>
                    <div class="form-group px-0 pb-0">
                      <label for="" class="label-input-group">{{ $t('quote') }}</label>
                      <div>
                        <InputText class="next-input" :placeholder="$t('product_quote')"></InputText>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="row">
                      <div class="col">
                        <span class="ui-information-title">
                          <div class="d-flex align-items-center">
                            {{ $t('product_images') }}
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="ui-product-photo product-upload-image">
                    <ul class="ui-product-photo-grid clearfix">
                      <li class="ui-product-photo-item"></li>
                      <li class="ui-product-photo-item d-block"></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('variant') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div>
                      <div>
                        <div>
                          <div class="col-12 border-bottom padding-y-20px">
                            <div class="row align-items-center">
                              <div class="col-4">
                                <div></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 border-bottom">
                        <div class="product-attribute--add text-primary align-items-center font-weight-500 pointer">
                          <div class="svg-next-icon-size-14">
                            <div class="icon-add"></div>
                          </div>
                          <span>{{ $t('add_another_attribute') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="variants-preview pt-16">
                      <div class="row m-0">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('product_groups') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0 product-new--comboboxCollection">
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <div class="ui-information-title">{{ $t('promotions') }}</div>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0 product-new--comboboxCollection">
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-body">
                    <div class="d-flex align-items-center justify-content-between mb-5">
                      <div class="ui-information-title">{{ $t('label') }}</div>
                      <Button
                          class="ms-btn btn-link no-padding label-input-group"
                          :label="$t('all_labels')"></Button>
                    </div>
                    <div>
                      <InputText class="next-input--stylized" :placeholder="$t('enter_product_name')">
                      </InputText>
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
import InputText from 'primevue/inputtext';
import Dropdown from "primevue/dropdown";
import Button from 'primevue/button';

export default {
  components: {
    InputText,
    Dropdown,
    Button,
  }
}
</script>

<style lang="scss" scoped>
.product-attribute--add {
  display: flex;
  margin: 16px 0;
  gap: 15px;
}

.ui-product-photo {
  position: relative;
  padding: 16px 0;

  .ui-product-photo-grid {
    list-style-type: none;
    padding: 0;
    margin: 0 0 -10px -10px;

    .ui-product-photo-item {
      width: 33.33%;
      float: left;
      padding-left: 10px;
      margin: 0 0 11px;
      box-sizing: border-box;
    }
  }
}

@media (min-width: 768px) {
  .ui-product-photo {
    .ui-product-photo-grid {
      .ui-product-photo-item {
        width: 20%;

        &:first-child {
          width: 40%;
        }
      }
    }
  }
}

@media (min-width: 992px) {
  .ui-product-photo {
    .ui-product-photo-grid {
      .ui-product-photo-item {
        width: 16.66%;

        &:first-child {
          width: 33.33%;
        }
      }
    }
  }
}
</style>
