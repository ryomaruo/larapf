
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'

require('./bootstrap');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

export const eventHub = new Vue(); //コンポーネント間データ受け渡しのため、イベントハブをインスタンス化しておく。
const app = new Vue({
    el: '#app',
    components: {
      'clicked-circle': require('./components/ClickedCircle.vue'),
      'menu-btn': require('./components/MenuBtn.vue'),
      'menu-section': require('./components/MenuSection.vue'),
      'menu-content': require('./components/MenuContent.vue'),
      'skip-button': require('./components/SkipButton.vue'),
      'my_section': require('./components/MySection.vue'),
      'p5canvas': require('./components/P5Canvas.vue'),
      'divided-section': require('./components/DividedSection.vue')
   }
});
