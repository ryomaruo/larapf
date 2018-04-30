<template>
  <div class="index">
    <div class="main">
      <my_section tmpl_name="rotatebox" is_inner="true"></my_section>
      <my_section tmpl_name="linebox" is_inner="true"></my_section>
    </div>
  </div>
</template>
<script>
  export default {
    components: {
     'my_section': require('./MySection.vue')
    }
  }
</script>
<style scoped lang="scss">
.index {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  background: #000;
  box-shadow: #446c84 0 80px 100px -50px inset, #446c84 0 -140px 100px -100px inset;
  -webkit-box-shadow: #446c84 0 80px 100px -50px inset, #446c84 0 -140px 100px -100px inset;
  -moz-box-shadow: #446c84 0 80px 100px -50px inset, #446c84 0 -140px 100px -100px inset;
}
.main {
  width: 100%;
  height: 100%;
}
</style>