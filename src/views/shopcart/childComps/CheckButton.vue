<template>
  <div class="check-button">
    <i :class="[isChecked?'select_active':'select']"
    @click="selectClick"></i>
    <div class="text" @click="selectClick">
      <slot></slot>
    </div>
  </div>
  
</template>

<script>
  export default {
    name: 'CheckButton',
    props: {
      isSelected: {
        type: Boolean,
        default: true
      }
    },
    data() {
      return {
        isChecked: this.isSelected
      }
    },
    methods: {
      selectClick() {
        this.isChecked = !this.isChecked;
        this.$emit('checkButtonClick', this.isChecked);
      }
    },
    watch: {
      isSelected(value) {
        this.isChecked = value;
      }
    }
  }
</script>

<style scoped>
  .check-button {
    display: flex;
    align-items: center;
  }
  i {
    display: block;
    width: 18px;
    height: 18px;
  }
  .select {
    background: url(~assets/img/shopcart/select.svg) no-repeat;
    background-size: cover;
  }
  .select_active {
    background: url(~assets/img/shopcart/select_active.svg) no-repeat;
    background-size: cover;
  }
  .text {
    padding-left: 3px;
  }
</style>