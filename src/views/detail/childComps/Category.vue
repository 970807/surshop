<template>
  <div class="category">
    <i class="category_item" v-for="(item,index) in topImages.length"
    :key="item" :style="{backgroundImage: 'url('+topImages[index][0]+')'}"
    :class="{active: index === currentCategory}"
    @click="categoryChange(index)"></i>
  </div>
</template>

<script>
  export default {
    name: 'Category',
    props: {
      topImages: {
        type: Array,
        default() {
          return []
        }
      },
      currentCategory: {
        type: Number,
        default: 0
      }
    },
    methods: {
      categoryChange(index) {
        this.$emit('imgClick', index);
      }
    }
  }
</script>

<style scoped>
  .category {
    text-align: center;
  }
  .category_item {
    display: inline-block;
    width: 10vw;
    height: 10vw;
    border-radius: 2px;
    margin: 9px 9px 0;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .active {
    border: 1px solid #e93b3d;
  }
</style>