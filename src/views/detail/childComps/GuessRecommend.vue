<template>
  <div id="guess_recommend">
    <div class="title_bar">猜你喜欢</div>
    <div class="recommend_item clear-fix" @click="imgClick">
      <div class="item_image" v-for="item in getRecommendInfo.length"
      :key="item" :data-id="getRecommendInfo[item-1].id"
      :style="{backgroundImage:'url('+getRecommendInfo[item-1].img+')'}">
        <div class="price" :data-id="getRecommendInfo[item-1].id"
        >{{getRecommendInfo[item-1].price}}</div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'GuessRecommend',
    props: {
      getRecommendInfo: {
        type: Array,
        default() {
          return []
        }
      }
    },
    methods: {
      imgClick(event) {
        const id = event.target.dataset.id;
        this.$router.push('/detail/' + id);
      }
    },
    created() {
      // 判断推荐图片是否加载完毕
      let count = 0;
      for(let i=0; i<9; i++) {
        let img = new Image();
        img.src = this.getRecommendInfo[i].img;
        img.addEventListener('load', () => {
          if(++count == this.getRecommendInfo.length) {
            this.$emit('guessImgLoaded');
          }
        }, false);
      }
    }
  }
</script>

<style scoped>
  #guess_recommend {
    padding: 0 5vw;
    margin-bottom: 5px;
  }
  .title_bar {
    color: #262626;
    font-size: 15px;
    font-weight: 700;
    margin: 5px 0 7px 0;
  }
  .title_bar::before {
    content: "";
    display: inline-block;
    width: 3px;
    height: 15px;
    transform: translateY(2px);
    margin-right: 2px;
    background-image: -webkit-gradient(linear,left top,left bottom,from(#f5503a),to(#fad1cb));
    background-image: -webkit-linear-gradient(top,#f5503a,#fad1cb);
    background-image: linear-gradient(180deg,#f5503a,#fad1cb);
  }
  .recommend_item {
    padding: 0 2vw;
  }
  .item_image {
    position: relative;
    float: left;
    width: 27vw;
    height: 27vw;
    border-radius: 6px;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 4px 0.7vw;
  }
  .price {
    color: #eee;
    font-size: 12px;
    font-weight: 700;
    background-color: rgba(0, 0, 0, .5);
    display: inline-block;
    position: absolute;
    bottom: 0;
    right: 0;
    padding: 2px;
    border-radius: 2px 0 6px 0;
  }
</style>