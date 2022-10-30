<template>
  <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
       href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
       <span>
            <i class="fas fa-bell"></i> <sup class="fw-bolder">{{ notifications.length }}</sup>
       </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
      <h6 class="dropdown-header dropdown-notifications-header">
        <i class="fas fa-bell me-2"></i>
        Alerts Center
      </h6>
      <notification v-if="notifications.length" v-for="notification in notifications" :notification="notification"/>
      <div v-else class="dropdown-header">No notification</div>
    </div>
  </li>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      notifications: [],
    }
  },
  mounted() {
    document.querySelector('.dropdown-notifications')
        .addEventListener('click', e => e.stopPropagation())

    axios
        .get('/notifications')
        .then(response => (this.notifications = response.data.data));

    Echo
        .private(`App.Models.User.${User}`)
        .notification(notification => {
          toast(notification);
          this.notifications.push(notification);
        });
  },
  methods: {
    deleteNotification(notificationID) {
      axios.delete('/notifications/delete/' + notificationID);

      let index = this.notifications.findIndex(notification => notification.id === notificationID);

      this.notifications.splice(index, 1);
    },
    markAsRead(notificationID) {
      let index = this.notifications.findIndex(notification => notification.id === notificationID);

      axios.put('/notifications/markAsRead/' + notificationID)
          .then(readAt => this.notifications[index].read_at = readAt);
    }
  },
}
</script>