<template>
  <div class="menu-container" :style="styleObject">
    <div class="menu-content">
      <div class="nav-item"></div>
      <div class="nav-item grad-red">
        <a href="" class="scroll-nav nav-menu">
          <h3>about</h3>
        </a>
      </div>
      <div class="nav-item grad-red">
        <a href="#skill" class="scroll-nav nav-menu">
          <h3>skill</h3>
        </a>
      </div>
      <div class="nav-item grad-red">
        <a :href="worksUrl" class="scroll-nav nav-menu">
          <h3>works</h3>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
var eventHub = require("../app.js").eventHub;
export default {
  props: [
    'url'
  ],
  data: function () {
    return {
      styleObject: {
        display: 'none'
      }
    }
  },
  created: function () {
    eventHub.$on('enableMenuContent', this.enableMenuContent);
  },
  methods: {
    enableMenuContent: function() {
      this.styleObject = {
        display: 'block'
      }
    }
  },
  computed: {
    worksUrl: function() {
      return JSON.parse(this.url).works;
    }
  }
}
</script>
<style scoped lang="scss">
.menu-container {
  width: 100%;
  height: 100%;
  position:fixed;
  top: 0;
  left: 0;
  color: #ebebeb;
  z-index: 100;

  & a {
    display: flex;
    justify-content: center;
    flex-direction: column;
    height: 100%;
  }

  & a .bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0;
  }

  h3 {
    font: 400 10px "Proxima Nova",Arial,Helvetica,sans-serif;
    text-transform: uppercase;
    color: rgba(255,255,255,.5);
    letter-spacing: 2px;
    margin-top: 0;
    -webkit-transform: translateX(10px);
    -ms-transform: translateX(10px);
    transform: translateX(10px);
  }

  .grad-red:hover {
    background: #221884;
    background: -moz-linear-gradient(45deg,#221884 0,#be3679 50%,#ffa458 100%);
    background: -webkit-linear-gradient(45deg,#221884 0,#be3679 50%,#ffa458 100%);
    background: linear-gradient(45deg,#221884 0,#be3679 50%,#ffa458 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#221884', endColorstr='#ffa458', GradientType=1 );
  }

  .menu-content {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
  }
  .nav-item {
    width: 100%;
    height: 100%;
    background: #2a0aa9;
    background: -moz-linear-gradient(45deg, #2a0aa9 0, #7e9879 100%);
    background: -webkit-linear-gradient(45deg, #2a0aa9 0, #7e9879 100%);
    background: linear-gradient(45deg, #2a0aa9 0, #7e9879 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2a0aa9', endColorstr='#7c139d', GradientType=1 );
  }
}
</style>
