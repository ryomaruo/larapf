<template>
  <div class="fixed-canvas-area">
    <div class="center">
      <div ref="aboriginalcanv"></div>
    </div>
  </div>
</template>
<script>
  var eventHub = require("../app.js").eventHub;
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
        let sketch = this;

        p.setup = _ => {
          this.canvas = p.createCanvas(w, h);
          this.canvas.parent(this.$refs.aboriginalcanv);
        }

        p.draw = _ => {
          var draw = function() {
            var ab_circle = new AboriginalCircle(3);
            ab_circle.
          }
          var AboriginalCircle = function(circle_cnt) {
            this.s_r = 2;
            this.r = 100;
            this.circle_cnt = circle_cnt;
            this.circles = this.setCircles();
          }
          AboriginalCircle.prototype.setCircle = function() {
            for (var i = 0; i < p.width; i++) {
              for (var j = 0; j < p.height; j++) {
                elipse(i, j, 2, 2);
              }
            }
          }
          AboriginalCircle.prototype.setCircle = function() {

          }
        }
      },
      this.ps = new p5(this.sketch);

    },
    methods: {

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