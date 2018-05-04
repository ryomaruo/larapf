<template>
  <div class="o-grid__item hover-target hideOnLoad" :style="styleObject">
    <button class="c-hamburger c-hamburger--htla">
      <span>toggle menu</span>
    </button>
  </div>
</template>

<script>
var eventHub = require("../app.js").eventHub;
export default {
  data: function() {
    return {
      styleObject: {
        display: 'none'
      }
    }
  },
  created: function () {
    eventHub.$on('displayMenuContent', this.displayMenuBtn);
  },
  methods: {
    displayMenuBtn: function() {
      console.log('emitted')
      this.styleObject = {
        display: 'block'
      }
    }
  }
}
</script>
<style scoped lang="scss">
.o-grid__item {
  position: fixed;
  top: 50%;
  left: 40px;
  margin-top: -50px;
  z-index: 100;
}
.c-hamburger {
  display: block;
  position: relative;
  margin: 0;
  padding: 0;
  width: 65px;
  height: 96px;
  font-size: 0;
  text-indent: -9999px;
  cursor: pointer;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  box-shadow: none;
  border-radius: none;
  border: none;

  span {
    display: block;
    position: absolute;
    top: 44px;
    left: 5px;
    right: 18px;
    height: 1px;

    &::before,
    &::after {
      content: "";
      display: block;
      position: absolute;
      left: 0;
      height: 1px;
      background-color: #fff;
    }
    &::before {
      top: -9px;
      width: 100%;
    }
    &::after {
      bottom: -9px;
      width: 50%;
    }
    background: #fff;
  }
}
.c-hamburger--htla {
  background: 0 0;
}
</style>
