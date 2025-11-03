<template>
  <section class="layout-container layout-wrapper-block">
    <div class="layout-container-sub layout-wrapper-block_sub">
      <div class="padding-container">
        <div class="padding-container">
          <div class="d-flex align-items-center justify-content-between gap-4">
            <p class="text-headxl mgb-0">{{ $t('role_list') }}</p>
            <Button class="ms-btn btn-accent--primary ms-btn-size-m">
              <div class="svg-next-icon-size-16 d-none d-sm-inline-block">
                <div class="icon-add-circle"></div>
              </div>
              <div class="p-button-label ml-3">{{ $t('create_role') }}</div>
            </Button>
          </div>
          <div class="hrv-card mgt-6">
            <div class="hrv-card-body">
              <div class="hrv-card-section">

              </div>
              <div class="position-relative">
                <div class="overflow-x-auto overflow-y-hidden">
                  <DataTable :value="permissions" class="ms-table" v-model:selectionKeys="selectedKey">
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
    </div>
  </section>
</template>

<script>
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

export default {
  components: {
    Button,
    DataTable,
    Column,
  },
  data() {
    return {
      selectedKey: null,
      permissions: [
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
      ],
    }
  },
  methods: {},
}
</script>

<style lang="scss">

</style>
