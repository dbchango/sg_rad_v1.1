


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'es6-promise/auto';
import axios from 'axios';
import vue from 'vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import router from './router';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';


axios.defaults.withCredentials = true
// Install BootstrapVue
vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
vue.use(IconsPlugin);
window.Vue = vue;
vue.router = router;
vue.use(VueRouter);

export const user = window.Laravel.user
export const system_date = new Date();
console.warn(window)

vue.use(VueAxios, axios);
//Doing a window ref for access in frontend

//axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app', require('./App.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('headeradmin', require('../js/lib/headeradmin.vue').default);
Vue.component('headerprof', require('../js/lib/headerprof.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Setting global headers




//JSON.parse(document.head.querySelector('meta[name="user"]').getAttribute('content'));

const app = new Vue({
    el: '#app',
    router,


});

