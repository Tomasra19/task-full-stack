
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate'
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);
window.Vue.use(VeeValidate);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
*/

Vue.component('navbar', require('./components/Navbar.vue').default);


import Users from './components/Users';
import User from './components/User';
import EditUser from './components/EditUser';
import CreateUser from './components/CreateUser';
import UploadUser from './components/UploadUser';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Users, name: 'users'},
        {path: '/user/create', component: CreateUser, name: 'createUser'},
        {path: '/user/upload', component: UploadUser, name: 'uploadUser'},
        {path: '/user/edit/:id', component: EditUser, name: 'editUser',props: true},
        {path: '/user/:id', component: User, name: 'user', props: true},
    ],
});

const app = new Vue({
    el: '#app',
    router,
});