import Vue from 'vue';
import Vuex from 'vuex';

//import { getUserInfo } from '../api/api'
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    userInfo: {
      userLevel: 12
    },

  },
  mutations: {
    setUserInfo(state, options) {
      state.userInfo = { ...state.userInfo, ...options };
    }
  },
  actions: {
    getProfile(store) {
      return getProfile().then(data => {
        store.commit('setUserInfo', data.data)
        return data
      })
    }
  },
  modules: {
  }
})
