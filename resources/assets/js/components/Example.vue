<template>
  <div class="text-center introduce">
    <div class="im">
      <span>I'm</span>
    </div>
    <div class="daiki">
      <span>Daiki</span>
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
    console.log('Component mounted.');
    if ($(".js-3dheader").length>0 && $(".js-3dheader").outerWidth() > 640) {
        var smallHeader = new SmallHeader($(".js-3dheader"));
    }
  },
}
</script>
<style scoped lang="scss">
  @-webkit-keyframes fadeIn {
    0% {
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(0%, -50%);
        filter: alpha(opacity=0);
        -moz-opacity:0;
        opacity:0;
    }
  }
  .introduce {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-animation-name: fadeIn;
    -webkit-animation-duration: 1s;
    .im {
      font-size: 40px;
    }
    .daiki {
      font-size: 250px;
    }
  }
</style>
