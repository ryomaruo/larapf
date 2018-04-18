<template>
  <div :class="class_name">
    
  </div>
</template>
<script>
  export default {
    props: ['class_name']
  }
</script>
<style scoped lang="scss">
.lightbar,
.lightbar2 {
  width: 100%;
  height: 100%;
}
.lightbar {
  box-shadow: #de4375 90px 0px 100px -50px inset, #de4375 -140px 0 100px -100px inset;
  -webkit-box-shadow: #de4375 90px 0px 100px -50px inset, #de4375 -140px 0 100px -100px inset;
  -moz-box-shadow: #de4375 90px 0px 100px -50px inset, #de4375 -140px 0 100px -100px inset;
}
.lightbar2 {
  box-shadow: #9b50a0 90px 0px 100px -50px inset, #9b50a0 -140px 0 100px -100px inset;
  -webkit-box-shadow: #9b50a0 90px 0px 100px -50px inset, #9b50a0 -140px 0 100px -100px inset;
  -moz-box-shadow: #9b50a0 90px 0px 100px -50px inset, #9b50a0 -140px 0 100px -100px inset;
}
</style>