export default {
    setAuth (state, auth) {
      state.hasAuth = auth;
    },
    setUserRouters (state, userRouters) {
      state.userRouters = userRouters;
    },
    setUid (state,uid){
      state.uid = uid;
    },
    setUserInfo(state, payload){
      state.userInfo = payload;
    }

  }