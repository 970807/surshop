<template>
  <div id="app">
    <keep-alive exclude="Detail">
      <router-view :key="$route.fullPath"/>
    </keep-alive>
    <MainTabBar/>
  </div>
</template>

<script>
  import MainTabBar from 'components/content/mainTabBar/MainTabBar'
  export default {
    name: 'App',
    components: {
      MainTabBar
    }
  }
</script>

<style>
  @import "assets/css/base.css";
</style>
