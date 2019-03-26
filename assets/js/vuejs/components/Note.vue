<template>
  <div class="note">
    <h1>{{ msg }}</h1>
  </div>
</template>

<script>
export default {
  name: 'note',
  mounted: function() {
    console.log('yoyoy')
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>
