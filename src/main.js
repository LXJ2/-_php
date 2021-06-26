// jsconfig.json
import { generateRouter } from '@/libs/utils';
import '@/util/ele.js';
import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import Layout from './views/Layout.vue';

/* Vue.directive('pression', {
  inserted(el, { value }) {
    if (store.state.userInfo.userLevel < value) {
      el.parentNode.removeChild(el)
    }
  }
}) */
router.beforeEach(async (to, from, next) => {
  if (!store.state.hasAuth) {
    await store.dispatch('setUserRouters');
    const newRoutes = generateRouter(store.state.userRouters);
    router.addRoutes([{
      path:'/home',
      component:Layout,
      children:newRoutes
    }])
    console.log(router);
    next({path: to.path});
  } else {
    next()
  }
})


Vue.config.productionTip = false


new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
