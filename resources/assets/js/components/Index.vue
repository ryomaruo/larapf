<template>
  <div class="main">
    <div class="center">
      <div ref="geocanv"></div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['class_name'],
    components: {
     'hello': require('./Hello.vue')
    },
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

        p.setup = _ => {
          this.canvas = p.createCanvas(600, 600);
          this.canvas.parent(this.$refs.geocanv);
          console.log(this.canvas);
          p.noLoop();
        }

        p.draw = _ => {
          p.background(0);
          p.noStroke();

          p.fill(204);
          p.triangle(18, 18, 18, 360, 81, 360);

          p.fill(102);
          p.rect(81, 81, 63, 63);

          p.fill(204);
          p.quad(189, 18, 216, 18, 216, 360, 144, 360);

          p.fill(255);
          p.ellipse(252, 144, 72, 72);

          p.fill(204);
          p.triangle(288, 18, 351, 360, 288, 360); 

          p.fill(255);
          p.arc(479, 300, 280, 280, p.PI, p.TWO_PI);
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">
.main {
  width: 100%;
  height: 1000px;
  background: #000;
  box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
  -webkit-box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
  -moz-box-shadow: #cc2110 10px 0px 150px 0px inset, #cc2110 -10px 0 150px 0px inset, #cc2110 0 0 150px 0;
}
</style>