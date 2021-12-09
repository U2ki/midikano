/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jmap');

window.Vue = require('vue').default;

import jQuery from 'jquery'
global.jquery = jQuery
global.$ = jQuery
window.$ = window.jQuery = require('jquery')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import Vuetify from 'vuetify';
Vue.use(Vuetify);

import VueMq from 'vue-mq'
Vue.use(VueMq, {
    breakpoints: {
        sm: 960, // pc-min
        md: 1250,
        lg: Infinity,
    },
    defaultBreakpoint: 'md'
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vc-navbar', require('./components/Navbar.vue').default);
Vue.component('vc-footer', require('./components/Footer.vue').default);
Vue.component('vc-lacquerware', require('./components/Lacquerware').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        iconfont: 'mdi', //追記
    })
});
