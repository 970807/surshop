<template>
  <div id="login">
    <nav-bar class="login-nav">
      <div slot="center">登录</div>
    </nav-bar>
    <login-input text-tip="用户名/邮箱/手机号"
    @contentChange="userNameChange"/>
    <login-input text-tip="请输入密码" input-type="password"
    @contentChange="passwordChange"/>
    <a :class="[isInputTruly?'login-btn-active':'login-btn']"
    @click="login">登录</a>
    <a class="onestep" @click="onestepClick">一键登录</a>
  </div>
</template>

<script>
  import NavBar from 'components/common/navbar/NavBar';
  import LoginInput from './LoginInput';
  import {loginVerify} from 'network/login';
  export default {
    name: 'Login',
    components: {
      NavBar,
      LoginInput
    },
    data() {
      return {
        userName: '',
        password: ''
      }
    },
    methods: {
      userNameChange(userName) {
        this.userName = userName;
      },
      passwordChange(password) {
        this.password = password;
      },
      loginSuccess(data) {
        data.isLogin = true;
        this.$store.commit('loginStateChange', data);
        sessionStorage.setItem('userName', data.userName);
        sessionStorage.setItem('avatar', data.avatar);
        sessionStorage.setItem('vipRank', data.vipRank);
        this.$emit('loginSuccess');
      },
      login() {
        if(this.userName === '') {
          this.$toast.show('用户名不能为空');
          return;
        }
        if(this.password === '') {
          this.$toast.show('密码不能为空');
          return;
        }
        loginVerify('login', this.userName, this.password).then(res => {
          if(res.isValid) {
            this.loginSuccess(res);
          }
        });
      },
      onestepClick() {
        loginVerify('onestep').then(res => {
          this.loginSuccess(res);
        });
      }
    },
    computed: {
      isInputTruly() {
        // 用户名和密码输入是否合法
        return !!(this.userName && this.password);
      }
    }
  }
</script>

<style scoped>
  #login {
    padding: 0 5vw;
    width: 100vw;
  }
  .login-nav {
    color: #000;
    margin-bottom: 10px;
    letter-spacing: .8em;
  }
  .back img {
    margin-top: 11px;
  }
  .login-btn,.login-btn-active, .onestep {
    display: block;
    width: 100%;
    height: 40px;
    line-height: 40px;
    border-radius: 20px;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
  }
  .login-btn {
    color: #fff;
    background-image: -webkit-linear-gradient(left,#fab3b3,#ffbcb3 73%,#ffcaba);
    background-image: -o-linear-gradient(left,#fab3b3 0,#ffbcb3 73%,#ffcaba 100%);
    background-image: linear-gradient(90deg,#fab3b3,#ffbcb3 73%,#ffcaba);
  }
  .login-btn-active {
    color: #fff;
    background-image: -webkit-linear-gradient(left,#f10000,#ff2000 73%,#ff4f18);
    background-image: -o-linear-gradient(left,#f10000,#ff2000 73%,#ff4f18);
    background-image: linear-gradient(90deg,#f10000,#ff2000 73%,#ff4f18);
  }
  .onestep {
    color: #f10000;
    border: 1px solid #ff2000;
  }
</style>