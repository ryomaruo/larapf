<template>
  <div class="skip-button">
    <button id="skip-button" v-on:click="test">Skip >></button>
  </div>
</template>
<script>
  export default {
    methods: {
      test: function (e) {
        var i = 0;
        var id = setInterval(function() {
          console.log(i)
          if (i > 110) {
            clearInterval(id);
          }
          $('.divided-section .main')
            .closest('.divided-section')
            .css({
              display: 'block'
            })
          $('.divided-section .main')
              .closest('.section-clipper')
              .css({
                zIndex: 2
              });
          $('.divided-section .main')
            .closest('.section-clipper')
            .css({
              '-webkit-animation-name': 'exp-from-center',
              '-webkit-animation-duration': '6s'
            })
          i++;
        }, 20);
      }
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