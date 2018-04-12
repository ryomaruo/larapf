<template>
  <div class="main">
  </div>
</template>
<script>
  export default {
    props: ['class_name'],
    components: {
     'hello': require('./Hello.vue')
    }
  }
</script>
<style scoped lang="scss">
.main {
  width: 100%;
  height: 100%;
  background: #000;
  box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
  -webkit-box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
  -moz-box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
}
</style>