<template>
  <main class="ms-content">
    <div class="ms-banner">
      <div class="ms-container-fluid">
        <Carousel :value="banners" :numVisible="1" :numScroll="1" :circular="true" :autoplay-interval="8000"
                  ref="banner">
          <template #item="slotProps">
            <div>
              <img src="/assets/images/slide_4_img.jpg" :alt="slotProps.data.url">
            </div>
          </template>
        </Carousel>
      </div>
    </div>
    <section class="home-category">
      <div class="ms-container-fluid">
        <Carousel :value="banners" :numVisible="4" :numScroll="4" :showNavigators="false" ref="homeCategory"
                  class="ms-carousel-indicator-group"
                  :responsiveOptions="[
              {
                    breakpoint: '1400px',
                    numVisible: 4,
                    numScroll: 4
                },
                {
                    breakpoint: '1199px',
                    numVisible: 3,
                    numScroll: 3
                },
                {
                    breakpoint: '767px',
                    numVisible: 2,
                    numScroll: 2
                }
          ]">
          <template #item="slotProps">
            <div class="category-item">
              <div class="category-block">
                <div class="category-block--image">
                  <img src="/assets/images/slide_4_img.jpg" :alt="slotProps.data.url">
                </div>
                <div class="category-block--content">
                  <h3 class="h-title">Phòng khách</h3>
                  <div class="h-btn">Xem ngay</div>
                </div>
              </div>
            </div>
          </template>
        </Carousel>
      </div>
    </section>

    <section class="home-collection-1">
      <div class="ms-container-fluid">
        <div class="wrapper-content position-relative">
          <div class="section-heading">
            <div class="box-header">
              <h2 class="h-title">
                Đồ bếp nhập khẩu cao cấp
              </h2>
            </div>
          </div>
          <div class="section-content">
            <Carousel :value="banners" :numVisible="4" :numScroll="4" :show-indicators="false"
                      ref="homeCategory1"
                      :responsiveOptions="[
                          {breakpoint: '1400px',numVisible: 4,numScroll: 4},
                          {breakpoint: '1199px',numVisible: 3,numScroll: 3},
                          {breakpoint: '767px',numVisible: 2,numScroll: 2}]"
            >
              <template #item="slotProps">
                <div class="product-loop">
                  <div class="product-inner">
                    <div class="proloop-image">
                      <div class="pro-sale">
                        <span>-66%</span>
                      </div>
                      <div class="pro-soldout">
                        <span>Hết hàng</span>
                      </div>
                      <div class="product--image">
                        <div class="lazy-img">
                          <picture>
                            <img src="/assets/images/slide_4_img.jpg" alt="">
                          </picture>
                        </div>
                      </div>
                    </div>
                    <div class="proloop-detail">
                      <div class="proloop--vendor">
                        RECIPE
                      </div>
                      <h3>Bộ 9 Kẹp Miệng Túi Nhựa Xanh Ngọc/ Xám RECIPE</h3>
                      <p class="proloop--price on-sale">
                        <span class="price">20,000₫</span>
                        <span class="price-del">59,000₫</span>
                        <span class="prohzt-soldout">
                          Hết hàng
                        </span>
                        <span class="pro-percent">-66%</span>
                      </p>

                      <div class="proloop-actions">
                        <div class="proloop-actions__inner">
                          <div class="actions-primary d-flex justify-content-center">
                            <Button
                                class="ms-btn bg-transparent text-center d-flex justify-content-center">
                              <div class="d-flex align-items-center gap-1">
                                <div style="text-transform: uppercase; font-weight: 500;">
                                  {{ $t('add_to_cart') }}
                                </div>
                                <span class="btnico">
                                  <svg version="1.0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <g transform="translate(0 512) scale(.1 -.1)">
                                      <path
                                          d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"></path>
                                      <path
                                          d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"></path>
                                    </g>
                                  </svg>
                                </span>
                              </div>
                            </Button>
                          </div>
                          <div class="actions-boxqty d-flex"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </Carousel>
          </div>
          <div class="section-link">
            <Button
                class="ms-btn text-center d-flex justify-content-center">
              <div class="d-flex align-items-center gap-1">
                <div>
                  {{ $t('add_to_cart') }}
                </div>
                <span>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                       x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;"
                       xml:space="preserve"><circle class="st0" cx="16" cy="16" r="13"></circle><polyline class="st0"
                                                                                                          points="14,11.8 18.2,16 14,20.2 "></polyline></svg>
                                </span>
              </div>
            </Button>
          </div>
        </div>
      </div>
    </section>

    <section class="home-coupon">
      <div class="ms-container-fluid">
        <div class="list-coupon">
          <div class="col-12 col-md-6 col-xl-3 coupon-item">
            <div class="coupon-item__inner">
              <div class="coupon-item__left">
                <div class="cp-img boxlazy-img">
                  <span class="boxlazy-img__insert">
                    <img src="/assets/images/home_coupon_1_img.png" alt="">
                  </span>
                </div>
              </div>
              <div class="coupon-item__right">
                <Button
                    class="ms-btn text-center bg-transparent d-flex justify-content-center mw-0 mh-0 h-0 cp-icon">
                  <div class="d-flex align-items-center gap-1">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                           height="20" viewBox="0 0 20 20">
                        <defs>
                          <path id="4gg7gqe5ua"
                                d="M8.333 0C3.738 0 0 3.738 0 8.333c0 4.595 3.738 8.334 8.333 8.334 4.595 0 8.334-3.739 8.334-8.334S12.928 0 8.333 0zm0 1.026c4.03 0 7.308 3.278 7.308 7.307 0 4.03-3.278 7.308-7.308 7.308-4.03 0-7.307-3.278-7.307-7.308 0-4.03 3.278-7.307 7.307-7.307zm.096 6.241c-.283 0-.512.23-.512.513v4.359c0 .283.23.513.512.513.284 0 .513-.23.513-.513V7.78c0-.283-.23-.513-.513-.513zm.037-3.114c-.474 0-.858.384-.858.858 0 .473.384.857.858.857s.858-.384.858-.857c0-.474-.384-.858-.858-.858z"></path>
                        </defs>
                        <g>
                          <g>
                            <g>
                              <g>
                                <g>
                                  <g transform="translate(-2808 -4528) translate(2708 80) translate(52 4304) translate(48 144) translate(1.667 1.667)">
                                    <use xlink:href="#4gg7gqe5ua"></use>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                  </div>
                </Button>
                <div class="cp-top">
                  <h3>Giảm 200.000đ</h3>
                  <p>Đơn hàng từ 3 triệu</p>
                </div>

                <div class="cp-bottom">
                  <div class="cp-bottom-detail">
                    <p>Mã:
                      <strong>VOUCHERT3-200K</strong>
                    </p>
                    <p>HSD: 31/03/2025</p>
                  </div>

                  <div class="cp-bottom-btn">
                    <Button
                        class="ms-btn text-center d-flex justify-content-center">
                      <div class="d-flex align-items-center gap-1">
                        <div>
                          {{ $t('copy_code') }}
                        </div>
                      </div>
                    </Button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import {ref} from "vue";
import Carousel from 'primevue/carousel';
import Button from 'primevue/button';
import {useCarouselDrag} from "@/composables/useCarouselDrag";

export default {
  components: {
    Carousel,
    Button,
  },
  data() {
    return {
      banners: [
        {
          id: 1,
          url: 'slide_4_img.jpg'
        }, {
          id: 2,
          url: 'slide_4_img.jpg'
        },
        {
          id: 3,
          url: 'slide_4_img.jpg'
        },
        {
          id: 3,
          url: 'slide_4_img.jpg'
        },
        {
          id: 3,
          url: 'slide_4_img.jpg'
        },
        {
          id: 3,
          url: 'slide_4_img.jpg'
        }
      ],
    }
  },
  setup() {
    const homeCategory = ref(null);
    const homeCategory1 = ref(null);

    // chỉ gắn drag cho carousel này
    useCarouselDrag(homeCategory);
    useCarouselDrag(homeCategory1);
    return {homeCategory, homeCategory1};
  }
}
</script>
<style lang="scss">
.ms-content {
  .ms-banner {
    padding-bottom: 0;
    position: relative;
    margin-bottom: 0;

    .p-carousel-content {
      position: relative;
      overflow: unset;

      .p-carousel-indicators {
        position: absolute;
        left: 50%;
        bottom: 15px;
        text-align: center;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);

        .p-carousel-indicator {
          .p-link {
            display: -webkit-flex;
            width: 12px;
            height: 12px;
            margin: 4px;
            border-radius: 50%;
            background: #928c8c;
          }

          &.p-highlight {
            .p-link {
              background: var(--shop-color-main);
              -webkit-transform: scale(1.2);
              -ms-transform: scale(1.2);
              transform: scale(1.2);
            }
          }
        }
      }
    }

    .p-carousel-container {
      position: relative;

      .p-link {
        cursor: pointer;
        position: absolute;
        width: 40px;
        height: 40px;
        z-index: 1;
        text-align: center;
        color: #fff;
        background-color: var(--shop-color-main);
        border: 1px solid var(--shop-color-main);
        transition: all 0.5s;
        opacity: 0;

        &:hover {
          background-color: #fff;
          color: #a8a4a4;
        }

        &.p-carousel-prev {
          left: 10px;
          -webkit-transform: translateX(-20px);
          -ms-transform: translateX(-20px);
          transform: translateX(-20px);
        }

        &.p-carousel-next {
          right: 10px;
          -webkit-transform: translateX(20px);
          -ms-transform: translateX(20px);
          transform: translateX(20px);
        }
      }

      &:hover {
        .p-link {
          opacity: 1;
          -webkit-transform: translateX(0);
          -ms-transform: translateX(0);
          transform: translateX(0);
        }
      }

      .p-carousel-items-container {
        border-radius: 5px;

        .p-carousel-item {
          min-height: 1px;

          img {
            cursor: pointer;
            width: auto !important;
            text-align: center;
            margin: auto;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: opacity .4s ease;
            max-width: 100%;
            -webkit-user-drag: none; /* Safari */
            user-drag: none; /* Chrome/Edge */
            user-select: none; /* không bôi đen text */
            pointer-events: auto; /* vẫn nhận được click */
          }
        }
      }
    }
  }

  .home-category {
    padding-bottom: 70px;

    .p-carousel-items-content {
      .p-carousel-items-container {
        margin-left: -15px;
        margin-right: -15px;

        .p-carousel-item {
          .category-item {
            position: relative;
            padding-right: 15px;
            padding-left: 15px;

            .category-block {
              position: relative;
              overflow: hidden;
              border-radius: 5px;

              .category-block--image {
                -moz-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;

                img {
                  width: 100%;
                  aspect-ratio: 7 / 4;
                  -webkit-user-drag: none; /* Safari */
                  user-drag: none; /* Chrome/Edge */
                  user-select: none; /* không bôi đen text */
                  pointer-events: auto; /* vẫn nhận được click */
                }
              }

              .category-block--content {
                width: 100%;
                text-align: center;
                padding: 10px 20px;
                background: #ffffff;

                h3 {
                  font-size: $font-size + 4px;
                  font-weight: 700;
                  margin: 10px 0 5px;
                }

                .h-btn {
                  color: var(--shop-color-text);
                }
              }
            }
          }
        }
      }
    }

    .p-carousel-items-container {
      border-radius: 5px;

      .p-carousel-item {
        min-height: 1px;

        img {
          cursor: pointer;
          width: auto !important;
          text-align: center;
          margin: auto;
          overflow: hidden;
          transform-style: preserve-3d;
          transition: opacity .4s ease;
          max-width: 100%;
        }
      }
    }
  }

  .home-collection-1 {
    .wrapper-content {
      background: var(--home-collection1-bg);
      padding: 15px 7px;
      border-radius: 10px;

      .section-heading {
        margin-bottom: 15px;

        .box-header {
          h2 {
            padding-left: 30px;
            padding-right: 15px;
            position: relative;

            &:after {
              content: "";
              background-color: transparent;
              border-radius: 100%;
              display: block;
              left: 10px;
              width: 8px;
              height: 8px;
              position: absolute;
              top: 12px;
              border: 1px solid var(--home-collection1-icon);
              animation: pulseSmall 1.25s linear infinite;
            }

            &:before {
              content: "";
              background-color: var(--home-collection1-icon);
              border-radius: 100%;
              display: block;
              left: 10px;
              width: 8px;
              height: 8px;
              position: absolute;
              top: 12px;
            }
          }
        }
      }

      .section-content {
        .p-carousel-content {
          .p-carousel-container {

            .p-link {
              position: absolute;
              top: 10px;
              z-index: 3;
              width: 30px;
              height: 30px;
              line-height: 28px;
              font-size: 14px;
              border-radius: 50%;
              color: #858380;
              background: #fff;
              border: 1px solid var(--shop-color-border);
              outline: none;
              -webkit-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
              box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
              -webkit-transition: all 0.4s;
              -ms-transition: all 0.4s;
              transition: all 0.4s;

              &.p-carousel-next {
                right: 7px;
              }

              &.p-carousel-prev {
                right: 47px;
              }

              &:hover {
                background: var(--shop-color-button);

                svg {
                  stroke: #ffffff;
                  color: #ffffff;
                }
              }
            }

            .p-carousel-items-content {
              .p-carousel-items-container {
                .p-carousel-item {
                  .product-loop {
                    height: 100%;
                    margin-bottom: 0;
                    padding-bottom: 14px;
                    position: relative;
                    padding-left: 7px;
                    padding-right: 7px;

                    .product-inner {
                      margin-bottom: 0;
                      background: #fff;
                      height: 100%;
                      display: -ms-flexbox;
                      display: -webkit-flex;
                      display: flex;
                      -webkit-flex-direction: column;
                      -ms-flex-direction: column;
                      flex-direction: column;
                      justify-content: space-between;
                      box-shadow: 0 0 3px rgba(0, 0, 0, 0.08);
                      border-radius: 4px;

                      .proloop-image {
                        position: relative;
                        overflow: hidden;
                        padding: 5px;

                        .pro-sale, .pro-soldout {
                          position: absolute;
                          top: 7px;
                          z-index: 3;
                          border-radius: 3px;
                          color: #fff;
                          font-size: 12px;
                          font-weight: 500;
                          padding: 2px 5px;
                        }

                        .pro-sale {
                          left: 7px;
                          background: red;
                          letter-spacing: 0.5px;
                          min-width: 40px;
                          text-align: center;
                        }

                        .pro-soldout {
                          left: 7px;
                          background: var(--gray-600);
                          font-size: 11px;
                          padding-top: 3px;
                          padding-bottom: 3px;
                        }

                        .product--image {
                          position: relative;
                          display: flex;
                          display: -ms-flex;
                          display: -webkit-flex;

                          .lazy-img {
                            position: relative;
                            width: 100%;
                            height: 0;
                            flex: 0 0 100%;
                            -ms-flex: 0 0 100%;
                            padding-bottom: 100%;
                            -webkit-transition: all 500ms ease;
                            -moz-transition: all 500ms ease;
                            -ms-transition: all 500ms ease;
                            -o-transition: all 500ms ease;
                            transition: all 500ms ease;

                            img {
                              position: absolute;
                              top: 50%;
                              left: 50%;
                              display: block;
                              object-fit: contain;
                              transform: translate(-50%, -50%);
                              -ms-transition: all 500ms ease;
                              -o-transition: all 500ms ease;
                              transition: all 500ms ease;
                              max-height: 100%;
                              width: initial;
                              opacity: 1;
                            }
                          }
                        }
                      }

                      .proloop-detail {
                        position: relative;
                        padding: 10px 14px 10px;
                        display: -ms-flexbox;
                        display: -webkit-flex;
                        display: flex;
                        -webkit-flex-direction: column;
                        -ms-flex-direction: column;
                        flex-direction: column;
                        -webkit-flex: 1 1 auto;
                        -ms-flex: 1 1 auto;
                        flex: 1 1 auto;
                        text-align: center;

                        .proloop--vendor {
                          margin-bottom: 5px;
                          text-transform: uppercase;
                          font-size: 12px;
                          font-weight: 500;
                          overflow: hidden;
                          text-overflow: ellipsis;
                          white-space: nowrap;
                          color: var(--gray-light);
                        }

                        h3 {
                          font-size: 14px;
                          margin: 0 0 5px;
                          font-weight: 500;
                          color: var(--shop-color-text);
                          white-space: initial;
                          overflow: hidden;
                          -webkit-line-clamp: 2;
                          -webkit-box-orient: vertical;
                          display: -webkit-box;
                          text-decoration: none;
                          outline: none;
                          -moz-transition: all 0.3s ease-in-out;
                          -o-transition: all 0.3s ease-in-out;
                          -webkit-transition: all 0.3s ease-in-out;
                          transition: all 0.3s ease-in-out;
                        }

                        .proloop--price {
                          margin: 0;
                          padding-bottom: 10px;
                          font-weight: 600;
                          font-size: 14px;
                          color: var(--gray-dark);

                          .price-del {
                            color: #878c8f;
                            text-decoration: line-through;
                            font-weight: 300;
                            font-size: 13px;
                          }

                          &.on-sale {
                            .price {
                              margin-right: 4px;
                              color: #ff2c26;
                            }
                          }
                        }

                        .proloop-actions {
                          .proloop-actions__inner {
                            position: relative;

                            .actions-primary {
                              .p-button {
                                background: #fff;
                                color: var(--shop-color-text);
                                border: 1px solid transparent;
                                border-radius: 16px;
                                position: relative;
                                padding: 0 45px 0 15px;
                                height: 32px;
                                min-height: 32px !important;
                                line-height: 30px;
                                outline: none;
                                font-size: 12px !important;
                                font-weight: 600;
                                text-transform: uppercase;
                                transition: border 0.5s ease;
                                -o-transition: border 0.5s ease;
                                -moz-transition: border 0.5s ease;
                                -webkit-transition: border 0.5s ease;

                                &:not(:disabled) {
                                  &:hover {
                                    border-color: var(--red-600);
                                  }
                                }

                                .btnico {
                                  position: absolute;
                                  right: -1px;
                                  top: -1px;
                                  display: block;
                                  width: 32px;
                                  height: 32px;
                                  background: #c4123f;
                                  border-radius: 50%;
                                  transition: all 0.5s;
                                  cursor: pointer;

                                  svg {
                                    width: 16px;
                                    height: 31px;
                                    display: block;
                                    margin: auto;
                                    fill: #ffffff;
                                    overflow: hidden;
                                    vertical-align: middle;
                                  }
                                }

                                &.p-disabled {
                                  .btnico {
                                    background: #eaeaea;
                                  }
                                }
                              }
                            }

                            .actions-boxqty {
                              justify-content: center;
                              -ms-justify-content: center;
                              position: absolute;
                              opacity: 0;
                              visibility: hidden;
                              top: 0;
                              left: 0;
                              right: 0;
                            }
                          }
                        }
                      }
                    }

                    &:not(.product-horizontal) {
                      .pro-percent {
                        display: none;
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }

      .section-link {
        .p-button {
          position: relative;
          background: var(--shop-color-button);
          border: 0;
          font-size: 14px;
          box-shadow: none;
          z-index: 1;
          overflow: hidden;
          font-weight: 500;
          border-radius: 4px;
          display: inline-block;
          line-height: 16px;
          outline: none !important;
          margin: 15px auto 0;
          padding: 12px 5px;
          text-align: center;
          text-transform: none;
          color: #333;
          min-width: 320px;
          transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
          webkit-transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);

          svg {
            width: 16px;
            height: 16px;
            stroke: var(--shop-color-text);
            fill: none;
            margin-bottom: 1px;
            margin-left: 3px;
            transition: all 0.3s;
            -ms-transition: all 0.3s;
          }

          &:before {
            background-color: #fff;
            content: '';
            display: block;
            position: absolute;
            left: -2px;
            top: 0;
            right: -2px;
            bottom: 0;
            z-index: -1;
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
            -webkit-transform-origin: left center;
            transform-origin: left center;
            -webkit-transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
            transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
            transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
            transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
          }

          &:hover:before {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(0, 1);
            transform: scale(0, 1);
          }

          &:hover {
            color: #fff;

            svg {
              color: #fff;
              stroke: #fff;
            }
          }
        }
      }
    }
  }

  .home-coupon {
    .list-coupon {
      display: flex;
      display: -ms-flex;
      flex-wrap: wrap;
      -ms-flex-wrap: wrap;
      margin-left: -7px;
      margin-right: -7px;

      .coupon-item {
        padding-left: 7px;
        padding-right: 7px;

        .coupon-item__inner {
          background: var(--home-coupon-bg);
          display: flex;
          display: -ms-flex;
          border-radius: 15px;
          height: 100%;
          border: 1px solid rgba(0, 0, 0, 0.08);

          .coupon-item__left {
            flex: 0 0 30%;
            -ms-flex: 0 0 30%;
            max-width: 30%;
            position: relative;
            border-right: 1px dashed var(--shop-color-border);
            padding: 8px;

            &:before, &:after {
              content: "";
              width: 20px;
              height: 10px;
              right: -10px;
              position: absolute;
              background: var(--shop-color-bg);
              z-index: 99;
              border: 1px solid rgba(0, 0, 0, 0.08);
            }

            &:before {
              bottom: -1px;
              border-bottom: 0;
              border-top-left-radius: 10px;
              border-top-right-radius: 10px;
            }

            &:after {
              top: -1px;
              border-top: 0;
              border-bottom-left-radius: 10px;
              border-bottom-right-radius: 10px;
            }

            .cp-img {
              background: var(--home-coupon-light);
              border-radius: 10px;

              .boxlazy-img__insert {
                position: relative;
                height: 0;
                display: block;
                width: 100%;
                padding-bottom: 100%;

                img {
                  position: absolute;
                  left: 0;
                  top: 0;
                  width: 100%;
                  height: 100%;
                  object-fit: contain;
                  padding: 10px;
                  max-width: 100%;
                }
              }
            }
          }

          .coupon-item__right {
            flex: 0 0 70%;
            max-width: 70%;
            position: relative;
            display: flex;
            display: -ms-flex;
            flex-direction: column;
            -ms-flex-direction: column;
            justify-content: space-between;
            -ms-justify-content: space-between;
            padding: 10px;
            color: var(--home-coupon-text);

            .cp-icon {
              background: transparent;
              border: 0;
              outline: none;
              cursor: pointer;
              position: absolute;
              top: 5px;
              right: 5px;
              padding: 5px;
              width: 20px !important;
              height: 20px !important;
            }

            .cp-top {
              padding-bottom: 12px;
              padding-right: 24px;

              h3 {
                margin: 0 0 2px;
                font-size: 14px;
                font-weight: 700;
                color: var(--home-coupon-text);
              }

              p {
                font-size: 12px;
                font-weight: 500;
              }
            }

            .cp-bottom {
              display: flex;
              display: -ms-flex;
              justify-content: space-between;
              -ms-justify-content: space-between;

              p {
                font-size: 10px;

                strong {
                  font-weight: 700;
                  letter-spacing: 0.4px;
                  font-size: 11px;
                }
              }

              .cp-bottom-btn {
                display: flex;
                display: -ms-flex;

                .p-button {
                  padding: 3px 6px !important;
                  font-size: 10px !important;
                  min-width: 92px;
                  letter-spacing: 0.5px;
                  border-radius: 20px;
                  margin-top: auto;
                  position: relative;
                  display: inline-block;
                  height: unset !important;
                  min-height: unset !important;
                  z-index: 1;
                  overflow: hidden;
                  padding: 8px 24px;
                  line-height: normal;
                  color: #fff;
                  border-radius: 20px;
                  background-color: var(--shop-color-hover);
                  border: 0;
                  font-weight: 500;
                  text-align: center;
                  letter-spacing: 1px;
                  text-transform: uppercase;
                  outline: none !important;
                  -webkit-transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
                  transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);

                  &:before {
                    content: '';
                    display: block;
                    background-color: var(--shop-color-button);
                    position: absolute;
                    left: -2px;
                    top: 0;
                    right: -2px;
                    bottom: 0;
                    z-index: -1;
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    -webkit-transform-origin: left center;
                    transform-origin: left center;
                    -webkit-transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
                    transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
                    transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
                    transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

@keyframes pulseSmall {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 1;
  }
  50% {
    opacity: 0.6;
  }
  100% {
    -webkit-transform: scale(3.4);
    transform: scale(3.4);
    opacity: 0;
  }
}

@media (min-width: 992px) {
  .ms-content {
    .home-category {
      margin-top: 30px;

      .p-carousel-items-content {
        .p-carousel-items-container {
          .p-carousel-item {
            .category-item {
              .category-block {
                .category-block--image {
                  img {
                    -webkit-transition: all 400ms ease;
                    -ms-transition: all 400ms ease;
                    transition: all 400ms ease;
                    max-width: 100%;
                  }
                }
              }
            }
          }
        }
      }
    }

    .home-collection-1 {
      .wrapper-content {
        .section-content {
          .p-carousel-content {
            .p-carousel-container {
              .p-carousel-items-content {
                .p-carousel-items-container {
                  .p-carousel-item {
                    .product-loop {
                      .product-inner {
                        position: relative;
                        overflow: hidden;
                        -webkit-transition: all 400ms ease;
                        -moz-transition: all 400ms ease;
                        -ms-transition: all 400ms ease;
                        -o-transition: all 400ms ease;
                        transition: all 400ms ease;

                        .proloop-detail {
                          background: #fff;
                          -webkit-transition: transform 300ms ease;
                          -moz-transition: transform 300ms ease;
                          -ms-transition: transform 300ms ease;
                          -o-transition: transform 300ms ease;
                          transition: transform 300ms ease;
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

@media (max-width: 991px) {
  .home-category {
    padding-bottom: 40px;

    .category-item {
      padding-right: 0 !important;
      padding-left: 15px !important;

      .category-block {
        margin-top: 15px;

        h3 {
          font-size: $font-size !important;
        }
      }
    }
  }
}
</style>
