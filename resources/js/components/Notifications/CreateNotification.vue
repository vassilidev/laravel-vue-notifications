<template>
  <button v-on:click.prevent="createNotification" class="btn btn-success">
    Create a notification
  </button>
</template>

<script>
export default {
  methods: {
    createNotification() {
      axios.post('/notifications/store')
    },
  },
}
</script>