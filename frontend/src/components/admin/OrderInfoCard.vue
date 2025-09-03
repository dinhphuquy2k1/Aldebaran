<template>
  <div>
    <div class="row cart-body scrolling-stone pt-15">
      <div class="col-lg-5 col-12 pb-15">
        <div class="cart-product scrolling-stone pr-15">
          <div class="order-block--table order-cart-view-item pb-10 px-0 pt-10">
            <div class="order-block--table-image">
              <div class="table-cell--image mr-5">
                <img src="/assets/images/slide_4_img.jpg" class="box-image" alt="">
              </div>
              <div class="order-block--table-content">
                <strong
                    class="text-primary mb-2 d-inline-block table-break-word"><span>Đèn treo sang trọng Hubert </span></strong>
                <div class="mb-2 text-secondary table-break-word"></div>
              </div>
            </div>
            <div class="border-0 text-end">
              <p class="mb-10">x 6</p>
              <p class="mb-10">1,200,000 ₫</p>
            </div>
          </div>
          <div class="pb-10 pl-0 text-end">
            <strong>Tổng: 7,200,000 ₫</strong>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-7 col-12 pb-15">
        <div class="row cart-info">
          <div class="col-12">
            <div class="row">
              <div class="col-auto">
                <p class="mb-10">
                  <strong>{{ $t('shipping_info') }}</strong>
                </p>
              </div>
              <div>
                <div class="editaddress--block cursor-pointer"></div>
              </div>
            </div>
          </div>
          <div class="col-12 table-break-word">
            <strong>Haravan Demo</strong>
          </div>
          <div class="col-12">
            <p class="color-gray-solid mb-10">
            <span>
              <span class="text-nodata">{{ $t('no_company_info') }}</span>
            </span>
            </p>
          </div>
          <div class="col-12">
            <p class="table-break-word mb-10">182 Lê Đại Hành, Phường 15, Quận 11, Hồ Chí Minh, Vietnam</p>
          </div>
          <div class="col-12">
            <p class="table-break-word mb-10"></p>
          </div>
          <div class="col-12">
            <div class="mb-5 color-black table-break-word d-flex justify-content-between">
              <span>• <span class="label-hover-description pointer">{{ $t('ordered') }}</span></span>
              <b>11 đơn hàng</b>
            </div>
            <div class="mb-5 color-black table-break-word d-flex justify-content-between">
              <span>• <span class="label-hover-description pointer">{{ $t('cumulative_revenue') }}</span></span>
              <b>266,126,000 ₫</b>
            </div>
            <div class="mb-5 color-black table-break-word d-flex justify-content-between">
              <span>• <span class="label-hover-description pointer">{{ $t('debt') }}</span></span>
              <b class="text-success">-252,376,000 ₫</b>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 col-12 pb-15">
        <div class="row cart-desc">
          <div class="col-12">
            <label for="" class="mb-5">{{ $t('note') }}</label>
            <Textarea rows="3" class="hrv-ui-textarea mb-10" :placeholder="$t('order_note')"/>
            <div class="d-flex align-items-between justify-content-between mb-2">
              <div class="label-input-group color-202223">{{ $t('label') }}</div>
              <div>
                <Button
                    class="ms-btn bg-transparent p-0 label-input-group"
                    :label="$t('all_labels')"></Button>
              </div>
            </div>
          </div>
          <div class="col-12 pb-5 pt-5 text-end">
            <Button class="ms-btn bg-transparent color-coolgray btn-clean pe-0">
              <div class="p-button-icon svg-next-icon-size-14 mr-5">
                <div class="icon-save"></div>
              </div>
              <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('save_note_and_labels') }}</div>
            </Button>
          </div>
        </div>
      </div>
    </div>
    <div class="row cart-footer">
      <div class="col-12">
        <div class="border-top mb-15"></div>
        <div class="d-flex justify-content-between">
          <div>
            <Button class="ms-btn bg-transparent color-coolgray btn-clean btn-clean">
              <div class="p-button-icon svg-next-icon-size-14 mr-5">
                <div class="icon-archive"></div>
              </div>
              <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('archive') }}</div>
            </Button>
            <Button class="ms-btn bg-transparent color-coolgray btn-clean btn-clean">
              <div class="p-button-icon svg-next-icon-size-14 mr-5">
                <div class="icon-print"></div>
              </div>
              <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('print_order') }}</div>
            </Button>
            <Button class="ms-btn bg-transparent color-coolgray btn-clean btn-clean">
              <div class="p-button-icon svg-next-icon-size-14 mr-5">
                <div class="icon-close"></div>
              </div>
              <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('cancel_order') }}</div>
            </Button>
          </div>
          <div>
            <Button class="ms-btn btn-default color-coolgray btn-clean btn-clean">
              <div class="p-button-label ml-3 d-none d-sm-inline-block">{{ $t('verify_order') }}</div>
            </Button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Button from 'primevue/button';
import Textarea from 'primevue/textarea';

export default {
  components: {
    Button,
    Textarea,
  }
}
</script>

<style lang="scss">
.cart-body {
  max-height: 500px;
  overflow: auto;

  .cart-product {
    height: 100%;
    width: 100%;
    right: 0;
    overflow: auto;
    //position: absolute;

    .order-block--table {
      display: flex;

      .order-block--table-image {
        flex: 2;
        display: flex;
        margin-right: 10px;

        .order-block--table-content {
          flex: 2;
        }
      }
    }
  }
}
</style>
