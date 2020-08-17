<template>
  <div id="category-content">
    <div class="category" :key="key"
    v-for="(value, key) in categoryContents[currentIndex]">
      <h4>{{key}}</h4>
      <a class="item" :key="index" :href="item.link"
      v-for="(item, index) in value">
        <img class="itemImg" :src="item.img" @load="imgLoaded">
        <span class="itemTitle">{{item.title}}</span>
      </a>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'CategoryContent',
    props: {
      categoryContents: {
        type: Array,
        default() {
          return []
        }
      },
      currentIndex: {
        type: Number,
        default: 0
      }
    },
    data() {
      return {
        imgCount: 0,
        imgLoadCount: 0
      }
    },
    methods: {
      getImgCount() {
        let data = this.categoryContents[this.currentIndex];
        let count = 0;
        for(let item of Object.values(data)) {
          count += item.length;
        }
        this.imgCount = count;
      },
      imgLoaded() {
        if(++this.imgLoadCount === this.imgCount) {
          this.$emit('imgLoaded');
          this.imgLoadCount = 0;
        }
      }
    },
    watch: {
      categoryContents() {
        this.getImgCount();
      },
      currentIndex() {
        this.getImgCount();
      }
    }
  }
</script>

<style scoped>
  .category>h4 {
    color: #333;
    font-size: 14px;
    font-weight: 700;
    padding: 2px 0;
  }
  .item {
    display: inline-block;
    width: 20%;
    text-align: center;
    margin: 5px 6% 27px;
  }
  .itemImg {
    width: 100%;
    vertical-align: middle;
  }
  .itemTitle {
    color: #333;
    font-size: 12px;
  }
</style>