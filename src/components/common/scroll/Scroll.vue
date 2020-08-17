<template>
  <div ref="wrapper">
    <div class="content">
      <slot></slot>
    </div>
  </div>
</template>

<script>
  import BScroll from "better-scroll";
  export default {
    name: 'Scroll',
    data() {
      return {
        scroll: null,
        isAutoScrolling: false // 是否正在自动滚动
      }
    },
    props: {
      probeType: {
        type: Number,
        default: 0
      },
      pullUpLoad: {
        type: Boolean,
        default: false
      },
      scrollX: {
        type: Boolean,
        default: false
      },
      scrollY: {
        type: Boolean,
        default: true
      }
    },
    mounted() {
      // 创建BScroll对象
      this.scroll = new BScroll(this.$refs.wrapper, {
        click: true,
        probeType: this.probeType,
        pullUpLoad: this.pullUpLoad,
        scrollX: this.scrollX,
        scrollY: this.scrollY
      })

      // 监听滚动的位置
      if(this.probeType === 2 || this.probeType === 3) {
        this.scroll.on('scroll', position => {
          this.$emit('scroll', position);
        })
      }
      

      // 监听上拉事件(上拉加载更多)
      if(this.pullUpLoad) {
        this.scroll.on('pullingUp', () => {
          this.$emit('pullingUp');
        })
      }
      
      this.scroll.on('scrollEnd', () => {
        if(this.isAutoScrolling) {
          this.isAutoScrolling = false; // 自动滚动结束
        }
      });
    },
    methods: {
      scrollTo(x, y, time=300) {
        // this.scroll.scrollTo(x, y); // 滚到到某一位置
        // 还可以传第三个参数：滚动时间（毫秒）.
        this.isAutoScrolling = true; // 正在自动滚动
        this.scroll && this.scroll.scrollTo(x, y, time);
      },
      scrollToElement(el, time=300) {
        this.isAutoScrolling = true; // 正在自动滚动
        this.scroll && this.scroll.scrollToElement(el, time, false, false);
      }
      ,
      finishPullUp() {
        this.scroll && this.scroll.finishPullUp();
      },
      refresh() {
        this.scroll && this.scroll.refresh();
      },
      getScrollY() {
        return this.scroll ? this.scroll.y : 0;
      }
    },
    watch: {
      isAutoScrolling(value) {
        this.$emit('autoScroll', {isScrollEnd: !value});
      }
    }
  }
</script>

<style scoped>
  .content {
    display: inline-block;
    vertical-align: middle;
  }
</style>