/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

 /*--------containers-----------*/
 Vue.component('full-section', require('./components/containers/fullSection.vue').default);
 Vue.component('half-section', require('./components/containers/halfSection.vue').default);
 
  /*--------form-----------*/
  Vue.component('upload-picture', require('./components/form/uploadPicture.vue').default);
  Vue.component('upload-pictures', require('./components/form/uploadMultiplePicture.vue').default);
  Vue.component('upload-file', require('./components/form/uploadFile.vue').default);
  Vue.component('select-list', require('./components/form/selectList.vue').default);
  Vue.component('contact-form', require('./components/form/contactForm.vue').default);
  Vue.component('ventas-form', require('./components/form/ventasForm.vue').default);
  Vue.component('subscribe', require('./components/form/subscribe.vue').default);
  Vue.component('wizzard', require('./components/form/wizzard.vue').default);
 
  /*--------partials-----------*/
 Vue.component('navigation', require('./components/partials/navigation.vue').default);
 
 Vue.component('carousel', require('./components/partials/carousel.vue').default);
 Vue.component('slider', require('./components/partials/slider.vue').default);
 Vue.component('drop-list', require('./components/partials/dropList.vue').default);
 Vue.component('location-list', require('./components/partials/locationList.vue').default);
 Vue.component('searchbar', require('./components/partials/searchbar.vue').default);
 Vue.component('info-slider', require('./components/partials/infoSlider.vue').default);
 Vue.component('product', require('./components/partials/product.vue').default);
 Vue.component('overlay', require('./components/partials/overlay.vue').default);
 Vue.component('related-products', require('./components/partials/related.vue').default);
 Vue.component('galeria', require('./components/partials/galeria.vue').default);
 Vue.component('modal-button', require('./components/partials/modalButton.vue').default);
 
 /*------panel-------------*/
 Vue.component('panel', require('./components/panel/panel.vue').default);
 Vue.component('slides-panel', require('./components/panel/slides.vue').default);
 Vue.component('products-panel', require('./components/panel/products.vue').default);
 Vue.component('galeria-panel', require('./components/panel/gallery.vue').default);
 Vue.component('sidebar', require('./components/panel/partials/sidebar.vue').default);
 Vue.component('pdv-panel', require('./components/panel/pdv.vue').default);
 
 const EventBus = new Vue()
 
 Object.defineProperties(Vue.prototype, {
   $bus: {
     get: function () {
       return EventBus
     }
   }
 })
 
 import Icon from 'vue2-svg-icon/Icon.vue';
 Vue.component('icon', Icon);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
