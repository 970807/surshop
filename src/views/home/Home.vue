<template>
  <div id="home">
    <nav-bar class="home-nav"><div slot="center">惊喜购物街</div></nav-bar>
    <tab-control class="tab-control" :titles="['女装', '数码', '零食']"
    @tabClick="tabClick" ref="tabControl1" v-show="isTabFixed"/>
    <scroll class="content" ref="scroll" :probe-type="3"
    @scroll="contentScroll" :pull-up-load="true"
    @pullingUp="loadMore">
      <home-swiper :banners="banners" @swiperImageLoad="swiperImageLoad"/>
      <recommend-view :recommends="recommends"/>
      <exhibit :exhibits="exhibits"/>
      <tab-control :titles="['女装', '数码', '零食']"
      @tabClick="tabClick" ref="tabControl2"/>
      <goods-list :goods="showGoods"/>
    </scroll>
    <back-top @click.native="backClick" v-show="isShowBackTop"/>
  </div>
</template>

<script>
  import HomeSwiper from './childComps/HomeSwiper';
  import RecommendView from './childComps/RecommendView';
  import Exhibit from './childComps/Exhibit';
  import NavBar from 'components/common/navbar/NavBar';
  import TabControl from 'components/content/tabControl/TabControl';
  import GoodsList from 'components/content/goods/GoodsList';
  import Scroll from 'components/common/scroll/Scroll';
  import BackTop from 'components/content/backTop/BackTop';

  import {getHomeMultidata, getHomeGoods} from 'network/home';
  import {debounce} from 'common/utils';

  export default {
    name: 'Home',
    components: {
      HomeSwiper,
      RecommendView,
      Exhibit,
      NavBar,
      TabControl,
      GoodsList,
      Scroll,
      BackTop
    },
    data() {
      return {
        banners: [],
        recommends: [],
        exhibits: [],
        goods: {
          dress: {page: 0, list: [], nextPage: true},
          digit: {page: 0, list: [], nextPage: true},
          food: {page: 0, list: [], nextPage: true},
        },
        currentType: 'dress',
        currentIndex: 0,
        isShowBackTop: false,
        tabOffsetTop: 0,
        isTabFixed: false,
        saveY: [0, 0, 0] // [女装scrollY, 数码scroll, 零食scrollY]
      }
    },
    computed: {
      showGoods() {
        return this.goods[this.currentType].list;
      }
    },
    created() {
      // 请求首页轮播图
      this.getHomeMultidata('banners');

      // 请求每日逛数据
      this.getHomeMultidata('recommends');

      // 请求为你推荐数据
      this.getHomeMultidata('exhibits');

      // 请求女装数据
      this.getHomeGoods('dress');

      // 请求数码数据
      this.getHomeGoods('digit');

      // 请求零食数据
      this.getHomeGoods('food');
    },
    mounted() {
      // 图片加载完成刷新页面（防抖、事件总线）
      const refresh = debounce(this.$refs.scroll.refresh, 300)
      this.$bus.$on('itemImageLoad', () => {
        refresh();
      });
    },
    destroyed() {
      this.$bus.$off('itemImageLoad');
    },
    activated() {
      // 滚动到组件的scrollY位置
      this.$refs.scroll.refresh();
      this.$refs.scroll.scrollTo(0, this.saveY[this.currentIndex], 0);
    },
    deactivated() {
      // 记录组件的scrollY位置
      this.saveY[this.currentIndex] = this.$refs.scroll.getScrollY();
    },
    methods: {
      tabClick(index) {
        // tabControl单击事件
        this.saveY[this.currentIndex] = this.$refs.scroll.getScrollY();
        this.currentIndex = index;
        switch(index) {
          case 0:
            this.currentType = 'dress';
            break;
          case 1:
            this.currentType = 'digit';
            break;
          case 2:
            this.currentType = 'food';
            break;
        }
        this.$refs.tabControl1.currentIndex = index;
        this.$refs.tabControl2.currentIndex = index;
        if(this.tabOffsetTop < -this.saveY[this.currentIndex]) {
          this.$refs.scroll.refresh();
          this.$refs.scroll.scrollTo(0, this.saveY[this.currentIndex], 0);
        } else {
          this.$refs.scroll.refresh();
          this.$refs.scroll.scrollToElement(this.$refs.tabControl2.$el, 0)
        }
        
      },
      backClick() {
        // 回到顶部单击事件
        this.$refs.scroll.refresh();
        this.$refs.scroll.scrollTo(0, 0, 500);
      },
      contentScroll(position) {
        // 判断BackTop是否显示
        this.isShowBackTop = Math.abs(position.y) > 1000;

        // 决定tabControl是否吸顶
        this.isTabFixed = Math.abs(position.y) > this.tabOffsetTop; 
      },
      loadMore() {
        this.getHomeGoods(this.currentType);
        this.$refs.scroll.finishPullUp();
      },
      swiperImageLoad() {
        // 2.获取tabControl的offsetTop
        this.tabOffsetTop = this.$refs.tabControl2.$el.offsetTop;
      },
      
      // 网络请求的方法↓
      getHomeMultidata(type) {
        // 下面的getHomeMultidata是导入的模块方法
        getHomeMultidata(type).then(res => {
          this[type] = res;
        })
      },
      getHomeGoods(type) {
        const page = this.goods[type].page + 1;
        getHomeGoods(type, page).then(res => {
          const arr = res[type].list;
          this.goods[type].list.push(...arr);
          this.goods[type].page++;
          this.goods[type].nextPage = res[type].nextPage;

          this.goods[type].list.forEach(item => {
            // 预加载图片
            let image = new Image();
            image.src = item.img;
          })
        })

      }
    }
  }
</script>

<style scoped>
  #home {
    position: absolute;
    width: 100%;
    height: 100%;
  }
  .home-nav {
    background-image: linear-gradient(45deg, #ff7f50, #ff6348);
    color: #fff;
  }
  .content {
    overflow: hidden;
    position: absolute;
    top: 44px;
    bottom: 49px;
  }
  .tab-control {
    position: relative;
    z-index: 9;
  }
</style>