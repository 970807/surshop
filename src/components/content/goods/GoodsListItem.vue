<template>
  <div class="goods-item" @click="goodsClick">
    <img :src="goodsItem.img" :key="goodsItem.id" @load="imageLoad">
    <div class="goods-info">
      <p class="price">{{goodsItem.price}}</p>
      <p>{{goodsItem.title}}</p>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'GoodsListItem',
    props: {
      goodsItem: {
        type: Object,
        default() {
          return {}
        }
      }
    },
    methods: {
      goodsClick() {
        this.$router.push('/detail/' + this.goodsItem.id);
      },
      imageLoad() {
        this.$bus.$emit('itemImageLoad');
      }
    }
  }
</script>

<style scoped>
  .goods-item {
    display: inline-block;
    padding-bottom: 42px;
    position: relative;
    width: 48%;
    margin: 0 1%;
  }
  .goods-item img {
    width: 100%;
    border-radius: 5px;
  }
  .goods-info {
    font-size: 12px;
    position: absolute;
    bottom: 5px;
    left: 0;
    right: 0;
    overflow: hidden;
  }
  .goods-info p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-bottom: 2px;
  }
  .goods-info .price {
    color: var(--color-high-text);
    font-size: 18px;
    transform: translateX(-3px);
  }
</style>