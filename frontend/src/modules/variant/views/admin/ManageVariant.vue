<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container pdb-0">
        <div class="padding-container">
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
                    <div class="row justify-content-center">
                      <div class="flex-grow-1">
                        <div class="col-12 pt-15">
                          <label for="">{{ $t('product_variant_color') }}</label>
                        </div>
                      </div>
                      <div class="pt-30 pr-10">
                        <div class="variant-image-container">
                          <div class="svg-next-icon-size-48">
                            <div class="icon-upload-image"></div>
                          </div>
                          <Button class="ms-btn btn-outline-secondary mt-5">
                            <div class="p-button-label ml-3 d-none d-sm-inline-block">{{
                                $t('product_variant_select_image')
                              }}
                            </div>
                          </Button>
                        </div>
                        <div class="d-block btn btn-link font-weight-bold">{{ $t('product_variant_select_from_existing') }}</div>
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
import Button from "primevue/button";

export default {
  components: {
    Button,
  },
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
</style>
