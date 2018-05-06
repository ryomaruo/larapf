<template>
  <div class="o-grid__item hover-target hideOnLoad" :style="styleObject">
    <button class="c-hamburger c-hamburger--htla" v-on:click="onClicked">
      <span :class="{ 'active': is_active }" :style="menuBtnStyle">toggle menu</span>
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
      },
      menuBtnStyle: {
        '--linetop': '-9px',
        '--linebottom': '-9px',
      },
      is_active: false,
    }
  },
  created: function () {
    eventHub.$on('enableMenuContent', this.displayMenuBtn);
  },
  methods: {
    displayMenuBtn: function() {
      this.styleObject = {
        display: 'block'
      }
    },
    onClicked :function() {
      if (this.is_active) {
        this.Arrow2Hamburger();
        eventHub.$emit('closeMenu');
      } else {
        this.hamburger2Arrow();
        eventHub.$emit('showMenu');
      }
    },
    hamburger2Arrow :function() {
      this.is_active = true;
    },
    Arrow2Hamburger: function() {
      this.is_active = false;
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
    background: #fff;

    &::before,
    &::after {
      content: "";
      display: block;
      position: absolute;
      left: 0;
      height: 1px;
      background-color: #fff;
      -webkit-transition: -webkit-transform .3s,width .3s,bottom .3s;
      transition: transform .3s,width .3s,bottom .3s;
    }
    &::before {
      top: var(--linetop);
      width: 100%;
    }
    &::after {
      bottom: var(--linebottom);
      width: 50%;
    }
  }

  span.active {
    &::before {
      top: 0;
      width: 50%;
      -webkit-transform: translateX(-3px) translateY(-7px) rotate(-45deg);
      -ms-transform: translateX(-3px) translateY(-7px) rotate(-45deg);
      transform: translateX(-3px) translateY(-7px) rotate(-45deg);
    }
    &::after {
      bottom: 0;
      width: 50%;
      -webkit-transform: translateX(-3px) translateY(7px) rotate(45deg);
      -ms-transform: translateX(-3px) translateY(7px) rotate(45deg);
      transform: translateX(-3px) translateY(7px) rotate(45deg);
    }
  }

}
.c-hamburger--htla {
  background: 0 0;
}
</style>
