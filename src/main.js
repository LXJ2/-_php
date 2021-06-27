// jsconfig.json
import '@/util/ele.js';
import Vue from 'vue';
import App from './App.vue';
import { generateRouter } from './libs/utils';
import router from './router';
import store from './store';
import Layout from './views/Layout.vue';
router.beforeEach(async (to, from, next) => {
  if(to.path !== '/login') {
    if ( localStorage.getItem('srms_project_token')) {
      if (!store.state.hasAuth) {
        await store.dispatch('setUserRouters');
        const newRoutes = generateRouter(store.state.userRouters);
        //console.log(newRoutes);
        router.addRoutes([{
          path:'/home',
          component:Layout,
          children:newRoutes
        },{
          path:'*',
          redirect: '/404'
        }])
        //console.log(router);
        next({path: to.path});
        return;
    }
    next(); 
  } else {
    next('/login');
  }
   
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
