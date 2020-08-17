<template>
  <div class="recommend">
    <div class="title">
      <img src="~assets/img/home/recommend.png">
    </div>
    <recommend-item :key="item"
    v-for="(item, index) in recommends.length"
    :heading="recommends[index].heading"
    :statement="recommends[index].statement"
    :img="recommends[index].img"
    :link="recommends[index].link"
    :headingColor="recommends[index].headingColor"/>
  </div>
</template>

<script>
  import RecommendItem from './RecommendItem';
  export default {
    name: 'RecommendView',
    components: {
      RecommendItem
    },
    props: {
      recommends: {
        type: Array,
        default() {
          return []
        }
      }
    }
  }
</script>

<style scoped>
  .recommend {
    width: 100%;
    margin: 15px 0;
    border-bottom: 10px solid #eee;
  }
  .title>img {
    width: 100%;
  }
</style>