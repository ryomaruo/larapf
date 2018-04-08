<template>
  <div class="canvas-section">
    <div class="center">
      <div ref="canvas"></div>
    </div>
    <div class="sentence">
      <span>world is</span>
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
        canvas: null
      }
    },
    mounted() {
      this.sketch = p => {
        this.x = 100
        this.y = 100
        let x = [];
        let y = [];
        let x2 = [];
        let y2 = [];
        let times = 1;
        let self = this;

        p.setup = _ => {
          this.canvas = p.createCanvas(800, 600);
          this.canvas.parent(this.$refs.canvas);
          p.noLoop();
          x[0] = 0;
          y[0] = 0;
          x2[0] = 0;
          y2[0] = 600;
        }

        p.draw = _ => {
          var draw = function() {
            var defer = $.Deferred();
            var id = setInterval(function() {
              if (x[times - 1] > 850) {
                defer.resolve();
                console.log('resolved1');
                clearInterval(id);
              }
              var speed = [];
              speed[0] = p.random(0, 5);
              speed[1] = 3 / 4 * speed[0] + p.random(1, -1);
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
            }, 30);
            return defer;
          }
          var promise = draw();
          promise.done(function() {
            setTimeout(function() {
              $('.canvas-section .sentence').css({
                background: 'linear-gradient(45deg, #221884 0, #be3679 50%, #ffa458 100%)',
                padding: '5px 10px'
              })
              p.background(255);
              for (var i = 0; i < times; i++) {
                p.ellipse(x[i], y[i], 50, 50);
                p.ellipse(x2[i], y2[i], 50, 50);
              }
            }, 300);
          })
        }
      },
      this.ps = new p5(this.sketch);
    },
    methods: {
      isFlashtime: function(times) {
        if ((times % 30 < 2 || times % 30 > 4 && times % 30 < 6) && 30 < times && times < 400) {
          return true;
        }
        return false;
      }
    }
  }
</script>
<style scoped lang="scss">
  .center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .canvas-section {
    .sentence {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 100px;
      z-index: 99;
    }
  }
</style>