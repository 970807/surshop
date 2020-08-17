<template>
  <div class="goods">
    <goods-list-item v-for="item in goods" :goods-item="item" :key="item.id"/>
  </div>
</template>

<script>
  import GoodsListItem from './GoodsListItem';
  export default {
    name: 'GoodsList',
    components: {
      GoodsListItem
    },
    data() {
      return {
        list: this.goods
      }
    },
    props: {
      goods: {
        type: Array,
        default() {
          return []
        }
      }
    }
  }
</script>