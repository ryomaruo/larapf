<template>
  <div class="change-color-button" v-on:click="confirm">
    <span>{{ btnText }}:</span>
    <input type="checkbox" id="change-color-button" v-on:click="changeColor">
  </div>
</template>
<script>
  export default {
    data: function() {
      return {
        btnText: 'fill'
      }
    },
    methods: {
      changeColor: function() {
        console.log($(this).attr('checked'));
        this.btnText = 'stroke';
        this.$emit('changeColor');
      },
      confirm: function() {
        console.log('clicked');
      }
    }
  }
</script>
<style scoped lang="scss">
@-webkit-keyframes fadeInSkipBtn {
  0% {
    position: absolute;
    top: 0;
    right: 5%;
    filter: alpha(opacity=0);
    -moz-opacity:0;
    opacity:0;
  }
}
.change-color-button {
  position: absolute;
  top: 30px;
  right: 5%;
  width: 120px;
  padding: 5px;
  text-align: center;
  vertical-align: middle;
  color: #000;
  border-radius: 2px;
  border-color: #000;
  background-color: #fff;
  -webkit-animation-name: fadeInSkipBtn;
  -webkit-animation-duration: 2s;
  z-index: 4;
  span {
    vertical-align: middle;
  }
}
#change-color-button {
  appearance: none;
  -webkit-appearance: none;
  -ms-appearance: none;
  -moz-appearance: none;
  position: relative;
  margin: 10px;
  width: 50px;
  height: 15px;
  border: 0px solid rgba(0,0,0,0.0);
  border-radius: 10px;
  background-color: #ddd;
  vertical-align: middle;
  transition: background-color .4s ease;
  &:checked {
    background-color: #bbb;
  }

  &::after,
  &:checked::after {
    content: '';
    position: absolute;
    top: 0;
    width: 15px;
    height: 15px;
    border: 0px solid rgba(0,0,0,0.0);
    border-radius: 50%;
    background-color: #eee;
    box-shadow: 0 0 4px rgba(0,0,0,0.4);
    transition: left .4s ease, background-color .4s ease;
  }
  &::after {
    left: 0;
  }
  &:checked::after {
    left: 35px;
  }
}
</style>