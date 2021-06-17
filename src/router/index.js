import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Layout from '../views/Layout.vue'
Vue.use(VueRouter)
export var obj = {
  我的稿件: [
    {
      path: '/swiper',
      name: 'swiper',
      meta: {
        groupName: "我的稿件",
        title: '我要投稿',
        level: 9
      },
      component: () => import('../components/layout/swiper.vue')
    },
    {
      path: '/swiper2',
      name: 'swiper2',
      meta: {
        groupName: "我的稿件",
        title: '稿件通知',
        level: 3
      },
      component: () => import('../components/layout/dashbord.vue')
    }
  ]
}

export const routes = [
  {
    path: '/',
    name: 'Laout',
    component: Layout,
    redirect: '/dashbord',
    children: [
      {
        path: '/introduce',
        name: 'introduce',
        meta: {
          groupName: "个人信息",
          title: "我的信息",
          level: 0
        },
        component: () => import('../components/layout/introduce.vue')
      },
      {
        path: '/dashbord',
        name: 'dashbord',
        meta: {
          groupName: "个人信息",
          title: "完善信息",
          level: 2
        },
        component: () => import('../components/layout/dashbord.vue')
      },
      {
        path: '/add',
        name: 'add',
        meta: {
          groupName: "个人信息",
          title: "修改密码",
          level: 2
        },
        component: () => import('../components/layout/add.vue')
      },
      ...obj.我的稿件
    ]
  },
  {
    path: '/login',
    name: 'Login',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
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
router.beforeEach((to, from, next) => {
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

})
export default router
