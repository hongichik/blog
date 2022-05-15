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

import addPosts from './components/admin/posts/addPosts.vue';
import addChildPost from './components/admin/posts/addChildPost.vue';
import posts from './components/admin/posts/posts.vue';
import AllPosts from './components/admin/posts/AllPosts.vue';
import editPost from './components/admin/posts/editPost.vue';

import Feedback from './components/admin/Feedback/Feedback.vue';

import newPermission from './components/admin/Permission/newPermission.vue';
import EditPermission from './components/admin/Permission/EditPermission.vue';
import ListPermission from './components/admin/Permission/ListPermission.vue';

export const routes = [
    {
        path: '/ListPermission',
        component: ListPermission
    },
    {
        path: '/EditPermission/:id',
        component: EditPermission
    },
    {
        path: '/newPermission',
        component: newPermission
    },
    {
		path: '/Feedback',
        component: Feedback
    },
    {
		path: '/editPost/:id/:type',
        component: editPost
    },
    {
		path: '/AllPosts',
        component: AllPosts
    },
    {
		path: '/posts',
        component: posts
    },
    {
		path: '/addChildPost/:id/:type',
        component: addChildPost
    },
    {
		path: '/addPosts/:name/:id/:type',
        component: addPosts
    },
    {
		path: '/NewCategory',
        component: NewCategory
    },
    {
		path: '/EditCategory/:id',
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
        component: Home,
        name: 'home',
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


