<template>
  <div class="section-content">
    <change-color-btn v-on:changeColor="changeColor"></change-color-btn>
    <div class="canvas-area">
      <canvas id="canvas__bg"></canvas>
      <div class="center">
        <div ref="rotatebox"></div>
      </div>
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
        isFill: true,
        half_w: $(window).width() / 2
      }
    },
    components: {
      'navbg': require('../NavBG.vue'),
      'change-color-btn': require('../ChangeColorBtn.vue')
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
        let r,g,b;

        p.setup = _ => {
          this.canvas = p.createCanvas(w, h, p.WEBGL);
          this.canvas.parent(this.$refs.rotatebox);
          p.frameRate(10);
          p.strokeWeight(1);
        }

        let obj_size = 100;
        let growing = 1;

        p.draw = _ => {
          p.background(0);
          if (this.isFill === true) {
            r = p.random(255);
            g = p.random(255);
            b = p.random(255);
            p.noStroke();
            p.fill(r, g, b, 50);
          } else {
            p.noFill();
            p.stroke(p.random(255), p.random(255), p.random(255), 50);
          }
          p.push();
          p.translate(-150, -150);
          p.rotateY(p.frameCount / 500.0);
          p.box(obj_size);
          p.pop();
          if (this.isFill === true) {
            r = p.random(255);
            g = p.random(255);
            b = p.random(255);
            p.noStroke();
            p.fill(r, g, b, 50);
          } else {
            p.noFill();
            p.stroke(p.random(255), p.random(255), p.random(255), 50);
          }
          p.push();
          p.translate(150, 150);
          p.sphere(obj_size);
          p.pop();

          obj_size += growing;

          if (obj_size < 50 || obj_size > 200) {
            growing = -growing;
          }
          times++;

//          var c   = document.getElementById("canvas__bg");
//          var $   = c.getContext("2d");
//          var col = function (e, n, t, o, r) {
//              $.fillStyle = "rgb(" + t + "," + o + "," + r + ")",
//              $.fillRect(e, n, 1, 1)
//          }
//          var R = function (e, n, t) {
//              return Math.floor(130 + 64 * Math.cos((e * e - n * n) / 300 + t))
//          }
//          var G = function (e, n, t) {
//              return Math.floor(
//                  0 + 64 * Math.sin((e * e * Math.cos(t / 4) + n * n * Math.sin(t / 3)) / 300)
//              )
//          }
//          var B = function (e, n, t) {
//              return Math.floor(
//                  250 + 64 * Math.sin(5 * Math.sin(t / 9) + ((e - 100) * (e - 100) + (n - 100) * (n - 100)) / 1100)
//              )
//          }
//          var t   = 0;
//          var run = function () {
//            for (x = 0; x <= 35; x++) {
//              for (y = 0; y <= 35; y++) {
//                col(x, y, R(x, y, t), G(x, y, t), B(x, y, t));
//              }
//            }
//          }
//          t += .03;
//          window.requestAnimationFrame(run);
        }

//        p.mouseClicked = _ => {
//          this.isFill = (isFill === true)? false:true;
//        }
      },
      this.ps = new p5(this.sketch);
    },
    methods: {
      changeColor: function() {
        this.isFill = (this.isFill === true)? false:true;
      }
    }
  }
</script>
<style scoped lang="scss">

</style>