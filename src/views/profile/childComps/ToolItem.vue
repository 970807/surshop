<template>
  <div id="tool-item">
    <i class="icon"
    :style="iconStyle">{{tip}}</i>
    <span class="text">{{text}}</span>
  </div>
</template>

<script>
  export default {
    name: 'ToolItem',
    props: {
      img: {
        type: String,
        default: ''
      },
      text: {
        type: String,
        default: ''
      },
      tip: {
        type: String,
        default: ''
      }
    },
    computed: {
      iconStyle() {
        return {
          background: 'url('+ this.img +')',
          backgroundSize: 'cover'
        };
      }
    }
  }
</script>

<style scoped>
  #tool-item {
    display: inline-block;
    width: 52px;
    text-align: center;
  }
  .icon {
    display: block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    margin: 0 auto;
    color: #333;
    font-size: 16px;
    text-align: center;
    
  }
  .text {
    color: #666;
    font-size: 12px;
    white-space: nowrap;
  }
</style>