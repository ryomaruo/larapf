<template>
  <div class="fixed-canvas-area">
    <div class="center">
      <div ref="crosscanv"></div>
    </div>
    <div class="sentence">
      <span>Check me</span>
    </div>
  </div>
</template>
<script>
  export default {
    data: function () {
      return {
        sketch: null,
        ps: null,
        x: 0,
        y: 0,
        canvas: null,
        half_w: $(window).width() / 2
      }
    },
    mounted() {
      let self = this;
      this.sketch = p => {
        this.x = 100
        this.y = 100
        let x = [];
        let y = [];
        let x2 = [];
        let y2 = [];
        let times = 1;
        let w = $(window).width();
        let h = 600;
//        let h = $(window).height();


        p.setup = _ => {
          this.canvas = p.createCanvas(w, h);
          this.canvas.parent(this.$refs.crosscanv);
          p.noLoop();
          x[0] = 0;
          y[0] = 0;
          x2[0] = 0;
          y2[0] = h;
        }

        p.draw = _ => {
          var draw = function() {
            var defer = $.Deferred();
            var id = setInterval(function() {
              if (x[times - 1] > w + 50) {
                defer.resolve();
                clearInterval(id);
              }
              var speed = [];
              speed[0] = p.random(0, 5);
              speed[1] = h / w * speed[0] + p.random(1, -1);
              x[times] = x[times - 1] + speed[0];
              y[times] = y[times - 1] + speed[1];
              x2[times] = x2[times - 1] + speed[0];
              y2[times] = y2[times - 1] - speed[1];
              p.fill(255);
              p.background(0);
              p.ellipse(x[times], y[times], 50, 50);
              p.ellipse(x2[times], y2[times], 50, 50);
              if (self.isFlashtime(times)) {
                p.background(255);
                for (var i = 0; i <= times; i++) {
                  p.ellipse(x[i], y[i], 50, 50);
                  p.ellipse(x2[i], y2[i], 50, 50);
                }
              }
              times++;
            }, 10);
            return defer;
          }
          var promise = draw();
          
          var openDevided = promise => {
            var defer = $.Deferred();
            promise.done(function() {
              setTimeout(function() {
                p.background(255);
                for (var i = 0; i < times; i++) {
                  p.ellipse(x[i], y[i], 50, 50);
                  p.ellipse(x2[i], y2[i], 50, 50);
                }
                self.changeCanvasStr();
                // open meにクリック時の処理をadd
                self.addOnClickToSentence(defer);
              }, 1200);
            })
            return defer;
          }

          var open_promise = openDevided(promise);
          open_promise.done(function() {
            var i = 0;
            var id = setInterval(function() {
              var main_w = self.half_w - i * self.half_w / 100;
              if (i == 90) {
                clearInterval(id);
              }
              i++;
            }, 30);
          })
        }
      },
      this.ps = new p5(this.sketch);
    },
    methods: {
      isFlashtime: function(times) {
        if ((times % 30 < 2 || times % 30 > 4 && times % 30 < 6) && 30 < times && times < 600) {
          return true;
        }
        return false;
      },
      changeCanvasStr: function() {
        $('.fixed-canvas-area .sentence:hover')
          .addClass('pointer');
        $('.fixed-canvas-area .sentence')
          .css({
              background: 'linear-gradient(45deg, #221884 0, #be3679 50%, #ffa458 100%)',
              padding: '10px 0'
          });
      },
      addOnClickToSentence: function(defer) {
        var self = this;
        $('.sentence').on('click', function() {
          self.divideCanvas(defer);
        })
      },
      divideCanvas: function(defer) {
        var self = this;
        var promise = this.execDivide('lightbar');
        promise.done(function() {
          var promise2 = self.execDivide('lightbar2');
          var promise_main = promise2.done(function() {
            self.execDivide('main');
          })
          promise_main.done(function() {
            defer.resolve();
          })
        })
      },
      showDevidedSection: function(lightbar) {
        $('.' + lightbar)
          .closest('.divided-section')
          .css({
            display: 'block'
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
      }
    }
  }
</script>
<style scoped lang="scss">
.fixed-canvas-area {
  position: absolute !important;
  top: 0;
  width:100%;
  height: 100%;
  .sentence {
    width: 800px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-size: 90px;
    z-index: 1;
  }
}
</style>