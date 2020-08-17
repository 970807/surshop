<template>
  <div class="bottom-bar">
    <check-button :is-selected="isSelectAll"
    @click.native="checkClick">全选</check-button>
    <div class="total" @click="totalClick">
      <span :title="totalPrice">合计：{{totalPrice}}</span>
    </div>
    <div class="buy" @click="buyClick">
      去结算({{checkCount}})
    </div>
  </div>
</template>

<script>
  import CheckButton from './CheckButton';
  import {mapGetters} from 'vuex'
  export default {
    name: 'CartBottomBar',
    components: {
      CheckButton
    },
    computed: {
      ...mapGetters(['cartList']),
      totalPrice() {
        return '¥' + this.cartList
        .filter(item => item.checked)
        .reduce((preValue, item) => item.price * item.count + preValue, 0)
        .toFixed(2)
      },
      checkCount() {
        return this.cartList
        .filter(item => item.checked)
        .reduce((preValue, item) => parseInt(item.count) + preValue, 0)
      },
      isSelectAll() {
        return this.cartList.every(item => item.checked)
      }
    },
    methods: {
      checkClick() { // 全选按钮被单击
        if(this.isSelectAll) {
          this.$store.commit('unselectAll');
        } else {
          this.$store.commit('selectAll');
        }
      },
      totalClick() {
        this.$toast.show(this.totalPrice);
      },
      buyClick() {
          this.$toast.show('功能待开发');
      }
    }
  }
</script>

<style scoped>
  .bottom-bar {
    height: 40px;
    line-height: 40px;
    background-color: rgb(230, 230, 235);
    position: absolute;
    bottom: 49px;
    left: 0;
    right: 0;
    color: #262626;
    display: flex;
    align-items: center;
    justify-content: space-around;
    font-size: 14px;
  }
  .total span{
    color: #000;
    display: inline-block;
    vertical-align: top;
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .buy {
    background-color: #f2270c;
    height: 30px;
    line-height: 30px;
    padding: 0 10px;
    text-align: center;
    border-radius: 20px;
    color: #fff;
    font-weight: 700;
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>