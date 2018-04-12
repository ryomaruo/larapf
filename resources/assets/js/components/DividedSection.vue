<template>
  <div class="section-fixed divided-section">
    <div class="cell-left"></div>
    <div class="cell-right"></div>
    <div class="section-clipper">
      <div class="section-content">
        <component :is="tmpl_name" :class_name="class_name"></component>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: [
      'tmpl_name',
      'class_name'
    ],
    components: {
     'lightbar': require('./LightBar.vue'),
     'index': require('./Index.vue')
    }
  }
</script>
<style scoped lang="scss">
.divided-section {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  .cell-left,
  .cell-right {
    display: none;
    position: absolute;
    top: 0;
    width: 50%;
    height: 100%;
  }
  .cell-left {
    left: 0;
  }
  .cell-right {
    left: 50%;
  }
  .section-clipper {
    width: 0%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    clip: rect(auto, auto, auto, auto);
    -webkit-clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
    clip-path: polygon(100% 0,100% 100%,0 100%,0 0);
  }
}
.section-fixed {
  .section-content {
    position: fixed;
  }
}
.section {
  position: relative;
}
.section-clipper, .section-content {
  position: absolute;
  bottom: 0;
  right: 0;
  top: 0;
  left: 0;
}
</style>