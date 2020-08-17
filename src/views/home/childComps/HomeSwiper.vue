<template>
  <swiper :isImgLoad="isLoad">
      <swiper-item v-for="(item, index) in banners"
      :key="index">
        <a :href="item.link">
          <img :src="item.img" @load="imageLoad">
        </a>
      </swiper-item>
    </swiper>
</template>

<script>
  import {Swiper, SwiperItem} from 'components/common/swiper';
  export default {
    name: 'HomeSwiper',
    props: {
      banners: {
        type: Array,
        default() {
          return []
        }
      }
    },
    data() {
      return {
        isLoad: false,
        imagesLoad: []
      }
    },
    components: {
      Swiper,
      SwiperItem
    },
    methods: {
      // 记录首页轮播图是否加载完成
      imageLoad() {
        this.imagesLoad.push(true);
        if(this.imagesLoad.length == 1) {
          this.$emit('swiperImageLoad');
        }
        if(this.imagesLoad.length == this.banners.length) {    
          this.isLoad = true;
        }
      }
    }
  }
</script>