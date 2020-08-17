export default {
  cartLength(state) {
    return state.cartList.length;
  },
  cartList(state) {
    return state.cartList;
  },
  loginState(state) {
    return state.loginState;
  },
  collectCount(state) {
    return state.collect.length.toString();
  },
  getBrowseCount(state) {
    return state.browseCount.toString();
  }
}