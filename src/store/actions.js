export default {
  addCart(context, payload) {
    // 添加到购物车
    return new Promise((resolve, reject) => {
      let oldProduct = context.state.cartList.find(value => value.id === payload.id && value.category === payload.category);
      if(oldProduct) { // 购物车已有对应商品，数量+1
        context.commit('addCounter', oldProduct);
        resolve();
      } else { // 添加新的商品
        context.commit('addToCart', payload);
        resolve();
      }
    })
  }
}