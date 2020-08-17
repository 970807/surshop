<template>
  <div id="profileInfo">
    <div class="header clear-fix">
      <i class="avatar" :style="{background: 'url(' + avatar + ') no-repeat', backgroundSize: 'cover'}"></i>
      <span class="username">用户名：{{userName}}</span>
      <i class="vip" :class="[vipClass]">{{vipText}}</i>
      <a class="loginout" @click="loginout">退出登录</a>
    </div>
    <div class="tool" @click="toolClick">
      <div class="row">
        <tool-item text="待付款"
        :img="require('assets/img/profile/waitPay.svg')"/>
        <tool-item text="待收货"
        :img="require('assets/img/profile/waitReceipt.svg')"/>
        <tool-item text="退换/售后"
        :img="require('assets/img/profile/consult.svg')"/>
        <tool-item text="全部订单"
        :img="require('assets/img/profile/order.svg')"/>
      </div>
      <div class="row">
        <tool-item text="优惠劵"
        :img="require('assets/img/profile/coupon.svg')"/>
        <tool-item text="红包"
        :img="require('assets/img/profile/redPaper.svg')"/>
        <tool-item text="收货地址"
        :img="require('assets/img/profile/address.svg')"/>
        <tool-item text="我的评价"
        :img="require('assets/img/profile/comment.svg')"/>
        <tool-item text="我的资产"
        :img="require('assets/img/profile/assets.svg')"/>
      </div>
      <div class="row">
        <tool-item text="商品收藏" :tip="collectCount"/>
        <tool-item text="店铺收藏" tip="0"/>
        <tool-item text="我的足迹" :tip="getBrowseCount"/>
      </div>
      <div class="row">
        <tool-item text="我的预约"
        :img="require('assets/img/profile/appointment.svg')"/>
        <tool-item text="高价回收"
        :img="require('assets/img/profile/recycle.svg')"/>
        <tool-item text="火车票"
        :img="require('assets/img/profile/trainTicket.svg')"/>
        <tool-item text="应用推荐"
        :img="require('assets/img/profile/appRecommend.svg')"/>
      </div>
      <div class="row">
        <tool-item text="飞机票"
        :img="require('assets/img/profile/airplaneTicket.svg')"/>
        <tool-item text="酒店"
        :img="require('assets/img/profile/hotel.svg')"/>
        <tool-item text="闲置换钱"
        :img="require('assets/img/profile/earn.svg')"/>
        <tool-item text="多多爱消除"
        :img="require('assets/img/profile/eliminate.svg')"/>
      </div>
    </div>
  </div>
</template>

<script>
  import ToolItem from './ToolItem';
  import {mapGetters} from 'vuex';
  export default {
    name: 'profileInfo',
    components: {
      ToolItem
    },
    data() {
      return {
        userName: '',
        avatar: '', // 用户头像
        vipRank: 0,
        vipText: '注册'
      }
    },
    methods: {
      loginout() {
        sessionStorage.clear();
        this.$emit('loginout');
      },
      toolClick() {
        this.$toast.show('功能待开发')
      }
    },
    computed: {
      ...mapGetters(['loginState', 'collectCount', 'getBrowseCount']),
      vipClass() {
        let res;
        switch(this.vipRank) {
          case 1:
          default:
            res = 'v0';
            break;
          case 1:
            res = 'v1';
            break;
          case 2:
            res = 'v2';
            break;
          case 3:
            res = 'v3';
            break;
          case 4:
            res = 'v4';
            break;
        }
        return res;
      }
    },
    created() {
      this.userName = this.loginState.userName;
      this.avatar = this.loginState.avatar;
      this.vipRank = parseInt(this.loginState.vipRank);
      switch(this.vipRank) {
        case 0:
        default:
          this.vipText = '注册';
          break;
        case 1:
          this.vipText = '铜牌';
          break;
        case 2:
          this.vipText = '银牌';
          break;
        case 3:
          this.vipText = '金牌';
          break;
        case 4:
          this.vipText = '钻石';
          break;
      }
    }
  }
</script>

<style scoped>
  #profileInfo {
    position: relative;
    width: 100vw;
  }
  .header {
    background: linear-gradient(90deg,#eb3c3c,#ff7459);
  }
  .avatar {
    display: block;
    width: 60px;
    height: 60px;
    float: left;
    margin: 20px;
  }
  .username {
    float: left;
    margin: 20px 10px;
    color: #fff;
    font-size: 14px;
    display: block;
    max-width: 160px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .vip {
    display: block;
    width: 20px;
    height: 20px;
    line-height: 20px;
    float: left;
    margin-top: 20px;
    padding-left: 20px;
    font-size: 10px;
    color: #fff;
    white-space: nowrap;
  }
  .v0 {
    background: url(~assets/img/profile/icon_vip.png) no-repeat 0 -1px;
    background-size: cover;
  }
  .v1 {
    background: url(~assets/img/profile/icon_vip.png) no-repeat -20px -1px;
    background-size: cover;
  }
  .v2 {
    background: url(~assets/img/profile/icon_vip.png) no-repeat -40px -1px;
    background-size: cover;
  }
  .v3 {
    background: url(~assets/img/profile/icon_vip.png) no-repeat -60px -1px;
    background-size: cover;
  }
  .v4 {
    background: url(~assets/img/profile/icon_vip.png) no-repeat -80px -1px;
    background-size: cover;
  }
  .loginout {
    font-size: 14px;
    color: #fff;
    position: absolute;
    left: 110px;
    top: 60px;
    background-image: linear-gradient(90deg, #eccc68, #ffa502);
    display: inline-block;
    height: 22px;
    line-height: 22px;
    padding: 0 10px;
    border-radius: 11px;
  }
  .tool {
    padding: 30px 20px 0;
  }
  .row {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
  }
</style>