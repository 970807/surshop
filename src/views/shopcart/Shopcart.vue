<template>
  <div id="shopCart">
    <nav-bar class="nav-bar">
      <div slot="center">购物车({{length}})</div>
    </nav-bar>
    <cart-list/>
    <cart-bottom-bar/>
  </div>
</template>

<script>
  import NavBar from 'components/common/navbar/NavBar';
  import CartList from './childComps/CartList';
  import CartBottomBar from './childComps/CartBottomBar';
  import {mapGetters} from 'vuex';
  export default {
    name: 'Shopcart',
    components: {
      NavBar,
      CartList,
      CartBottomBar
    },
    computed: {
      // 两种语法
      // ...mapGetters(['cartLength', 'cartList'])
      ...mapGetters({
        length: 'cartLength'
      })
    }
  }
</script>

<style scoped>
  .nav-bar {
    background-image: linear-gradient(45deg, #ff7f50, #ff6348);
    color: #fff;
    font-weight: 700;
  }
</style>