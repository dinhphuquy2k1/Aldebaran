<template>
  <div>
    <p class="order-history--title text-uppercase">{{ title }}</p>
    <div class="activity-log">
      <div class="timeline-emojipicker border-top-0 p-0">
        <div class="emoji-container">
          <div class="img-rounded svg-next-icon-size-40">
            <div class="icon-avatar-blue">
            </div>
          </div>
          <div class="emoji-action">
            <div class="emoji-input">
              <div>
                <IconField iconPosition="right" class="next-icon-field--stylized h-40 d-flex flex-1">
                  <InputText :placeholder="$t('search')"
                             class="flex-1"/>
                  <InputIcon class="pi pi-search"></InputIcon>
                </IconField>
              </div>
            </div>
            <div class="emoji-action__button">
              <Button class="ms-btn ms-btn-primary ml-15" disabled>
                <div class="svg-next-icon-size-16">
                  <div class="icon-send"></div>
                </div>
              </Button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="timeline-date-event timline-date-event--margin mt-0">
          <div class="timeline-date-time text-uppercase timeline-tilte">
            <span>20/08/2025</span>
          </div>
          <div class="timeline-event-content active">
            <div class="timeline-item">
              <div class="timeline-body">
                <div class="timeline__message-container">
                  <div class="timeline__inner-message">
                    <span>Hệ thống đã chuyển cho cửa hàng</span>
                    <span>Địa điểm mặc định</span>
                  </div>
                </div>
                <time class="timeline__time">
                  <span>09:06 SA</span>
                </time>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import InputText from "primevue/inputtext";
import Button from "primevue/button";

export default {
  components: {
    InputText,
    Button,
  },
  props: {
    title: {
      type: String,
      require: true,
    },
    list: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      note: "",
    };
  },
  methods: {
    onAddNote() {
      if (this.note.trim()) {
        this.$emit("add", this.note);
        this.note = "";
      }
    },
  },
}
</script>

<style lang="scss">
time[class=timeline__time] {
  span {
    color: gray;
  }
}
</style>
