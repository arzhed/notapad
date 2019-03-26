import Vue from 'vue'
import App from './vuejs/App'

require('../sass/app.scss');

new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
