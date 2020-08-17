<template>
  <div id="choose_data">
    <div class="title">
      <slot name="title"></slot>
    </div>
    <div class="content">
      <slot name="content1"></slot>
      <slot name="content2"></slot>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'ChooseInfoItem',
    props: {
      content2Color: {
        type: String,
        default: '#ccc'
      }
    }
  }
</script>

<style scoped>
  #choose_data {
    font-size: 13px;
    padding: 10px 5vw;
    padding-bottom: 10px;
    position: relative;
  }
  .title {
    display: inline-block;
    color: #262626;
    font-weight: 700;
    position: absolute;
    top: 10px;
    margin-right: 30px;
  }
  .content {
    display: inline-block;
    margin-left: 53px;
  }
  .content>p:first-child {
    margin-bottom: 5px;
    color: #333;
  }
  .content>p:nth-child(2) {
    font-size: 12px;
  }
</style>