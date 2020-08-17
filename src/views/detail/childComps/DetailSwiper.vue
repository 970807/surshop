<template>
  <div>
    <swiper :isMove="false" :key="currentCategory"
    :showIndicator="true" @indexChange="indexChange" :isImgLoad="isImgLoad">
      <div class="indicator" slot="indicator">
          {{imgIndex}}/{{totalImg}}
      </div>
      <swiper-item v-for="imageItem in topImages[currentCategory]"
      :key="imageItem">
        <img :src="imageItem" @load="imgLoad">
      </swiper-item>
    </swiper>
  </div>
</template>

<script>
  import {Swiper, SwiperItem} from 'components/common/swiper';
  export default {
    name: 'DetailSwiper',
    components: {
      Swiper,
      SwiperItem
    },
    props: {
      topImages: {
        type: Array,
        default() {
          return []
        }
      },
      currentCategory: {
        type: Number,
        dafault: 0
      }
    },
    data() {
      return {
        imgIndex: 1,
        isImgLoad: false,
        imagesLoaded: []
      }
    },
    methods: {
      indexChange(index) {
        if(!this.isImgLoad) {
          return;
        }
        if(index == 0) {
          index = this.totalImg;
        }
        if(index > this.totalImg) {
          index = 1;
        }
        this.imgIndex = index;
      },
      imgLoad() {
        this.imagesLoaded.push(true);
        if(this.imagesLoaded.length == 1) {
          this.$emit('swiperImgLoaded');
        }
        if(this.imagesLoaded.length == this.totalImg) {
          this.isImgLoad = true;
        }
      }
    },
    computed: {
      totalImg() {
        if(this.topImages[this.currentCategory]) {
          return this.topImages[this.currentCategory].length;
        }
      }
    },
    watch: {
      currentCategory() {
        this.imgIndex = 1;
      }
    }
  }
</script>

<style scoped>
  .indicator {
    position: absolute;
    width: 50px;
    bottom: 23px;
    right: 0;
    background-color: rgba(0, 0, 0, .2);
    height: 20px;
    line-height: 20px;
    color: #fff;
    border-radius: 10px 0 0 10px;
    font-size: 14px;
    z-index: 999;
  }
</style>