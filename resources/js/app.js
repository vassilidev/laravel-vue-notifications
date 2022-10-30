import './bootstrap';

import {createApp} from 'vue'

import Notification from './components/Notification.vue'
import NotificationDropdown from "./components/NotificationDropdown.vue";

const app = createApp({});

app.component('notification', Notification);
app.component('notificationDropdown', NotificationDropdown);

app.mount('#app');