<template>
  <div class="section" :class="{ 'expand-section': is_expand }">
    <div class="section-clipper">
      <component :is="tmpl_name"></component>
    </div>
  </div>
</template>
<script>
  var eventHub = require("../app.js").eventHub;
  export default {
    props: {
      'tmpl_name':{},
      'is_expand':{}
    },
    components: {
     'hello': require('./Hello.vue'),
     'p5canvas': require('./P5Canvas.vue'),
     'rotatebox':require('./works/RotateBox.vue'),
     'staygreen':require('./works/StayGreen.vue')
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