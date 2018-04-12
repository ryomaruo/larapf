<template>
  <div class="section-fixed section">
    <div class="section-clipper">
      <div class="section-content">
        <component :is="tmpl_name"></component>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['tmpl_name'],
    components: {
     'hello': require('./Hello.vue'),
     'p5canvas': require('./P5Canvas.vue')
    }
  }
</script>
<style scoped lang="scss">
.section-fixed {
  .section-content {
    position: fixed;
  }
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
</style>