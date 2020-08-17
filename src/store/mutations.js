export default {
  addCounter(state, payload) {
    payload.count++;
  },
  changeCountById(state, payload) {
    // 改变购物车对应id的数量
    const product = state.cartList.find(item => item.id === payload.id && item.category === payload.category)
    product.count = payload.count;
  },
  checkChange(state, payload) {
    // 购物车中商品选中状态被改变
    for(let item of state.cartList) {
      if(item.id === payload.id && item.category === payload.category) {
        item.checked = payload.checked;
        return;
      }
    }
  },
  addToCart(state, payload) {
    payload.count = 1;
    payload.checked = true;
    state.cartList.push(payload);
  },
  delProduction(state, payload) {
    // 根据商品id删除购物车对应的商品
    const productIndex = state.cartList.findIndex(item => item.id === payload.id && item.category === payload.category)
    state.cartList.splice(productIndex, 1);
  },
  selectAll(state) {
    // 购物车商品全部选中
    state.cartList.forEach(item => item.checked = true)
  },
  unselectAll(state) {
    // 购物车商品全部不选中
    state.cartList.forEach(item => item.checked = false)
  },
  loginStateChange(state, payload) {
    // 修改登录状态
    state.loginState.isLogin = payload.isLogin;
    state.loginState.userName = payload.userName;
    state.loginState.avatar = payload.avatar;
    state.loginState.vipRank = payload.vipRank;
  },
  collectProduction(state, payload) {
    // 收藏商品  payload：要收藏的id
    if(!state.collect.includes(payload)) {
      state.collect.push(payload);
    }
   
  },
  uncollectProduction(state, payload) {
    // 取消收藏
    let index = state.collect.findIndex(item => item === payload);
    if(index !== -1) {
      state.collect.splice(index, 1);
    }    
  },
  addBrowseCount(state) {
    state.browseCount++;
  }
}