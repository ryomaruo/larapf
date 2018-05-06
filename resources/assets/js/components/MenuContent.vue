<template>
  <div class="menu-contents">
    <div class="menu-clip-container">
      <div class="menu-clipper">
        <div class="menu-content">
          <span>About Content</span>
        </div>
      </div>
      <div class="menu-clipper">
        <div class="menu-content">
          <span>skill Content</span>
        </div>
      </div>
      <div class="menu-clipper">
        <div class="menu-content">
          <span>works Content</span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  var eventHub = require("../app.js").eventHub;
  export default {
    created: function () {
      eventHub.$on('slideContentClipper', this.slideContentClipper);
    },
    mounted: function() {
    },
    methods: {
      slideContentClipper: function() {

      }
    }
  }
</script>
<style scoped lang="scss">
.menu-contents {
  width: 0%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 5;
}

.menu-clip-container {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 100%;
  
  .menu-clipper {
    position: absolute;
    bottom: 0;
    right: 0;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    clip: rect(auto, auto, auto, auto);
    -webkit-clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
    clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
    -webkit-transition: all .8s cubic-bezier(.19,1,.22,1);
    transition: all .8s cubic-bezier(.19,1,.22,1);
  }

  .menu-content {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #000;
  }
}


</style>