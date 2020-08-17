<template>
  <div id="detail">
    <detail-nav-bar class="detail-nav" @navBarClick="navBarClick"
    :navBarIndex="navBarIndex"
    :isLoaded="this.requestSuccess&&this.isSwiperImgLoaded"/>
    <scroll class="content" ref="scroll" :probeType="3"
    @scroll="scroll" @autoScroll="autoScroll">
      <detail-swiper ref="detailSwiper" :top-images="topImages"
      :current-category="currentCategory"
      @swiperImgLoaded="swiperImgLoaded"/>
      <category :top-images="topImages"
      :current-category="currentCategory"
      @imgClick="categoryChange"
      v-if="topImages.length>1"/>
      <detail-head-info :head-info="headInfo"
      :current-category="currentCategory"/>
      <ChooseInfo :choosedInfo="choosedInfo"
      :current-category="currentCategory"/>
      <detail-serve :serve-item="services"/>
      <detail-comments ref="detailComments"
      :comment-info="commentInfo"/>
      <detail-shop-info :shop-info="shopInfo"/>
      <guess-recommend ref="guessRecommend" v-if="getRecommendInfo[0]"
      :getRecommendInfo="getRecommendInfo"
      @guessImgLoaded="guessImgLoaded"/>
      <goods-introduction ref="goodsIntroduction"
      :goodsIntroInfo="goodsIntroInfo"
      @introImgLoaded="introImgLoaded"/>
    </scroll>
    <detail-bottom-bar @addToCart="addToCart"/>
  </div>
</template>

<script>
  import DetailNavBar from './childComps/DetailNavBar';
  import DetailSwiper from './childComps/DetailSwiper';
  import Category from './childComps/Category';
  import DetailHeadInfo from './childComps/DetailHeadInfo';
  import ChooseInfo from './childComps/ChooseInfo';
  import DetailServe from './childComps/DetailServe';
  import DetailComments from './childComps/DetailComments';
  import DetailShopInfo from './childComps/DetailShopInfo';
  import GuessRecommend from './childComps/GuessRecommend';
  import GoodsIntroduction from './childComps/GoodsIntroduction';
  import DetailBottomBar from './childComps/DetailBottomBar';
  import Scroll from 'components/common/scroll/Scroll';
  import {getDetail, getDetailHeadInfo} from 'network/detail';

  import Toast from 'components/common/toast/Toast';
  export default {
    name: 'Detail',
    data() {
      return {
        // 商品信息  
        navBarIndex: 0,
        goodsId: null, // 商品id
        topImages: [], // 轮播图的图片
        currentCategory: 0, // 商品的类别
        headInfo: {
          title: []
        },
        choosedInfo: {
          choosedStyle: []
        },
        services: [],
        commentInfo: {
          comments: []
        },
        shopInfo: {},
        getRecommendInfo: [],
        goodsIntroInfo: [],
        // 加载状态
        requestSuccess: false,
        isSwiperImgLoaded: false,
        isGuessImgLoaded: false,
        isAutoScrolling: false // 是否正在自动滚动
      }
    },
    methods: {
      navBarClick(index) {
        if(!this.requestSuccess || !this.isSwiperImgLoaded || !this.isGuessImgLoaded) {
          return;
        }
        let el;
        switch(index) {
          case 0:
          default:
            el = this.$refs.detailSwiper.$el; // 商品
            break;
          case 1:
            el = this.$refs.detailComments.$el; // 评论
            break;
          case 2:
            el = this.$refs.goodsIntroduction.$el; // 详情
            break;
          case 3:
            el = this.$refs.guessRecommend.$el; // 推荐
        }
        // 跳转到相应版块
        this.$refs.scroll.scrollToElement(el);
        this.navBarIndex = index;
      },
      categoryChange(index) {
        this.currentCategory = index;
      },
      swiperImgLoaded() {
        this.isSwiperImgLoaded = true;
        this.$refs.scroll.refresh();
      },
      introImgLoaded() {
        this.$refs.scroll.refresh();
      },
      guessImgLoaded() {
        this.isGuessImgLoaded = true;
        this.$refs.scroll.refresh();
      },
      scroll(position) {
        if(this.isAutoScrolling) {
          return;
        }
        position = Math.abs(position.y);
        // 获取offsetTop信息
        const detailSwiperOffsetTop = this.$refs.detailSwiper.$el.offsetTop;
        const detailCommentsOffsetTop = this.$refs.detailComments.$el.offsetTop;
        const guessRecommendOffsetTop = this.$refs.guessRecommend.$el.offsetTop;
        const goodsIntroductionOffsetTop = this.$refs.goodsIntroduction.$el.offsetTop;
        if(position < detailCommentsOffsetTop) {
          this.navBarIndex = 0;
        } else if(position < guessRecommendOffsetTop) {
          // 评论区域
          this.navBarIndex = 1;
        } else if(position < goodsIntroductionOffsetTop) {
          // 推荐区域
          this.navBarIndex = 3;
        } else {
          // 商品详情区域
          this.navBarIndex = 2;
        }
      },
      autoScroll(obj) {
        this.isAutoScrolling = !obj.isScrollEnd;
      },
      addToCart() {
        // 加入购物车
        const product = {
          id: this.goodsId,
          category: this.currentCategory,
          image: this.topImages[this.currentCategory][0],
          title: this.headInfo.title[this.currentCategory],
          price: this.headInfo.newPrice
        };
        this.$store.dispatch('addCart', product).then(() => {
          this.$toast.show('加入购物车成功');
        });
      }
    },
    components: {
      DetailNavBar,
      DetailSwiper,
      Category,
      DetailHeadInfo,
      ChooseInfo,
      DetailServe,
      DetailComments,
      DetailShopInfo,
      GuessRecommend,
      GoodsIntroduction,
      DetailBottomBar,
      Scroll,
      Toast
    },
    created() {
      // 1. 保存存入的id
      this.goodsId = this.$route.params.id;

      // 2.根据id请求详情数据
      getDetail(this.goodsId).then(res => {
        this.topImages = res.topImages;
        this.currentCategory = res.currentCategory;
        this.headInfo = new getDetailHeadInfo(this.goodsId, res.title, res.price.newPrice, res.price.oldPrice, false);
        this.choosedInfo = res.choosedInfo;
        this.services = res.choosedInfo.services;
        this.commentInfo = res.commentInfo;
        this.shopInfo = res.shopInfo;
        this.getRecommendInfo = res.guessRecommend;
        this.goodsIntroInfo = res.goodsIntroduction;
        this.requestSuccess = true;
        this.$refs.scroll && this.$refs.scroll.refresh();
      })

      this.$store.commit('addBrowseCount');
    }
  }
</script>

<style scoped>
  #detail {
    position: absolute;                                                                                                                                                                                                                         ;
    z-index: 999;
    width: 100%;
    height: 100%;
    background-color: #fff;
  }
  .detail-nav {
    position: relative;
    z-index: 9;
    background-color: #fff;
  }
  .content {
    position: absolute;
    top: 44px;
    bottom: 48px;
    overflow: hidden;
  }
</style>