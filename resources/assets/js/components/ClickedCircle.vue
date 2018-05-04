<template>
  <div id="cursor"></div>
</template>
<script>
  export default {
    props: [
      'posy',
      'posx'
    ],
    mounted() {
      const self = this;
      const body = document.getElementsByTagName("body")[0];
      var circle = document.getElementById('cursor');
      body.addEventListener("mousemove", function(e) {
        circle.style.top = e.clientY + 'px';
        circle.style.left = e.clientX + 'px';
      });
      body.addEventListener("mousedown", function() {
        circle.
          classList
          .add('clicked');
      });
      body.addEventListener("mousedown", function() {
        setTimeout(function () {
          circle
            .classList
            .remove("clicked")
        }, 300)
      });
    }
  }
</script>
<style scoped lang="scss">
  @-webkit-keyframes pulse{
    0%{
    -webkit-box-shadow:0 0 0 0 rgba(100,100,100,.4)
    }
    70%{
      -webkit-box-shadow:0 0 0 30px rgba(100,100,100,0)
    }
    100%{
      -webkit-box-shadow:0 0 0 0 rgba(100,100,100,0)
    }
  }
  #cursor {
    position: fixed;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    z-index: 999;
  }
  #cursor.clicked {
    box-shadow: 0 0 0 rgba(100,100,100,.4);
    animation: pulse .5s ease;
  }
  
</style>