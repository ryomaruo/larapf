<template>
  <div class="section" :class="{'expand-section': is_expand}">
    <div class="section-clipper">
      <div class="section-content" :class="{'inner-content': is_inner,'outer-content': is_outer}">
        <component :is="tmpl_name"></component>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: [
      'tmpl_name',
      'is_expand',
      'is_outer',
      'is_inner'
    ],
    components: {
     'hello': require('./Hello.vue'),
     'p5canvas': require('./P5Canvas.vue'),
     'rotatebox':require('./RotateBox.vue'),
     'linebox':require('./LineBox.vue')
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