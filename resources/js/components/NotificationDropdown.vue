<template>
  <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
       href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
       <span>
            <i class="fas fa-bell"></i>
       </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
      <h6 class="dropdown-header dropdown-notifications-header">
        <i class="fas fa-bell me-2"></i>
        Alerts Center
      </h6>
      <notification v-for="notification in notifications" :notification="notification"/>
    </div>
  </li>
</template>

<script>
import axios from "axios";

export default {
  props: ['user_id'],

  data() {
    return {
      notifications: null,
    }
  },
  async mounted() {
    await this.$nextTick();

    axios
        .get('/notifications')
        .then(response => (this.notifications = response.data.data));

    Echo
        .private(`App.Models.User.${this.user_id}`)
        .notification(notification => {
          this.notifications.push(notification);
        });
  }
}
</script>