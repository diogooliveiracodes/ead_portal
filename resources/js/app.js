require('./bootstrap');
import Argon from "./plugins/argon-kit";

window.Vue = require('vue');

Vue.component('first-component', require('./welcome-components/FirstComponent.vue').default);
Vue.component('second-component', require('./welcome-components/SecondComponent.vue').default);
Vue.component('last-component', require('./welcome-components/LastComponent.vue').default);
Vue.component('v-numeros', require('./welcome-components/Numeros.vue').default);
Vue.component('v-footer', require('./welcome-components/Footer.vue').default);
Vue.component('v-navbar', require('./welcome-components/Navbar.vue').default);

// Globais
Vue.component('base-nav', require('./components/BaseNav.vue').default);
Vue.component('close-button', require('./components/CloseButton.vue').default);
Vue.component('logo', require('./welcome-components/Logo.vue').default);


Vue.directive('scroll', {
    inserted: function (el, binding) {
      let f = function (evt) {
        if (binding.value(evt, el)) {
          window.removeEventListener('scroll', f)
        }
      }  
      window.addEventListener('scroll', f)
    }
  });
  
import { BCarousel } from 'bootstrap-vue'
Vue.component('b-carousel', BCarousel)

import { CarouselPlugin } from 'bootstrap-vue'
Vue.use(CarouselPlugin)

Vue.use(Argon);
window.onload = function () {
    const app = new Vue({
        el: '#app',
    });
}