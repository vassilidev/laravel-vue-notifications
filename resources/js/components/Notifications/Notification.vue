<template>
  <div class="dropdown-item dropdown-notifications-item">
    <div class="dropdown-notifications-item-icon bg-warning">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
           stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-activity">
        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
      </svg>
    </div>
    <div class="dropdown-notifications-item-content">
      <div class="dropdown-notifications-item-content-details">
        {{ diffForHumans(notification.created_at) }}
      </div>
      <div class="dropdown-notifications-item-content-text">
        {{ notification.message }}
      </div>
      <div class="dropdown-notifications-item-content-details">
        <button v-if="notification.read_at === null" v-on:click.prevent="this.$parent.markAsRead(notification.id)"
                class="btn mx-2 btn-xs btn-primary btn-icon">
          <i class="fas fa-eye"></i>
        </button>
        <button v-on:click.prevent="this.$parent.deleteNotification(notification.id)"
                class="btn mx-2 btn-xs btn-danger btn-icon">
          <i class="fas fa-sm fa-trash"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ['notification'],
  methods: {
    diffForHumans(date) {
      return moment(date).locale('fr').fromNow(true);
    }
  },
}
</script>