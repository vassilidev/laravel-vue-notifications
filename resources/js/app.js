import './bootstrap';

import {createApp} from 'vue'

import Notification from './components/Notifications/Notification.vue'
import NotificationDropdown from "./components/Notifications/NotificationDropdown.vue";
import CreateNotification from "./components/Notifications/CreateNotification.vue";

const app = createApp({});

app.component('notification', Notification);
app.component('notificationDropdown', NotificationDropdown);
app.component('createNotification', CreateNotification);

app.mount('#app');