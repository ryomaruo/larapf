<template>
  <div class="skip-button">
    <button id="skip-button">Skip >></button>
  </div>
</template>
<script>
  export default {
    mounted() {

    }
  }
</script>
<style scoped lang="scss">
@-webkit-keyframes fadeInSkipBtn {
  0% {
    position: absolute;
    top: 0;
    right: 5%;
    ilter: alpha(opacity=0);
    -moz-opacity:0;
    opacity:0;
  }
}
.skip-button {
  position: absolute;
  top: 5%;
  right: 5%;
  z-index: 2;
  -webkit-animation-name: fadeInSkipBtn;
  -webkit-animation-duration: 2s;
}
#skip-button {
  padding: 5px;
  color: #000;
  border-radius: 2px;
  border-color: #000;
}
</style>