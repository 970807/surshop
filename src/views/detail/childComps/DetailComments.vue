<template>
  <div id="detail_comments">
    <div id="top_bar">
      <span class="cmt_title">评价</span>
      <span class="cmt_count">{{commentInfo.cmtCount}}</span>
      <span class="without_comments"
      v-if="commentInfo.comments.length == 0">暂无评价，欢迎您购买之后留下宝贵的评价</span>
      <span class="evalRate" v-else>
        好评度
        <strong>{{commentInfo.evalRate}}</strong>
        <i class="right_arrow"></i>
      </span>
    </div>
    <comment-item :comments="commentInfo.comments"/>
  </div>
</template>

<script>
  import CommentItem from './CommentItem';
  export default {
    name: 'DetailComments',
    components: {
      CommentItem
    },
    props: {
      commentInfo: Object
    }
  }
</script>

<style scoped>
  #detail_comments {
    color: #262626;
    padding: 0 5vw;
    margin: 14px 0;
    position: relative;
    
  }
  #top_bar {
    height: 30px;
    line-height: 30px;
  }
  .cmt_title {
    font-size: 15px;
    font-weight: 700;
  }
  .cmt_title::before {
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
  .cmt_count {
    font-size: 12px;
    margin-left: 5px;
    font-weight: 700;
  }
  .without_comments {
    color: #8c8c8c;
    font-size: 12px;
    margin-left: 15px;
    height: 17px;
    line-height: 17px;
  }
  .evalRate {
    color: #8c8c8c;
    font-size: 12px;
    position: absolute;
    vertical-align: middle;
    right: 5vw;
  }
  .right_arrow {
    display: inline-block;
    width: 13px;
    height: 13px;
    background: url(~assets/img/detail/right_arrow.svg) no-repeat;
    background-size: cover;
    transform: translateY(2px);
  }
</style>