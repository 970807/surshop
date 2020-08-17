import Vue from 'vue';
import Vuex from 'vuex';

import mutations from './mutations';
import actions from './actions';
import getters from './getters';
// 安装插件
Vue.use(Vuex);

// 创建Store对象
const state = {
  cartList: [],
  loginState: {
    isLogin: false // 是否已登录
  },
  collect: [], // 收藏的商品id
  browseCount: 0 // 浏览过商品的数量
}
const store = new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})

export default store;