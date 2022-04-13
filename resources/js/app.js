require('./bootstrap');
window.Vue = require('vue').default;

import Vue from "vue"


window.Vue = require('vue').default;
window.axios = require('axios');



//... configure axios...

Vue.prototype.$http = window.axios;



Vue.component('user-home', require('./components/user/Home.vue').default);
Vue.component('user-about', require('./components/user/About.vue').default);


Vue.component('user-header', require('./components/user/temp/header.vue').default);

Vue.component('user-preloader', require('./components/user/temp/Preloader.vue').default);
Vue.component('user-footer', require('./components/user/temp/footer.vue').default);
Vue.component('user-search', require('./components/user/temp/Search.vue').default);

const app = new Vue({
}).$mount('#app')


