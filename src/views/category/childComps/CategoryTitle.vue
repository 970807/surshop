<template>
  <div id="category-title">
    <ul>
      <li class="title" :key="index"
      v-for="(item, index) in categoryTitles"
      :class="{active: currentIndex === index}"
      @click="currentIndex = index">{{item}}</li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'CategoryTitle',
    data() {
      return {
        currentIndex: 0
      }
    },
    props: {
      categoryTitles: {
        type: Array,
        default() {
          return []
        }
      }
    },
    watch: {
      currentIndex(value) {
        this.$emit('currentIndexChange', value);
      }
    }
  }
</script>

<style scoped>
  #category-title {
    width: 20vw;
    text-align: center;
  }
  .title {
    color: #333;
    font-size: 14px;
    padding: 8px 0;
  }
  .active {
    color: #e93b3d;
  }
</style>