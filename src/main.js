import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import FastClick from 'fastclick';
import toast from 'components/common/toast';

Vue.config.productionTip = false;

// 添加事件总线
Vue.prototype.$bus = new Vue();

// 安装toast插件
Vue.use(toast);

// 解决300ms延迟
FastClick.attach(document.body);

new Vue({
  render: h => h(App),
  router,
  store
}).$mount('#app')

// 路由发生变化修改页面的title
router.beforeEach((to, from, next) => {
  if(to.meta.title) {
    document.title = to.meta.title;
  }
  next();
})
