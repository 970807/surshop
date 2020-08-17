<template>
  <div id="choose_info">
    <choose-info-item>
      <h4 slot="title">已选</h4>
      <p slot="content1" class="selected">{{choosedInfo.choosedStyle[currentCategory]}}</p>
      <p slot="content2" style="color: #8c8c8c;">本商品支持保障服务</p>
    </choose-info-item>
    <choose-info-item>
      <h4 slot="title">送至</h4>
      <p slot="content1">{{choosedInfo.addr}}</p>
      <p slot="content2" style="color: #f2270c;">{{choosedInfo.goodsInfo}}</p>
    </choose-info-item>
    <choose-info-item v-if="choosedInfo.postage">
      <h4 slot="title">运费</h4>
      <p slot="content1">{{choosedInfo.postage}}</p>
    </choose-info-item>
    <choose-info-item v-if="choosedInfo.weight">
      <h4 slot="title">重量</h4>
      <p slot="content1">{{choosedInfo.weight}}</p>
    </choose-info-item>
  </div>
</template>

<script>
  import ChooseInfoItem from './ChooseInfoItem';
  export default {
    name: 'ChooseInfo',
    components: {
      ChooseInfoItem
    },
    props: {
      choosedInfo: Object,
      currentCategory: Number
    }
  }
</script>

<style scoped>
  .selected {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 74vw;
  }
</style>