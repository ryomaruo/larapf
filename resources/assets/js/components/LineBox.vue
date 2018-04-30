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
        }

        p.draw = _ => {
          p.push();
          p.noFill();
          p.stroke(255);
          p.translate(0, 0);
          p.rotateY(p.frameCount / 200.0);
          p.box(300);
          p.pop();

          p.noFill();
          p.stroke(255);
          p.push();
          p.translate(500, h*0.35, -200);
          p.sphere(300);
          p.pop();
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">

</style>