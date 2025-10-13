<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="d-md-flex justify-content-between align-items-center pt-5" v-if="mode === FORM_MODE.UPDATE">
            <div class="h2 mb-md-0" id="variant-header-title">Kem</div>
            <div class="pl-10 flex-shrink-0 text-right">
              <Button class="ms-btn btn-default color-coolgray btn-clean btn-clean mr-10">
                <div class="p-button-label ml-3">{{ $t('update_history') }}</div>
              </Button>
              <Button class="ms-btn btn-default color-coolgray btn-clean btn-clean">
                <div class="p-button-label ml-3">{{ $t('duplicate') }}</div>
              </Button>
            </div>
          </div>
          <div class="row pt-30">
            <div class="col-12 col-lg-4">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-body">
                    <div class="d-flex py-2">
                      <div class="product-info-preview-container image-wrapper-border align-items-center">
                        <div class="w-100 h-100 active">
                          <img src="/assets/images/slide_4_img.jpg" alt="" class="product-info-preview-img"
                               style="background-blend-mode:normal!important;background-clip:content-box!important;background-position:50% 50%!important;background-color:rgba(0,0,0,0)!important;background-size:100% 100%!important;background-origin:content-box!important;background-repeat:no-repeat!important">
                        </div>
                      </div>
                      <div class="flex-grow-1 pl-10 d-flex flex-column justify-content-around break-text">
                        <div class="h4 mb-0">Ghế sofa giường kéo Roots</div>
                        <div class="small text-muted py-1">{{
                            $t('product_variant_detail_with_count', {count: 2})
                          }}
                        </div>
                        <div class="w-100 h-100 active d-flex align-items-center">
                          <div class="svg-next-icon-size-14 text-content_accent">
                            <div class="icon-back"></div>
                          </div>
                          <a class="small pl-2x5">{{ $t('product_variant_back_to_product') }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head d-flex justify-content-between">
                    <span class="ui-information-title">{{ $t('product_variant_list') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <ul class="product-info-variant-list-wrapper break-text">
                      <a href="" class="w-100">
                        <li class="product-info-variant-item py-3 d-flex align-items-center">
                          <div class="product-info-list-item-img-wrapper image-wrapper-border">
                            <img src="/assets/images/slide_4_img.jpg" alt="" class="product-info-preview-img">
                          </div>
                          <div class="pl-10 d-flex flex-column justify-content-around">
                            <label for="" class="mb-0">Kem</label>
                            <p class="small mb-0">SKU: </p>
                          </div>
                        </li>
                      </a>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8">
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_variant_attributes') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="d-flex justify-content-center mr--15 flex-wrap">
                      <div class="flex-grow-1">
                        <div class="col-12 pt-15 pr-15">
                          <label for="" class="mb-5">{{ $t('color') }}</label>
                          <InputText class="next-input--stylized"></InputText>
                        </div>
                      </div>
                      <div class="pt-30 pr-10">
                        <div class="variant-image-container">
                          <div class="svg-next-icon-size-48">
                            <div class="icon-upload-image"></div>
                          </div>
                          <Button class="ms-btn btn-outline-secondary mt-5">
                            <div class="p-button-label ml-3">{{
                                $t('product_variant_select_image')
                              }}
                            </div>
                          </Button>
                        </div>
                        <div class="d-block btn btn-link font-weight-bold">{{
                            $t('choose_from_existing_images')
                          }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_variant_detail') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="row product-pricing">
                      <div class="col-12 col-md-6 pt-15">
                        <label for="" class="mb-5">
                          <div class="d-flex align-items-center">
                            {{ $t('sale_price') }}
                            <div class="svg-next-icon-size-16 mgl-1 svg-color-lightblue">
                              <div class="icon-question-mark"></div>
                            </div>
                          </div>
                        </label>
                        <div>
                          <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 pt-15">
                        <label for="" class="mb-5">
                          <div class="d-flex align-items-center">
                            {{ $t('product_compare_price') }}
                            <div class="svg-next-icon-size-16 mgl-1 svg-color-lightblue">
                              <div class="icon-question-mark"></div>
                            </div>
                          </div>
                        </label>
                        <div>
                          <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_inventory_management') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="row">
                      <div class="col-6 pt-15">
                        <div class="hrv-next-input-checkbox ui-table">
                          <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                          <label for="" class="hrv-next-label--switch">{{ $t('product_inventory_tracked') }}</label>
                        </div>
                      </div>
                      <div class="col-6 pt-15"></div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-md-6 pt-15">
                            <label for="" class="mb-5">
                              <div class="d-flex align-items-center">
                                {{ $t('sku') }}
                                <span class="trigger d-inline-flex align-items-center mgl-1">
                              <div class="svg-next-icon-size-16 svg-color-lightblue">
                                <div class="icon-question-mark"></div>
                              </div>
                            </span>
                              </div>
                            </label>
                            <div>
                              <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                            </div>
                          </div>
                          <div class="col-12 col-md-6 pt-15">
                            <label for="" class="mb-5">
                              <div class="d-flex align-items-center">
                                {{ $t('product_barcode') }}
                                <span class="trigger d-inline-flex align-items-center mgl-1">
                                  <div class="svg-next-icon-size-16 svg-color-lightblue">
                                    <div class="icon-question-mark"></div>
                                  </div>
                                </span>
                              </div>
                            </label>
                            <div>
                              <InputText class="next-input" :placeholder="$t('price_zero')"></InputText>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 pt-15">
                        <div class="hrv-next-input-checkbox ui-table">
                          <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                          <label for="" class="hrv-next-label--switch">{{ $t('product_allow_backorder') }}</label>
                        </div>
                      </div>
                      <div class="col-12 my-4">
                        <div class="row mx-0 pt-10 border-top--line">
                          <div class="col pl-0">
                            <label for="" class="my-3">{{ $t('product_available_stock') }}</label>
                          </div>
                          <div class="col-auto pr-0">
                            <div>
                              <Button class="ms-btn btn-link text-end">
                                <div class="p-button-label lh-normal ml-5">{{ $t('product_select_warehouse') }}</div>
                              </Button>
                            </div>
                          </div>
                        </div>
                        <div class="row pb-10">
                          <div class="col">
                            <InputGroup iconPosition="left" class="d-flex flex-1 next-icon-group--stylized h-40">
                              <InputGroupAddon class="pi pi-search"></InputGroupAddon>
                              <InputText v-model="value1" :placeholder="$t('product_search_warehouse')"
                                         class="flex-1 next-input--stylized"/>
                            </InputGroup >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('shipping') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0">
                      <div class="hrv-next-input-checkbox ui-table">
                        <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                        <label for="" class="hrv-next-label--switch">{{ $t('product_allow_delivery') }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper-content mb-30">
                <div class="ui-information">
                  <div class="ui-information-head">
                    <span class="ui-information-title">{{ $t('product_unit') }}</span>
                  </div>
                  <div class="ui-information-body">
                    <div class="form-group px-0 pb-0">
                      <div class="hrv-next-input-checkbox ui-table">
                        <Checkbox inputId="has_delivery" class="hrv-next-checkbox"/>
                        <label for="" class="hrv-next-label--switch">{{ $t('product_multi_unit') }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
            <div class="float-left" v-if="mode === FORM_MODE.UPDATE">
              <Button class="ms-btn btn-danger">
                <div class="p-button-label">{{ $t('product_variant_delete') }}</div>
              </Button>
            </div>
            <div class="float-right">
              <Button class="ms-btn btn-primary">
                <div class="p-button-label">
                  {{
                    mode === FORM_MODE.INSERT ? $t('product_variant_create') : $t('update')
                  }}
                </div>
              </Button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Dialog v-model:visible="visibleVariantImage" modal
          :draggable="false"
          class="modal_container modal-dialog omni-modal">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('product_variant_update_image') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <FileUploader/>
    </div>
    <template #footer>
      <div class="d-flex justify-content-between flex-1">
        <div>
          <Button class="ms-btn btn-danger btn-xs-block">
            <div class="p-button-label ml-3">{{ $t('delete_image') }}</div>
          </Button>
        </div>
        <div class="d-flex gap-2">
          <Button class="ms-btn btn-default">
            <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
          </Button>
          <Button class="ms-btn btn-accent--primary">
            <div class="p-button-label ml-3">{{ $t('confirm') }}</div>
          </Button>
        </div>
      </div>
    </template>
  </Dialog>
</template>

<script>
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import Checkbox from "primevue/checkbox";
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import Dialog from "primevue/dialog";
import FileUploader from "@/components/admin/FileUploader.vue";
import {FORM_MODE} from "@/core/constants";

export default {
  components: {
    Button,
    InputText,
    Checkbox,
    InputGroup,
    InputGroupAddon,
    Dialog,
    FileUploader,
  },
  computed: {
    FORM_MODE() {
      return FORM_MODE
    }
  },
  data() {
    return {
      mode: FORM_MODE.INSERT,
      visibleVariantImage: true,
    }
  },
  created() {
    this.mode = this.$route.params['id'] ? FORM_MODE.UPDATE : FORM_MODE.INSERT;
  }
}
</script>

<style lang="scss" scoped>
.product-info-preview-container {
  width: 60px;
  height: 60px;
  flex-shrink: 0;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product-info-preview-img {
  max-width: 100%;
  max-height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  position: absolute;
  margin: auto;
  border-radius: 4px;
  z-index: 1;
}

.product-info-list-item-img-wrapper {
  width: 50px;
  height: 50px;
  position: relative;
  margin-left: 8px;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product-info-variant-list-wrapper {
  max-height: 490px;
  margin: 0 -16px;
  overflow-y: auto;
  position: relative;
}

li.product-info-variant-item {
  color: #000;
  padding: 0 24px;
  cursor: pointer;
  position: relative;
}

.product-info-variant-item:not(:first-of-type):not(.active):before, a.w-100:not(:first-of-type) .product-info-variant-item:not(.active):before {
  content: "";
  position: absolute;
  top: 0;
  left: 16px;
  right: 16px;
  border-top: 1px solid var(--border-label-hover-description);
}

.variant-image-container {
  display: flex;
  position: relative;
  flex-direction: column;
  width: 128px;
  height: 128px;
  align-items: center;
  border-radius: 4px;
  justify-content: center;
  margin: auto;

  &:after {
    content: "";
    position: absolute;
    top: -1px;
    bottom: -1px;
    left: -1px;
    right: -1px;
    border: 1px dashed var(--image-wrapper-border-color);
    z-index: 1;
    border-radius: 4px;
    cursor: pointer;
  }
}

#variant-header-title {
  line-height: 38px;
  color: var(--color-navy);
  word-break: break-word;
}
</style>
