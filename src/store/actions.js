import { getUserRouters } from "../api/api";
import { formatRouterTree } from '../libs/utils';

export default {
  async setUserRouters ({ commit, state }) {
    const userRouters = await (await getUserRouters(state.uid)).data,
          payload = formatRouterTree(userRouters);

    commit('setUserRouters', payload);
    commit('setAuth', true);
  }
}