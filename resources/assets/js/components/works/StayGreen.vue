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
        var w = 720;
        var h = 480;
        var c = p.color(19,19,56);
        var word = "Openprocessing";
        var allwords = "share your sketches with others help and collaborate with the community improve and polish your programming skills";
        var start  = new p.createVector(10, 60);
        var tSize =92;
        var Points = [];
        var index=0;
        var restZ=0;
        var F = 0;
        var CTime=100;//number of frames between words
        var PNum =1200;//number of particles
        p.setup = _ => {
          this.canvas = p.createCanvas(w, h);
          this.canvas.parent(this.$refs.linebox);
          p.frameRate(30);
          p.background(19,19,55);
          p.textSize(tSize);
          p.fill(c);
          p.text(word, start.x, start.y+tSize); //writing invisible text
          p.loadPixels(); //saving all pixels of the sketch
          for (var i = 0; i < PNum; i++) {//creating the particles
            Points.push(new particle(p.random(w), p.random(h)));
          }
        }

        p.draw = _ => {
          p.background(19,19,55);
          var Len = word.length;
          var RealPix;
          if (restZ==0){//when the timer for the word runs out
            restZ=CTime;
            for (var P of Points) {//resetting particles and slowing them down
              P.target=false;
              P.velocity.mult(0.35);
            }
            var Arr = allwords.split(" ");
            word = Arr[F];//getting the next word
            start.x = p.random(10, w - word.length * tSize / 1.45);
            start.y = p.random(10, h - tSize * 1.3);//positioning text inside the window
            p.fill(c);
            p.text(word, start.x, start.y+tSize);
            p.loadPixels();
            F++;
            if (F>=Arr.length) {
              F=0;
            };
          } else if (restZ<=4){//slowing down on the last 4 frames
            for (var P of Points) {
              P.velocity.mult(0.85);
            }
          }
          restZ-=1;
          for (var i = 0; i < 13*PNum/(CTime-30); i++) {//checking p.random points in the area of the text
            var randomx = p.random(start.x, start.x+Len*tSize/1.45);
            var randomy = p.random(start.y, start.y+tSize*1.3);
            RealPix = new p.createVector(randomx, randomy);
            var pixNr = RealPix.y*w + RealPix.x;
            var b = p.pixels[pixNr];
            if ((c == b)&&(restZ<CTime-20)&&(restZ>=10)){//if the point is on text
              var Aktuell = Points.get(index);
              if (Aktuell.target == false){
                Aktuell.target = true;
                var desired = PVector.sub(RealPix, Aktuell.location);
                desired.div(restZ);
                Aktuell.velocity = desired;//kicking the particle in the direction of the point
              }
              index++;
              index = index%PNum;
            }
          }
          runP();//simulating and drawing the particles
        }

        var runP = _ => {
          for (var P of Points) {
            p.stroke(255,255,255 ,128 / p.sqrt(P.velocity.mag()+1));
            P.location.add(P.velocity);
            p.line(P.location.x, P.location.y, P.location.x+P.velocity.x, P.location.y+P.velocity.y);
          }//drawig particles as lines for a smoother look
        }

        var particle = function(x, y) {
          this.location = new p.createVector(x, y);
          this.velocity = new p.createVector(0.0, 0.0);
          this.target = false;
        }
      }
      this.ps = new p5(this.sketch);
    }
  }
</script>
<style scoped lang="scss">

</style>