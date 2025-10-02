<template>
  <FileUpload name="demo[]" accept="image/*" :multiple="true" :maxFileSize="1000000" :pt="{
        buttonbar: (options) => ({
            class: [
                'd-none',
            ]
        }),
        content: (options) => ({
            class: [
                'p-16',
                'border-0',
            ]
        }),
    }">>
    <template #content>
      <div class="file-upload dropzone drop-image--area">
        <div v-if="files.length > 0" class="file-upload-drop">
          <div class="ui-product-photo w-100 p-16">
            <ul class="ui-product-photo-grid clearfix">
              <li class="ui-product-photo-item pointer" v-for="file in files">
                <div class="ui-product-photo-box pointer">
                  <img src="/assets/images/slide_4_img.jpg" alt="" class="ui-product-photo-item__image"
                       style="background-blend-mode:normal!important;background-clip:content-box!important;background-position:50% 50%!important;background-color:rgba(0,0,0,0)!important;background-size:100% 100%!important;background-origin:content-box!important;background-repeat:no-repeat!important">
                  <div class="product-photo-hover-overlay"></div>
                </div>
              </li>
              <li class="ui-product-photo-item pointer">
                <div class="ui-product-photo-box pointer">
                  <div class="fileupload-text">
                    <div class="svg-next-icon-size-30" style="color:rgb(193,199,208);">
                      <div class="icon-upload-image"></div>
                    </div>
                    <p class="mb-0 d-flex flex-column align-items-center" style="color:rgb(193,199,208);font-size:10px">
                      {{
                        $t('upload_image')
                      }} </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </template>
    <template #empty>
      <div class="file-upload-drop"></div>
    </template>
  </FileUpload>
</template>

<script>
import FileUpload from "primevue/fileupload";

export default {
  components: {
    FileUpload,
  },
  data() {
    return {
      files: [1, 2, 4, 5, 6, 76, 8, 98],
      totalSize: 0,
      totalSizePercent: 0,
    }
  }
}
</script>

<style lang="scss" scoped>
.drop-image--area {
  width: 100% !important;
  min-width: unset !important;
  max-width: unset !important;
  max-height: unset !important;

  .file-upload-drop {
    width: 100%;
    height: 100%;
  }
}

.file-upload {
  min-height: 120px;
  border: 1px dashed var(--file-upload-border-color);
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--background-default);
  border-radius: 4px;
}

.ui-product-photo {
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

      .ui-product-photo-box {
        border: solid 2px transparent;
        position: relative;
        display: block;
        background: var(--background-default);
        padding: 0 0 100%;
        width: 100%;

        &:before {
          z-index: 1;
          content: "";
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          border: 1px solid var(--file-upload-item-border-color);
          border-radius: 4px;
        }

        .ui-product-photo-item__image {
          position: absolute;
          max-width: 100%;
          max-height: 100%;
          display: block;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          margin: auto;
        }

        .product-photo-hover-overlay {
          z-index: 3;
          background: var(--file-upload-product-photo-hover-overlay);
          position: absolute;
          width: 100%;
          height: 100%;
          opacity: 0;
          transition: opacity .1s ease-in-out;
        }
      }

      &:hover {
        .product-photo-hover-overlay {
          opacity: 1;
        }
      }

      &:first-child {
        width: 33.33%;
      }
    }
  }
}

.fileupload-text {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
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
        &:first-child {
          width: 33.33%;
        }
      }
    }
  }
}
</style>
