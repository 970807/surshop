<template>
  <a id="recommend-item" :href="link">
    <p class="heading" :style="headingColorStyle">{{heading}}</p>
    <p class="statement">{{statement}}</p>
    <div class="image" :style="imgStyle"></div>
  </a>
</template>

<script>
  export default {
    name: 'RecommendItem',
    props: {
      heading: {
        type: String,
        default: ''
      },
      headingColor: {
        type: String,
        default: ''
      },
      statement: {
        type: String,
        default: ''
      },
      img: {
        type: String,
        default: ''
      },
      link: {
        type: String,
        default: ''
      }
    },
    data() {
      return {
        imgStyle: {
          background: 'url(' + this.img + ') no-repeat',
          backgroundSize: 'cover'
        },
        headingColorStyle: {
          backgroundImage: 'linear-gradient(90deg,' + this.headingColor + ')'
        }
      }
    }
  }
</script>

<style scoped>
  #recommend-item {
    display: inline-block;
    width: 25%;
    padding: 5px 0 5px 15px;
  }
  .heading {
    font-size: 16px;
    color: transparent;
    background-clip: text;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  .statement {
    color: #222;
    font-size: 12px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  .image {
    width: 60px;
    height: 60px;
    margin-top: 5px;
  }
</style>