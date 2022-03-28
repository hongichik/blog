require('./bootstrap');
window.Vue = require('vue').default;

import Vue from "vue"
import VueRouter from "vue-router"


Vue.use(VueRouter)
window.Vue = require('vue').default;
window.axios = require('axios');

import CKEditor from 'ckeditor4-vue';

Vue.use( CKEditor );

//... configure axios...

Vue.prototype.$http = window.axios;

//Routes
import Home from './components/user/Home.vue'
import Contact from './components/user/Contact.vue'




export const routes = [

    {
		path: '*',
        component: Home,
    },
    {
		path: '/',
        component: Home
    },
	{
		path: '/home',
        component: Home
    },
    {
		path: '/contact',
        component: Contact
    },

];


export const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes
});



Vue.component('user-header', require('./components/user/temp/header.vue').default);

Vue.component('user-preloader', require('./components/user/temp/Preloader.vue').default);
Vue.component('user-footer', require('./components/user/temp/footer.vue').default);
Vue.component('user-search', require('./components/user/temp/Search.vue').default);

const app = new Vue({
    router
}).$mount('#app')


