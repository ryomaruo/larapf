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
          this.canvas = p.createCanvas(600, 600, p.WEBGL);
          this.canvas.parent(this.$refs.geocanv);
          p.noLoop();
        }

        p.draw = _ => {
          p.background(0);
          p.translate(100, 100);    //立体の中心を画面中央に移動
          p.rotateY(p.radians(60));    //Y軸に対して60度回転
          p.box(150, 150, 150);    //150 x 150 x 150pxの立方体を描画
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">
.main {
  width: 100%;
  height: 100%;
  background: #000;
  box-shadow: #446c84 90px 0px 100px -50px inset, #446c84 -140px 0 100px -100px inset;
  -webkit-box-shadow: #446c84 90px 0px 100px -50px inset, #446c84 -140px 0 100px -100px inset;
  -moz-box-shadow: #446c84 90px 0px 100px -50px inset, #446c84 -140px 0 100px -100px inset;
}
</style>