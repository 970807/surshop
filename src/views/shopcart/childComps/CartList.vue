<template>
  <div class="cart-list">
    <scroll class="content" ref="scroll">
      <cart-list-item v-for="item in cartList"
      :key="item.id+item.title" :product="item"/>
    </scroll>
  </div>
</template>

<script>
  import Scroll from 'components/common/scroll/Scroll';
  import CartListItem from './CartListItem';
  import {mapGetters} from 'vuex';
  export default {
    name: 'CartList',
    components: {
      Scroll,
      CartListItem
    },
    computed: {
      ...mapGetters(['cartList'])
    },
    activated() {
      this.$refs.scroll.refresh();
    }
  }
</script>

<style scoped>
  .content {
    position: absolute;
    left: 0;
    right: 0;
    top: 44px;
    bottom: 89px;
    overflow: hidden;
  }
  li {
    word-break: break-all;
  }
</style>