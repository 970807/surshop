<template>
  <a id="exhibit-item" :href="link">
    <img class="bg" :src="bgSrc">
    <img :src="img">
    <p class="title">{{title}}</p>
  </a>
</template>

<script>
  export default {
    name: 'ExhibitItem',
    props: {
      img: {
        type: String,
        default: ''
      },
      title: {
        type: String,
        default: ''
      },
      bg: {
        type: Number,
        default: 0
      },
      link: {
        type: String,
        default: ''
      }
    },
    data() {
      return {
        bgSrc: this.bg % 2 ? require('assets/img/home/bg2.webp') : require('assets/img/home/bg1.webp')
      }
    }
  }
</script>

<style scoped>
  #exhibit-item {
    width: 22vw;
    height: 23.5vw;
    position: relative;
    border-radius: 18px 18px 12px 12px;
    overflow: hidden;
    display: inline-block;
    margin: 0 5px;
  }
  #exhibit-item>img {
    width: 100%;
  }
  .bg {
    position: absolute;
  }
  .title {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    font-size: 13px;
    white-space: nowrap;
  }
</style>