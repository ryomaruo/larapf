<template>
  <div class="canvas-area">
    <div class="center">
      <div ref="rotatebox"></div>
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
        let w = $(window).width() * 0.8;
        let h = window.innerHeight ? window.innerHeight: $(window).height();

        p.setup = _ => {
          this.canvas = p.createCanvas(w, h, p.WEBGL);
          this.canvas.parent(this.$refs.rotatebox);
          p.strokeWeight(1);
        }

        let obj_size = 300;
        let growing = 1;

        p.draw = _ => {
          p.background(0);
          p.noFill();
          p.stroke(128, 100);
          p.push();
          p.translate(-150, -150);
          p.rotateY(p.frameCount / 500.0);
          p.box(100);
          p.pop();

          p.noFill();
          p.stroke(128, 100);
          p.push();
          p.translate(150, 150);
          p.sphere(100);
          p.pop();

          obj_size += growing;

          if (obj_size < 200 || obj_size > 300) {
            growing = -growing;
          }
          times++;

          c   = document.getElementById("canvas__bg"),
          $   = c.getContext("2d"),
          col = function (e, n, t, o, r) {
              $.fillStyle = "rgb(" + t + "," + o + "," + r + ")",
              $.fillRect(e, n, 1, 1)
          },
          R   = function (e, n, t) {
              return Math.floor(130 + 64 * Math.cos((e * e - n * n) / 300 + t))
          },
          G   = function (e, n, t) {
              return Math.floor(
                  0 + 64 * Math.sin((e * e * Math.cos(t / 4) + n * n * Math.sin(t / 3)) / 300)
              )
          },
          B   = function (e, n, t) {
              return Math.floor(
                  250 + 64 * Math.sin(5 * Math.sin(t / 9) + ((e - 100) * (e - 100) + (n - 100) * (n - 100)) / 1100)
              )
          },
          t   = 0,
          run = function () {
            for (x = 0; x <= 35; x++) {
              for (y = 0; y <= 35; y++) {
                col(x, y, R(x, y, t), G(x, y, t), B(x, y, t));
              }
            }
          }
          t += .03,
          window.requestAnimationFrame(run)
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">

</style>