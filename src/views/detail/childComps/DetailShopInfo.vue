<template>
  <div id="shop_info">
    <div class="top_bar">
      <i class="shop_logo" :style="{backgroundImage: 'url('+shopInfo.shopLogo+')'}"></i>
      <span class="shop_name">{{shopInfo.shopName}}</span>
    </div>
    <div class="content">
      <div class="fans">
        <p>{{shopInfo.fans}}</p>
        <p>粉丝人数</p>
      </div>
      <div class="goods_count">
        <p>{{shopInfo.allGoods}}</p>
        <p>全部商品</p>
      </div>
      <div class="estimate" v-if="shopInfo.evaluation">
        <p>
          评价
          <span>{{shopInfo.evaluation.score}}</span>
          <span>|</span>
          <span>{{shopInfo.evaluation.level}}</span>
        </p>
        <p>
          物流
          <span>{{shopInfo.express.score}}</span>
          <span>|</span>
          <span>{{shopInfo.express.level}}</span>
        </p>
        <p>
          售后
          <span>{{shopInfo.afterService.score}}</span>
          <span>|</span>
          <span>{{shopInfo.afterService.level}}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'DetailShopInfo',
    props: {
      shopInfo: Object
    }
  }
</script>

<style scoped>
  #shop_info {
    padding: 0 5vw;
    margin-bottom: 12px;
  }
  .top_bar {
    text-align: left;
  }
  .shop_logo {
    display: inline-block;
    width: 40px;
    height: 40px;
    background-repeat: no-repeat;
    background-size: cover;
    vertical-align: middle;
  }
  .shop_name {
    font-size: 13px;
    color: #333;
    margin-left: 6px;
  }
  .content {
    font-size: 11px;
    display: flex;
  }
  .content>div {
    flex: 1;
    text-align: center;
  }
  .content p {
    padding: 5px;
  }
  .fans p:first-child, .goods_count p:first-child {
    font-size: 14px;
    color: #333;
    margin: 3px 0 3px 0;
  }
  .estimate span {
    color: #e4393c;
    padding-left: 5px;
  }
</style>