<template>
  <div>
    <nav-bar>
      <div slot="left" class="back" @click="backClick">
        <img src="~assets/img/common/back.svg">
      </div>
      <div slot="center" class="title">
        <div class="title-item"
        v-for="(item,index) in navBarTitles" :key="index"
        :class="{active: index === currentIndex}"
        @click="titleClick(index)">{{item}}</div>
      </div>
    </nav-bar>
  </div>
</template>

<script>
  import NavBar from 'components/common/navbar/NavBar.vue'
  export default {
    name: 'DetailNavBar',
    props: {
      navBarIndex: {
        type: Number,
        default: 0
      },
      isLoaded: Boolean
    },
    data() {
      return {
        navBarTitles: ['商品', '评价', '详情', '推荐'],
        currentIndex: this.navBarIndex
      }
    },
    watch: {
      navBarIndex(value) {
        this.currentIndex = value;
      }
    },
    methods: {
      titleClick(index) {
        if(this.isLoaded) {
          this.currentIndex = index;
          this.$emit('navBarClick', index);
        }
      },
      backClick() {
        this.$router.push('/home');
      }
    },
    components: {
      NavBar
    }
  }
</script>

<style scoped>
  .title {
    display: flex;
    font-size: 13px;
  }
  .title-item {
    flex: 1;
  }
  .active {
    color: var(--color-high-text);
  }
  .back img {
    margin-top: 11px;
  }
</style>