<template>
  <div id="comment_item">
    <div id="user_info"
    v-for="item in showComments(comments).length" :key="item">
      <i class="profile_photo" :style="{backgroundImage: 'url('+comments[item-1].profilePhoto+')'}"></i>
      <span class="user_name">{{comments[item-1].userName}}</span>
      <i class="star" v-for="i in comments[item-1].star" :key="i"></i>
      <span class="cmt_date">{{comments[item-1].cmtDate}}</span>
      <div id="cmt_cnt">
        {{comments[item-1].cmtCnt}}
      </div>
    </div>
    
  </div>
</template>

<script>
  export default {
    name: 'CommentItem',
    props: {
      comments: Array
    },
    methods: {
      showComments(comments) {
        if(comments.length > 2) {
          let newArr = [comments[0], comments[1]];
          return newArr;
        } else {
          return comments;
        }
      }
    }
  }
</script>

<style scoped>
  #comment_item {
    position: relative;
    margin-top: 10px;
  }
  .profile_photo {
    display: inline-block;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    vertical-align: middle;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .user_name {
    margin: 0 5px 0 12px;
    color: #262626;
    overflow: hidden;
    font-size: 12px;
  }
  .star {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin-right: 1px;
    background: url(~assets/img/detail/star.png);
    background-repeat: no-repeat;
    background-size: cover;
  }
  .cmt_date {
    color: #999;
    font-size: 12px;
    position: absolute;
    right: 0;
  }
  #cmt_cnt {
    font-size: 13px;
    color: #262626;
    line-height: 20px;
    margin: 6px 0 7px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
</style>