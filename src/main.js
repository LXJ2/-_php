// jsconfig.json

import '@/util/ele.js'
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

/* Vue.directive('pression', {
  inserted(el, { value }) {
    if (store.state.userInfo.userLevel < value) {
      el.parentNode.removeChild(el)
    }
  }
}) */



Vue.config.productionTip = false


new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
