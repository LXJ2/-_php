import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)


//解决编程式路由往同一地址跳转时会报错的情况
const originalPush = VueRouter.prototype.push;
const originalReplace = VueRouter.prototype.replace;
//push
VueRouter.prototype.push = function push(location, onResolve, onReject) {
  return originalPush.call(this, location).catch(err => err);
};
//replace
VueRouter.prototype.replace = function push(location, onResolve, onReject) {
  return originalReplace.call(this, location).catch(err => err);
};

export const routes = [
  {
    path: '/',
    name: 'Layout',
    component: () => import(/* webpackChunkName: "about" */ '../views/Layout.vue')
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "about" */ '../views/Login.vue')
  },
  {
    path: '/404',
    name: 'nofound',
    component: () => import(/* webpackChunkName: "nofound" */ '../views/404.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})
/* router.beforeEach((to, from, next) => {
  if (to.path !== '/login') {
    if (localStorage.getItem('srms_project_token')) {
      if (to.meta.level > store.state.userInfo.userLevel) {
        next('/404')
        return
      }
      next()
    } else {
      next('/login')
    }
  }
  next()

}) */

export default router
