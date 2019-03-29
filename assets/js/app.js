import Vue from 'vue'
import App from './vuejs/App'
import axios from 'axios'

Vue.prototype.axios = axios

require('../sass/app.scss');

new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
