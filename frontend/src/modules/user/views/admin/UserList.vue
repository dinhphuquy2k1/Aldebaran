<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="general-block">
            <div class="row mgy-6">
              <div class="col-12 col-lg-4">
                <p class="text-headxl mgb-1">{{ $t('shop_owner') }}</p>
                <p class="text-body-m content-neutral">{{ $t('shop_owner_description') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div class="d-flex align-items-center gap-4">
                        <div></div>
                        <div>
                          <div class="d-flex align-items-center mgb-0">
                            <div class="text-content_accent">
                              <span class="word-break">Phú Quý</span>
                            </div>
                          </div>
                          <div class="no-wrap mb-0 text-body-s d-flex align-items-center">
                            <div class="svg-next-icon-size-16 mr-5">
                              <div class="icon-email"></div>
                            </div>
                            <span>dinhphuquy2001@gmail.com</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="setting-line"></div>
            <div class="row mgy-6">
              <div class="col-12 col-lg-4">
                <div>
                  <p class="text-headxl mgb-4">{{ $t('staff_list') }}</p>
                  <div class="d-flex align-items-center gap-2 mgb-2">
                    <div class="svg-next-icon-size-20">
                      <div class="icon-staff"></div>
                    </div>
                    <p class="text-body-m fw-medium mgb-0">{{
                        $t('staff_created_count', {
                          count: 0,
                          max_count: 10
                        })
                      }}</p>
                  </div>
                  <div class="d-flex align-items-center gap-4 mgb-4">
                    <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                      <div class="svg-next-icon-size-16 d-none d-sm-inline-block">
                        <div class="icon-add-circle"></div>
                      </div>
                      <div class="p-button-label ml-3">{{ $t('add_staff') }}</div>
                    </Button>
                  </div>
                  <p class="text-body-m content-neutral mgb-2" v-if="employees.length > 0">{{
                      $t('logout_staff_notice')
                    }}</p>
                  <Button class="ms-btn btn-mono--secondary ms-btn-size-m" v-if="employees.length > 0">
                    <div class="p-button-label ml-3">{{ $t('terminate_sessions') }}</div>
                  </Button>
                </div>
              </div>
              <div class="col-12 col-lg-8">
                <div class="row mgb-4">
                  <div class="col-6"></div>
                  <div class="col-12 col-sm-6"></div>
                </div>
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section" v-if="employees.length === 0">
                      <div class="text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="svg-next-icon-size-100 mb-10">
                          <div class="icon-empty"></div>
                        </div>
                        <p class="mb-0 text-center text-secondary">{{ $t('no_staff_created') }}</p>
                      </div>
                    </div>

                    <div class="position-relative" v-else>
                      <div class="overflow-x-auto overflow-y-hidden">
                        <DataTable :value="employees" class="ms-table">
                          <Column field="code">
                            <template #header>
                              <div class="d-inline-flex align-items-center">
                                <span class="d-inline-flex align-items-center">
                                  <span>{{ $t('staff') }}</span>
                                </span>
                              </div>
                            </template>
                            <template #body="slotProps">
                              <div class="d-flex align-items-center gap-4">
                                <div>
                                  <span class="ms-avatar ms-avatar-circle" style="background:rgb(41,121,255)">
                                    <span class="ms-avatar-string">34</span>
                                  </span>
                                </div>
                                <div>
                                  <div class="d-flex align-items-center mgb-0">
                                    <div class="text-content_accent">
                                      <span class="word-break">34</span>
                                    </div>
                                    <div class="ms-badges ms-badges--status-warning-string ml-5">
                                      <div class="ms-badges-body">{{ $t('invitation_sent') }}</div>
                                    </div>
                                  </div>
                                  <div class="no-wrap mb-0 text-body-s d-flex align-items-center">
                                    <div class="svg-next-icon-size-16 mr-5">
                                      <div class="icon-email"></div>
                                    </div>
                                    <span>343@gmail.com</span>
                                  </div>
                                </div>
                              </div>
                            </template>
                          </Column>
                          <Column field="name" class="min-width-100px">
                            <template #header>
                              <div class="d-inline-flex align-items-center">
                                <span class="d-inline-flex align-items-center">
                                  <span>{{ $t('access_rights') }}</span>
                                </span>
                              </div>
                            </template>
                            <template #body="slotProps">
                              <span>{{ $t('no_permissions') }}</span>
                            </template>
                          </Column>
                          <Column>
                            <template #body="slotProps">
                              <div class="w-100 d-flex justify-content-end">
                                <div class="svg-next-icon-size-20 btn-destructive--plain pointer">
                                  <div class="icon-delete"></div>
                                </div>
                              </div>
                            </template>
                          </Column>
                        </DataTable>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="setting-line"></div>
            <div class="row mgt-6">
              <div class="col-12 col-lg-4">
                <p class="text-headxl mgb-1">{{ $t('change_owner_account') }}</p>
                <p class="text-body-m content-neutral mgb-4">{{ $t('change_owner_description') }}</p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="hrv-card">
                  <div class="hrv-card-body">
                    <div class="hrv-card-section">
                      <div class="d-flex align-items-center flex-wrap gap-4 justify-content-between">
                        <Dropdown
                            optionLabel="label"
                            :placeholder="$t('select_email_as_owner')"
                            class="ms-selection w-0 min-width-250px"
                            style="margin-bottom: 5px"
                        />
                        <Button class="ms-btn btn-accent--primary ms-btn-size-m">
                          <div class="p-button-label ml-3">{{ $t('select_as_owner') }}</div>
                        </Button>
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

  <Dialog v-model:visible="visibleCreateEmployee" modal
          :draggable="false" class="modal_container modal-dialog ms-modal-size-md omni-modal modal-lg ms-modal">
    <template #header>
      <div class="pdr-10">
        <div class="text-bodyl font-weight-600 d-flex align-items-center">{{ $t('add_new_member') }}</div>
      </div>
    </template>
    <div class="modal-body">
      <div class="pd-4">
        <div class="form-group mb-0">
          <div class="row">
            <div class="col-sm-6 col-12">
              <label class="control-label mb-5">{{ $t('short_full_name') }}</label>
              <InputText class="ms-input" :placeholder="$t('short_full_name')"></InputText>
            </div>
            <div class="col-sm-6 col-12">
              <label class="control-label mb-5">Email</label>
              <InputText class="ms-input" :placeholder="$t('enter_email_address')"></InputText>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template #footer>
      <div class="d-flex justify-content-end gap-2">
        <Button class="ms-btn btn-mono--secondary ms-btn-size-m">
          <div class="p-button-label ml-3">{{ $t('cancel') }}</div>
        </Button>
        <Button class="ms-btn btn-accent--primary ms-btn-size-m">
          <div class="p-button-label ml-3">{{ $t('save') }}</div>
        </Button>
      </div>
    </template>
  </Dialog>
</template>

<script>
import Button from 'primevue/button';
import Dropdown from "primevue/dropdown";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';

export default {
  components: {
    Button,
    Dropdown,
    DataTable,
    Column,
    Dialog,
    InputText,
  },
  data() {
    return {
      visibleCreateEmployee: false,
      employees: [
        {
          id: '1000',
          code: 'f230fh0g3',
          name: 'Bamboo Watch',
          description: 'Product Description',
          image: 'bamboo-watch.jpg',
          price: 65,
          category: 'Accessories',
          quantity: 24,
          inventoryStatus: 'INSTOCK',
          rating: 5
        },
        {
          id: '1001',
          code: 'nvklal433',
          name: 'Black Watch',
          description: 'Product Description',
          image: 'black-watch.jpg',
          price: 72,
          category: 'Accessories',
          quantity: 61,
          inventoryStatus: 'INSTOCK',
          rating: 4
        },
      ]
    }
  },
}
</script>

<style lang="scss">

</style>
