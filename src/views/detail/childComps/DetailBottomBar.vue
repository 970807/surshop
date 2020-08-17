<template>
  <div class="bottom-bar" @click="undevelopment">
    <div class="shopIM">
      <i class="icon"></i>
      <span class="txt1">客服</span>
    </div>
    <div class="gotoShop">
      <i class="icon"></i>
      <span class="txt1">店铺</span>
    </div>
    <div class="gotoCart" @click.stop="gotoCartClick">
      <i class="icon"></i>
      <span class="txt1">购物车</span>
    </div>
    <div class="buy">
      <span class="txt2">立即购买</span>
    </div>
    <div class="addToCart" @click.stop="addToCartClick">
      <span class="txt2">加入购物车</span>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'DetailBottomBar',
    methods: {
      addToCartClick() {
        this.$emit('addToCart');
      },
      gotoCartClick() {
        this.$router.push('/shopcart');
      },
      undevelopment() {
        this.$toast.show('功能待开发');
      }
    }
  }
</script>

<style scoped>
  .bottom-bar {
    height: 48px;
    background: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
  }
  .shopIM, .gotoShop, .gotoCart {
    float: left;
    width: 14%;
  }
  .icon {
    display: block;
    margin: 5px auto 0;
    width: 25px;
    height: 25px;
  }
  .shopIM .icon {
    background: url(~assets/img/detail/IM.svg) no-repeat;
    background-size: cover;
  }
  .gotoShop .icon {
    background: url(~assets/img/detail/shop.svg) no-repeat;
    background-size: cover;
  }
  .gotoCart .icon {
    background: url(~assets/img/detail/shopCart.svg) no-repeat;
    background-size: cover;
  }
  .txt1 {
    font-size: 9px;
    color: #262626;
  }
  .addToCart {
    background-image: -webkit-linear-gradient(315deg, #f2140c, #f2270c 70%, #f24d0c);
    background-image: linear-gradient(135deg, #f2140c, #f2270c 70%, #f24d0c);

  }
  .buy {
    background-image: -webkit-linear-gradient(315deg, #ffba0d, #ffc38d 69%, #ffcf8d);
    background-image: linear-gradient(135deg, #ffba0d, #ffc30d 69%, #ffcf0d);
  }
  .buy, .addToCart {
    width: 25%;
    height: 35px;
    margin-top: 6px;
    margin-right: 10px;
    line-height: 35px;
    border-radius: 21px;
    float: right;
  }
  .txt2 {
    color: #fff;
    font-size: 13px;
    font-weight: 700;
  }
</style>