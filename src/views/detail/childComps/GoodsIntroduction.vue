<template>
  <div id="goods_introduction">
    <div class="title_bar">商品介绍</div>
    <div class="content">
      <img v-for="(item,index) in goodsIntroInfo" :key="index"
      :src="item" @load="introImgLoad">
    </div>
  </div>
</template>

<script>
  export default {
    name: 'GoodsIntroduction',
    props: {
      goodsIntroInfo: Array
    },
    data() {
      return {
        loadedImgs: []
      }
    },
    methods: {
      introImgLoad() {
        this.loadedImgs.push(true);
        if(this.loadedImgs.length == this.goodsIntroInfo.length) {
          this.$emit('introImgLoaded');
        }
      }
    }
  }
</script>

<style scoped>
  #goods_introduction {
    margin: 10px 0 0 0;
  }
  .title_bar {
    padding: 3px 5vw 9px 5vw;
    color: #262626;
    font-size: 15px;
    font-weight: 700;
  }
  .title_bar::before {
    content: "";
    display: inline-block;
    width: 3px;
    height: 15px;
    transform: translateY(2px);
    margin-right: 2px;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#f5503a),to(#fad1cb));
    background-image: -webkit-linear-gradient(top,#f5503a,#fad1cb);
    background-image: linear-gradient(180deg,#f5503a,#fad1cb);
  }
  .content>img {
    width: 100%;
  }
  .content>img:last-child {
    /* 去除商品介绍最后一张图片底部的间隙 */
    vertical-align: top;
  }
</style>