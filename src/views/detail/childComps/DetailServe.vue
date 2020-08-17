<template>
  <div id="detail_serve">
    <ul>
      <li class="detail_serve_item"
      v-for="(item,index) in serveItem" :key="index">
        {{item}}
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name:'DetailServe',
    props: {
      serveItem: {
        type: Array,
        default() {
          return []
        }
      }
    }
  }
</script>

<style scoped>
  #detail_serve {
    padding: 8px 5vw;
    margin: 5px 0 18px 0;
  }
  .detail_serve_item {
    list-style: none;
    color: #8c8c8c;
    font-size: 12px;
    display: inline-block;
    width: 33%;
  }
  .detail_serve_item::before {
    content: '';
    background: url(~assets/img/detail/service_item.svg) no-repeat;
    background-size: 12px auto;
    width: 12px;
    height: 12px;
    display: inline-block;
    transform: translateY(2px);
  }
</style>