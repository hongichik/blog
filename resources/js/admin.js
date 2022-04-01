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
import Home from './components/admin/Home.vue'
import NewCategory from './components/admin/Category/NewCategory.vue'
import EditCategory from './components/admin/Category/EditCategory.vue'
import ListCategory from './components/admin/Category/ListCategory.vue'

import editContact from './components/admin/Contact/editContact.vue'

import Info from './components/admin/Info.vue'


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
		path: '/NewCategory',
        component: NewCategory
    },
    {
		path: '/EditCategory/edit-:id',
        component: EditCategory
    },
    {
		path: '/ListCategory',
        component: ListCategory
    },
    {
		path: '/editContact',
        component: editContact
    },
    {
		path: '/editInfo',
        component: Info
    },

];


export const router = new VueRouter({
    base: '/admin/',
    mode: 'history',
    routes
});



Vue.component('admin-login', require('./components/admin/temp/login.vue').default);
Vue.component('admin-sidebar', require('./components/admin/temp/sidebar.vue').default);
Vue.component('admin-main', require('./components/admin/temp/Main.vue').default);



const app = new Vue({
    router
}).$mount('#app')


