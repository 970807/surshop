<template>
  <div id="category-wrap">
    <scroll class="scroll-title">
      <category-title :categoryTitles="categoryTitles"
      @currentIndexChange="currentIndexChange"/>
    </scroll>
    <scroll class="scroll-content" ref="scrollContent">
      <category-content :categoryContents="categoryContents"
      :currentIndex="currentIndex" @imgLoaded="imgLoaded"/>
    </scroll>
  </div>
</template>

<script>
  import CategoryTitle from './childComps/CategoryTitle';
  import CategoryContent from './childComps/CategoryContent';
  import {getCategory} from 'network/category';
  import Scroll from 'components/common/scroll/Scroll';
  export default {
    name: 'Category',
    components: {
      CategoryTitle,
      CategoryContent,
      Scroll
    },
    data() {
      return {
        categoryTitles: [], // 左边的类别栏
        categoryContents: [], // 右边的展示内容
        currentIndex: 0 // 类别对应的索引
      }
    },
    methods: {
      currentIndexChange(index) {
        this.currentIndex = index;
      },
      imgLoaded() {
        this.$refs.scrollContent.refresh();
      }
    },
    watch: {
      currentIndex() {
        // 切换类别滚回顶部
        this.$refs.scrollContent.refresh();
        this.$refs.scrollContent.scrollTo(0, 0, 0);
      }
    },
    mounted() {
      getCategory().then(res => {
        this.categoryTitles = Object.keys(res);
        this.categoryContents = Object.values(res);
      });
    }
  }
</script>

<style scoped>
  .scroll-title {
    position: absolute;
    top: 0;
    bottom: 49px;
    overflow: hidden;
  }
  .scroll-content {
    position: absolute;
    left: 20vw;
    right: 0;
    top: 0;
    bottom: 49px;
    overflow: hidden;
  }
</style>