<template>
  <div class="dropdown-item dropdown-notifications-item">
    <div class="dropdown-notifications-item-content">
      <div class="dropdown-notifications-item-content-details">
        {{ diffForHumans(notification.created_at) }}
      </div>
      <div class="dropdown-notifications-item-content-text">
        {{ notification.message }}
      </div>
      <div class="dropdown-notifications-item-content-details">
        <button v-if="notification.read_at === null || !notification.read_at" v-on:click.prevent="markAsRead(notification.id)"
                class="btn btn-sm btn-primary">
          Mark as read
        </button>
        <button class="btn btn-xs btn-danger btn-icon" v-on:click.prevent="delete(notification.id)">
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
    diffForHumans: date => {
      moment.locale('fr');

      return moment(date).fromNow();
    },
    markAsRead: (notificationID) => {
      alert(notification.id)
    },
    delete: (notificationID) => {
      console.log(notificationID)
    }
  },
}
</script>