<template>
  <div id="head_info">
    <div id="price">
      <span class="new_price">
        ¥<em>{{headInfo.newPrice | intPrice}}</em>
        <span>.{{headInfo.newPrice | decPrice}}</span>
      </span>
      <span class="old_price">{{headInfo.oldPrice}}</span>
      <div class="favour" @click="favClick">
        <i :style="{backgroundImage: 'url('+favImg+')'}"></i>
        <span class="{fav_active: isFav}">{{isFav?'已收藏':'收藏'}}</span>
      </div>
    </div>
    <h2 class="title">{{headInfo.title[currentCategory]}}</h2>
  </div>
</template>

<script>
  import fav from 'assets/img/detail/favour_active.svg';
  import unfav from 'assets/img/detail/favour.svg';
  export default {
    name: 'DetailHeadInfo',
    data() {
      return {
        isFav: false,
        favImg: unfav
      }
    },
    props: {
      headInfo: {
        type: Object,
        default() {
          return {}
        }
      },
      currentCategory: {
        type: Number,
        default: 0
      }
    },
    methods: {
      favClick() {
        if(this.isFav) {
          // 取消收藏
          this.favImg = unfav;
          this.isFav = false;
          this.$store.commit('uncollectProduction', this.headInfo.id);
          this.$toast.show('取消收藏成功');
        } else {
          this.favImg = fav;
          this.isFav = true;
          this.$store.commit('collectProduction', this.headInfo.id);
          this.$toast.show('收藏成功');
        }
      }
    },
    filters: {
      // 价格小数点前的数字
      intPrice(price) {
        if(price) {
          return price.split('.')[0];
        }
      },
      // 价格小数点后的数字
      decPrice(price) {
        if(price) {
          return price.split('.')[1];
        }
      }
    },
    watch: {
      'headInfo.id'(value) {
        // 判断之前是否已收藏
        this.isFav = this.$store.state.collect.includes(value);
        if(this.isFav) {
          this.favImg = fav;
        } else {
          this.favImg = unfav;
        }
      }
    }
  }
</script>

<style scoped>
  #head_info{
    padding: 5px 5vw 0 5vw;
  }
  .title {
    font-size: 16px;
    font-weight: 700;
    color: #262626;
    margin: 15px 0 23px 0;
  }
  #price {
    position: relative;
  }
  .new_price {
    color: #f2270c;
    font-size: 16px;
    display: inline-block;
  }
  .new_price em {
    font-style: normal;
    font-size: 30px;
  }
  .old_price {
    font-size: 12px;
    text-decoration: line-through;
    color: #b5b5b5;
    margin-left: 1em;
  }
  .favour {
    position: absolute;
    top: 0;
    right: 5px;
    font-size: 12px;
    cursor: pointer;
    text-align: center;
    padding: 0 8px 0 8px;
  }
  .favour i {
    display: block;
    width: 24px;
    height: 24px;
    background-repeat: no-repeat;
    background-size: cover;
    margin: auto;
  }
  .favour span {
    display: inline-block;
    width: 3em;
  }
  .fav_active {
    color: #d81e06;
  }
</style>