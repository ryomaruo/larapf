<template>
  <div class="section" :class="{ 'expand-section': is_expand, 'menu-section': is_menu }" :style="menuStyleObj">
    <div class="section-clipper">
      <component :is="tmpl_name" :url="url"></component>
    </div>
  </div>
</template>
<script>
  var eventHub = require("../app.js").eventHub;
  export default {
    props: {
      'tmpl_name':{},
      'is_expand':{},
      'is_menu':{},
      'url': {
        default: () => {return {}}
      }
    },
    data: function() {
      return {
        menuStyleObj: {
          '--menu-width': '0'
        }
      }
    },
    components: {
     'hello': require('./Hello.vue'),
     'p5canvas': require('./P5Canvas.vue'),
     'menu-content':require('./MenuContent.vue'),
     'rotatebox':require('./works/RotateBox.vue'),
     'staygreen':require('./works/StayGreen.vue')
    },
    created: function () {
      eventHub.$on('showMenu', this.showMenu);
      eventHub.$on('closeMenu', this.closeMenu);
    },
    methods: {
      showMenu: function() {
        this.menuStyleObj = {
          '--menu-width': '100%'
        }
      },
      closeMenu: function() {
        this.menuStyleObj = {
          '--menu-width': '0'
        }
      }
    }
  }
</script>
<style scoped lang="scss">
.section-content.outer-content {
  position: fixed;
  height: 100%;
}
.section-content.inner-content {
  height: 100%;
}
.section {
  position: relative;

  &.menu-section {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--menu-width);
    height: 100%;
    z-index: 3;
    -webkit-transition: all .8s cubic-bezier(.19,1,.22,1);
    transition: all .8s cubic-bezier(.19,1,.22,1);
  }
}
.section-clipper {
  clip: rect(auto, auto, auto, auto);
  -webkit-clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
  clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
}
.section-clipper, .section-content {
  position: absolute;
  bottom: 0;
  right: 0;
  top: 0;
  left: 0;
}
.expand-section {
  position: absolute !important;
  top: 0;
  width:100%;
  height: 100%;
  -webkit-animation-name: expand;
  -webkit-animation-duration: 10s;
}
</style>