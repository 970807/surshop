<template>
  <div class="cart-list-item clear-fix">
    <check-button class="check-button" :isSelected="product.checked"
    @checkButtonClick="checkButtonClick"/>
    <div class="image" :style="{backgroundImage: 'url('+product.image+')'}"></div>
    <div class="info">
      <p class="title">{{product.title}}</p>
      <div class="price_line clear-fix">
        <p class="price">¥
          <em class="int">{{product.price | intPrice}}</em>
          .{{product.price | decPrice}}
        </p>
        <div class="counter">
          <span class="minus" @click="minus"
          :style="{visibility: count>=2?'visible':'hidden'}"></span>
          <input type="text" class="num" v-model="count">
          <span class="plus" @click="plus"></span>
          <div class="delItem">
            <span @click="delProduct">删除</span>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script>
  import CheckButton from './CheckButton';
  export default {
    name: 'CartListItem',
    data() {
      return {
        count: this.product.count
      }
    },
    components: {
      CheckButton
    },
    props: {
      product: {
        type: Object,
        default() {
          return {}
        }
      }
    },
    methods: {
      minus() {
        if(this.count > 1) {
          this.count--;
        }
      },
      plus() {
        this.count++;
      },
      delProduct() {
        this.$store.commit('delProduction', this.product);
      },
      checkButtonClick(isChecked) {
        // 商品选择状态被改变
        this.$store.commit('checkChange', {...this.product, checked: isChecked});
      }
    },
    filters: {
      intPrice(price) {
        if(price) {
          return price.split('.')[0];
        }
      },
      decPrice(price) {
        if(price) {
          return price.split('.')[1];
        }
      }
    },
    watch: {
      'product.count'(value) {
        this.count = value;
      },
      count(value) {
        // 商品数量改变时更改对应vuex的值
        this.$store.commit('changeCountById', {id: this.product.id,category: this.product.category, count: this.count});
      }
    }
  }
</script>

<style scoped>
  .cart-list-item {
    width: 100%;
    padding: 6px 9px;
    position: relative;
    display: flex;
    border-bottom: 1px solid #ccc;
  }
  .image {
    width: 20vw;
    height: 20vw;
    margin-right: 11px;
    background-size: cover;
    border-radius: 3px;
  }
  .info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .title {
    color: #262626;
    word-break: break-all;
    font-size: 12px;
    margin-top: 2px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
  .price {
    color: #f2270c;
    font-size: 10px;
    float: left;
  }
  .int {
    font-size: 14px;
  }
  .check-button {
    margin-right: 3px;
  }
  .counter {
    float: right;
    display: flex;
  }
  .minus, .plus {
    display: block;
    width: 16px;
    height: 16px;
    margin: 0 1px;
    float: left;
  }
  .minus {
    background: url(~assets/img/shopcart/minus.png) no-repeat;
    background-size: cover;
  }
  .num {
    color: #262626;
    width: 12px;
    padding-left: 1px;
    font-size: 10px;
    outline: none;
    border: none;
    float: left;
  }
  .plus {
    background: url(~assets/img/shopcart/plus.png) no-repeat;
    background-size: cover;
  }
  .delItem {
    font-size: 12px;
    margin-left: 15px;
    margin-top: 2px;
  }
  .delItem span {
    padding: 0 5px;
    color: #262626;
  }
</style>