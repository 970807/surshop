<template>
  <scroll class="scroll">
    <component :is="comName" @loginSuccess="loginSuccess"
    @loginout="loginout"/>
  </scroll>
</template>

<script>
  import Login from './childComps/Login';
  import ProfileInfo from './childComps/ProfileInfo';
  import Scroll from 'components/common/scroll/Scroll';
  export default {
    name: 'Profile',
    components: {
      Login,
      ProfileInfo,
      Scroll
    },
    data() {
      return {
        comName: 'Login'
      }
    },
    methods: {
      loginSuccess() {
        this.comName = 'ProfileInfo';
      },
      loginout() {
        this.comName = 'Login';
      }
    },
    created() {
      const userName = sessionStorage.getItem('userName');
      if(userName) {
        // 用户已登录
        const avatar = sessionStorage.getItem('avatar');
        const vipRank = sessionStorage.getItem('vipRank');
        this.$store.commit('loginStateChange', {
          isLogin: true,
          userName,
          avatar,
          vipRank
        });
        this.comName = 'ProfileInfo';
      }
    }
  }
</script>

<style scoped>
  .scroll {
    position: absolute;
    top: 0;
    bottom: 49px;
    left: 0;
    right: 0;
  }
</style>