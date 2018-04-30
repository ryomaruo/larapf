<template>
  <div class="nav-bg">
    <skip-button></skip-button>
    <ul class="nav-lists">
      <li class="nav-item about">
        <a href="#">About</a>
      </li>
      <li class="nav-item works">
        <a href="#">Works</a>
      </li>
      <li class="nav-item skill">
        <a href="#">Skill</a>
      </li>
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
      <li><span></span></li>
    </ul>
    <div id="menuItemActive" class="item-active-bottom pos1">
      <div class="menu-handler"></div>
    </div>
  </div>
</template>
<script>
  export default {
    components: {
     'skip-button': require('./SkipButton.vue')
    },
    mounted() {
      $('.nav-item.about').on('click', function() {
        $('#menuItemActive').removeClass(function(index, className) {
          return (className.match(/\bpos\d+/g) || []).join(' ');
        });
        $('#menuItemActive').addClass('pos2');
      })
      $('.nav-item.works').on('click', function() {
        $('#menuItemActive').removeClass(function(index, className) {
          return (className.match(/\bpos\d+/g) || []).join(' ');
        });
        $('#menuItemActive').addClass('pos3');
      })
      $('.nav-item.skill').on('click', function() {
        $('#menuItemActive').removeClass(function(index, className) {
          return (className.match(/\bpos\d+/g) || []).join(' ');
        });
        $('#menuItemActive').addClass('pos4');
      })
    }
  }
</script>
<style scoped lang="scss">
.nav-bg {
  width: 100%;
  height: 60px;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 3;
}
.nav-lists {
  margin: 0;
  list-style: none;
  overflow: hidden;
  li {
    float: left;
    width: calc(100%/7);
    height: 100%;
  }
  a,span {
    display: inline-block;
    width: 100%;
    text-decoration: none;
    text-align: center;
    margin-top: 20px;
    color: rgba(255,255,255,.7);
    cursor: pointer;
    will-change: color;
    transition: color 300ms 0s ease;
  }
}
.item-active-bottom {
  position: absolute;
  top: 27px;
  left: 0;
  width: calc(100%/7);
  height: 1px;
  background-color: transparent;
  will-change: transform;
}
.item-active-bottom.pos2 {
  will-change: transform;
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
}
.item-active-bottom.pos3 {
  will-change: transform;
  -webkit-transform: translateX(200%);
  transform: translateX(200%);
}
.item-active-bottom.pos4 {
  will-change: transform;
  -webkit-transform: translateX(300%);
  transform: translateX(300%);
}
.menu-handler {
  width: 100px;
  height: 1px;
  margin: auto;
  background-color: red;
}
</style>