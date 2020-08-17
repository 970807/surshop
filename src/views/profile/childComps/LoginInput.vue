<template>
  <div id="login-input">
    <input :type="textType" :placeholder="textTip"
    v-model="content" @input="inputChange">
    <a :class="[isShowPassword?'show':'hide']" v-if="inputType === 'password'"
    @click="showPasswordClick"></a>
    <a class="clear" v-show="content"
    :style="{right: inputType === 'password'?'20px':'2px'}"
    @click.prevent="clearClick"></a>
  </div>
</template>

<script>
  export default {
    name: 'LoginInput',
    props: {
      textTip: {
        type: String,
        default: ''
      },
      inputType: {
        type: String,
        default: 'text'
      }
    },
    data() {
      return {
        content: '',
        isShowPassword: false
      }
    },
    methods: {
      clearClick() {
        this.content = '';
        this.$emit('contentChange', this.content);
      },
      showPasswordClick() {
        this.isShowPassword = !this.isShowPassword;
      },
      inputChange() {
        this.$emit('contentChange', this.content);
      }
    },
    computed: {
      textType() {
        let res = 'text';
        switch(this.inputType) {
          case 'text':
            res = 'text';
            break;
          case 'password':
            if(this.isShowPassword) {
              res = 'text';
            } else {
              res = 'password';
            }
            break;
        }
        return res;
      }
    }
  }
</script>

<style scoped>
  #login-input {
    text-align: center;
    width: 250px;
    height: 28px;
    margin: 0 auto 12px;
    position: relative;
  }
  input {
    width: 100%;
    height: 100%;
    padding-right: 5.1em;
    font-size: 16px;
    border: 0;
    outline: none;
  }
  .clear, .show, .hide {
    position: absolute;
    width: 16px;
    height: 16px;
    top: 50%;
    transform: translateY(-50%);
  }
  .clear {
    background: url(~assets/img/profile/clear.svg) no-repeat;
    background-size: cover;
  }
  .show {  
    right: 2px; 
    background: url(~assets/img/profile/show.svg);
    background-size: cover;
  }
  .hide {
    right: 2px; 
    background: url(~assets/img/profile/hide.svg);
    background-size: cover;
  }
</style>