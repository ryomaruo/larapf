<template>
  <div class="menu-content" :style="styleObject">
    <div class="about">
      <a href="#about" class="scroll-nav nav-menu">
        <div class="bg grad-red"></div>
        <h3>about</h3>
      </a>
    </div>
    <div class="works">
      <a href="#works" class="scroll-nav nav-menu">
        <div class="bg grad-red"></div>
        <h3>works</h3>
      </a>
    </div>
    <div class="skill">
      <div class="skill">
      <a href="#skill" class="scroll-nav nav-menu">
        <div class="bg grad-red"></div>
        <h3>skill</h3>
      </a>
    </div>
    </div>
  </div>
</template>
<script>
var eventHub = require("../app.js").eventHub;
export default {
  data: function () {
    return {
      styleObject: {
        display: 'none'
      }
    }
  },
  created: function () {
    eventHub.$on('displayMenuContent', this.displayMenuContent);
  },
  methods: {
    displayMenuContent: function() {
      this.styleObject = {
        display: 'block'
      }
    }
  }
}
</script>
<style scoped lang="scss">
.menu-content {
  position:absolute;
  top: 0;
  left: -100%;
  z-index: 100;
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 100%;
}
</style>
