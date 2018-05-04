<template>
  <div class="skip-button">
    <button id="skip-button" v-on:click="showMain">Skip >></button>
  </div>
</template>
<script>
var eventHub = require("../app.js").eventHub;
  export default {
    methods: {
      showMain: function (e) {
//        this.addZindexToNav()
        var self = this;
        var promise = this.execDivide('lightbar');
        promise.done(function() {
          var promise2 = self.execDivide('lightbar2');
          var promise_main = promise2.done(function() {
            self.execDivide('main');
          })
          promise_main.done(function() {
            setTimeout(function() { //works-sectionが表示されるまでに6秒かかるので、遅延させる。
              eventHub.$emit('displayMenuContent');
            }, 6000)
          })
        })
      },
//      addZindexToNav: _ => {
//        $('.nav-bg')
//          .css({
//            zIndex: 3
//          });
//      },
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
    filter: alpha(opacity=0);
    -moz-opacity:0;
    opacity:0;
  }
}
.skip-button {
  position: absolute;
  top: 15px;
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