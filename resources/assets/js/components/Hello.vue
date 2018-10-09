<template>
  <div class="section-content">
    <div class="text-center name-intro">
      <div class="s-im">
        <span>I'm</span>
      </div>
      <div class="s-ryo">
        <span>Ryo</span>
      </div>
    </div>
    <div class="text-center job-intro">
      <div class="s-web">
        <span>Web</span>
      </div>
      <div class="s-developer">
        <span>Developerrr</span>
      </div>
    </div>
  </div>
</template>

<script>
var SmallHeader = require("../SmallHeader");
export default {
  data: function() {
    return {
      SmallHeader: SmallHeader
    }
  },
  mounted() {
    if ($(".js-3dheader").length>0 && $(".js-3dheader").outerWidth() > 640) {
        var smallHeader = new SmallHeader($(".js-3dheader"));
    }
  },
}
</script>
<style scoped lang="scss">
  @-webkit-keyframes fadeInFromAbove {
    0% {
        position: absolute;
        top: 0%;
        left: 50%;
        transform: translate(-50%, 0%);
        filter: alpha(opacity=0);
        -moz-opacity:0;
        opacity:0;
    }
  }
  .name-intro {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-animation-name: fadeInFromAbove;
    -webkit-animation-duration: 3.5s;
    .s-im {
      font-size: 40px;
    }
    .s-ryo {
      font-size: 225px;
    }
  }

  @-webkit-keyframes fadeInFromBellow {
    0% {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translate(-50%, 0%);
        color: #fff;
        filter: alpha(opacity=0);
        -moz-opacity:0;
        opacity:0;
    }
  }
  .job-intro {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #000;
    -webkit-animation-name: fadeInFromBellow;
    -webkit-animation-duration: 3.5s;
    .s-web {
      font-size: 50px;
    }
    .s-developer {
      font-size: 100px;
    }
  }
</style>
