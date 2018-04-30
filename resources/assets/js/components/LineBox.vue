<template>
  <div class="canvas-area">
    <div class="center">
      <div ref="linebox"></div>
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
          this.canvas.parent(this.$refs.linebox);
          p.strokeWeight(1);
        }

        let obj_size = 300;
        let growing = 1;

        p.draw = _ => {
          p.background(0);
          p.noFill();
          p.stroke(50, 100);
          p.push();
          p.translate(-150, -150);
          p.rotateY(p.frameCount / 500.0);
          p.box(100);
          p.pop();

          p.noFill();
          p.stroke(50, 100);
          p.push();
          p.translate(150, 150);
          p.sphere(100);
          p.pop();

          obj_size += growing;

          if (obj_size < 200 || obj_size > 300) {
            growing = -growing;
          }
          times++;
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">

</style>