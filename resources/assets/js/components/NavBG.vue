<template>
  <div class="nav-bg">
    <ul class="nav-lists">
      <li class="nav-item about">
        <a href="">About</a>
      </li>
      <li class="nav-item works">
        <a href="">Works</a>
      </li>
      <li class="nav-item skill">
        <a href="">Skill</a>
      </li>
    </ul>
  </div>
</template>
<script>
  export default {

  }
</script>
<style scoped lang="scss">
.nav-bg {
  width: 100%;
  height: 100px;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
}
.nav-lists {
  list-style: none;
  li {
    display: inline-block;
  }
  a {
    text-decoration: none;
  }
}
</style>