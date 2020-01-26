/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import store from './store/index';
import Paginate from 'vuejs-paginate';
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';
import axios from 'axios'

require('./bootstrap');
window.Vue = require('vue');
Vue.prototype.$http = axios;


//Localization
Vue.use(VueInternationalization);
const lang = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale
const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});
//End Localization
axios.defaults.baseURL = '/';

const csrf = document.head.querySelector('meta[name="csrf-token"]').content;
axios.interceptors.request.use((config) => {
    config.params = config.params || {};
    config.params['token'] = csrf;
    return config;
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
export const eventEmiter = new Vue();
const files = require.context('./', true, /\.vue$/i);

files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('paginate', Paginate);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    eventEmiter,
    i18n,
    mounted(){
    }
});

