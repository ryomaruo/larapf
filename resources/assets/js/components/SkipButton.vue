<template>
  <div class="skip-button">
    <button id="skip-button" v-on:click="showMain">Skip >></button>
  </div>
</template>
<script>
  export default {
    methods: {
      showMain: function (e) {
        var self = this;
        var promise = this.execDivide('lightbar');
        promise.done(function() {
          var promise2 = self.execDivide('lightbar2');
          var promise_main = promise2.done(function() {
            self.execDivide('main');
          })
        })
      },
      execDivide: function(lightbar) {
        if (lightbar == 'main') {
          $('.sections.works-section')
            .css({
              display: 'block',
              zIndex: 2
            });
        } else {
          this.showDevidedSection(lightbar);
        }
        var defer = $.Deferred();
        var i = 0;
        var id  = setInterval(function() {
          if (i == 3) {
            clearInterval(id);
            defer.resolve();
          }
          i++;
        }, 100);
        $('.divided-section .' + lightbar)
            .closest('.section-clipper')
            .css({
              '-webkit-animation-name': 'exp-from-center',
              '-webkit-animation-duration': '4s'
            });
        return defer;
      },
      showDevidedSection: function(lightbar) {
        $('.' + lightbar)
          .closest('.divided-section')
          .css({
            display: 'block'
          })
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