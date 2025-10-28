<template>
  <section class="layout-container layout-wrapper-block body-background ui-main-account">
    <div class="ui-main-container">
      <div class="ui-title-bar-container channel-icon">
        <h1 class="ui-title-bar__title">{{ $t('my_account') }}</h1>
      </div>
      <TabView class="next-tab__container">
        <TabPanel :header="$t('account_info')">
          <div class="form-update-profile">
            <div class="ui-annotated-section-container">
              <div class="ui-annotated-section">
                <div class="ui-annotated-section__annotation">
                  <div class="ui-annotated-section__title">
                    <h2 class="ui-heading">{{ $t('details') }}</h2>
                  </div>
                </div>
                <div class="ui-annotated-section__content">
                  <div class="ui-main wrapper-content">
                    <div class="ui-main-section pd-all-20">
                      <div class="user-avatar-form">
                        <div class="user-avatar"></div>
                        <div class="button-group-file ml-15">
                          <Button class="ms-btn btn-default">
                            <div class="p-button-label">{{ $t('download_image') }}</div>
                          </Button>
                          <Button class="ms-btn btn-default ml-15">
                            <div class="p-button-label">{{ $t('delete_image') }}</div>
                          </Button>
                        </div>
                      </div>
                    </div>
                    <div class="ui-main-section pd-all-20">
                      <div class="row mb-30">
                        <div class="col-sm-6">
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('organization_name') }}</label>
                            <InputText class="next-input" :placeholder="$t('enter_product_name')"></InputText>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('full_name') }}</label>
                            <InputText class="next-input" :placeholder="$t('full_name')"></InputText>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('username') }}</label>
                            <InputText class="next-input" :placeholder="$t('username')"></InputText>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('phone_number') }}</label>
                            <InputText class="next-input" :placeholder="$t('phone_number')"></InputText>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('language') }}</label>
                            <InputText class="next-input" :placeholder="$t('language')"></InputText>
                          </div>
                          <div class="mb-15">
                            <label for="" class="label-input-group">{{ $t('country') }}</label>
                            <InputText class="next-input" :placeholder="$t('country')"></InputText>
                          </div>
                        </div>
                      </div>
                      <div>
                        <Button class="ms-btn btn-primary">
                          <div class="p-button-label">{{ $t('update') }}</div>
                        </Button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </TabPanel>
        <TabPanel :header="$t('security')">
          <div class="form-update-profile">
            <div class="ui-annotated-section-container">
              <div class="ui-annotated-section">
                <div class="ui-annotated-section__annotation">
                  <div class="ui-annotated-section__title">
                    <h2 class="ui-heading">{{ $t('details') }}</h2>
                  </div>
                </div>
                <div class="ui-annotated-section__content">
                  <div class="ui-main wrapper-content">
                    <div class="ui-main-section pd-all-20">
                      <div class="user-avatar-form">
                        <div class="user-avatar"></div>
                      </div>
                    </div>
                    <div class="ui-main-section pd-all-20"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </TabPanel>
      </TabView>
    </div>
  </section>
</template>

<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

export default {
  components: {
    TabView,
    TabPanel,
    InputText,
    Button,
  }
}
</script>

<style lang="scss">
.ui-main-account {
  .p-tabview-panels {
    background: transparent;
    padding: 0;
  }

  .ui-title-bar-container {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    z-index: 1;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    border-bottom: 0;
    min-height: 76px;
    padding: 0 30px;

    .ui-title-bar__title {
      font-size: 26px;
      line-height: 30px;
      font-weight: 600;
      overflow: hidden;
      overflow-wrap: break-word;
      word-wrap: break-word;
      white-space: normal;
      margin: 0;
      color: rgba(33, 33, 33, .8);
    }
  }

  .next-tab__container {
    .p-tabview-nav-container {
      border-bottom: 1px solid var(--border-tab-view-color);
      border-top: 1px solid var(--border-tab-view-color);
      width: 100%;
      margin-top: 15px;

      .p-tabview-nav {
        list-style: none;
        background-color: var(--bg-tab-view-color);
        overflow: visible;
        border-radius: 3px 3px 0 0;
        -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        padding: 0 30px;

        .p-tabview-header {
          position: relative;
          -webkit-box-flex: 0;
          -webkit-flex-grow: 0;
          -ms-flex-positive: 0;
          flex-grow: 0;
          -webkit-flex-shrink: 0;
          -ms-flex-negative: 0;
          flex-shrink: 0;
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-align: stretch;
          -webkit-align-items: stretch;
          -ms-flex-align: stretch;
          align-items: stretch;

          .p-tabview-nav-link {
            padding: 15px 0;
            border-bottom: 3px solid transparent;
            margin-right: 16px;
            color: var(--text-tab-link-color);
            cursor: pointer;
            background: transparent;

            &:hover {
              border-bottom-color: var(--border-tab-view-color);
              color: var(--color-dark);
            }
          }

          &.p-highlight {
            .p-tabview-nav-link {
              border-bottom-color: var(--border-tab-link-highlight-color);
              color: var(--color-dark);
            }
          }
        }
      }
    }
  }
}

.channel-icon {
  justify-content: space-between;
  display: flex;
}

@media (max-width: 568px) {
  .ui-main-account, .ui-main-account {
    .ui-title-bar-container {
      padding: 0 15px !important;
    }

    .next-tab__container {
      .p-tabview-nav {
        padding: 0 15px !important;
      }
    }
  }
}
</style>
