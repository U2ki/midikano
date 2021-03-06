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

import VModal from 'vue-js-modal'
Vue.use(VModal);

import VueLazyload from 'vue-lazyload';
Vue.use(VueLazyload, {
    preLoad: 1.3, // 事前ロードする高さの割合指定
    error: '../assets/noimage.png', // エラー時に表示する画像指定
    loading: '../assets/loading.gif', // ロード中に表示する画像指定
    attempt: 1 // ロード失敗した時のリトライの上限指定
});

import VueThreeSixty from 'vue-360'
import 'vue-360/dist/css/style.css'
Vue.use(VueThreeSixty)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vc-navbar', require('./components/Navbar').default);
Vue.component('vc-footer', require('./components/Footer').default);
Vue.component('vc-top', require('./components/Top').default);
Vue.component('vc-error', require('./components/Error').default);
Vue.component('vc-gallery', require('./components/gallery/Gallery').default);
Vue.component('vc-gallery-create', require('./components/gallery/Create').default);
Vue.component('vc-gallery-show', require('./components/gallery/Show').default);
Vue.component('vc-lacquerware', require('./components/Lacquerware').default);
Vue.component('vc-news', require('./components/news/News').default);
Vue.component('vc-news-create', require('./components/news/Create').default);
Vue.component('vc-news-show', require('./components/news/Show').default);
Vue.component('vc-contact', require('./components/Contact').default);
Vue.component('vc-home', require('./components/Home').default);
Vue.component('vc-status', require('./components/Status').default);
Vue.component('vc-user', require('./components/User').default);

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
