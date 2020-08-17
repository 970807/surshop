<template>
  <div id="exhibit">
    <div class="title">
      <img src="~assets/img/home/exhibit.png">
    </div>
    <scroll :scrollX="true" :scrollY="false">
      <exhibit-item v-for="(item, index) in exhibits"
      :key="index"
      :img="item.img"
      :title="item.title"
      :bg="index"
      :link="item.link"/>
    </scroll>
  </div>
</template>

<script>
  import ExhibitItem from './ExhibitItem';
  import Scroll from 'components/common/scroll/Scroll';
  export default {
    name: 'Exhibit',
    components: {
      ExhibitItem,
      Scroll
    },
    props: {
      exhibits: {
        type: Array,
        default() {
          return []
        }
      }
    }
  }
</script>

<style scoped>
  #exhibit {
    width: 100vw;
    white-space: nowrap;
    overflow: hidden;
    margin-bottom: 15px;
  }
  .title>img {
    width: 100%;
  }
</style>