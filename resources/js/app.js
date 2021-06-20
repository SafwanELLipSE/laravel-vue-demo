require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
import Home from '../js/components/Home.vue';
import ContactList from '../js/components/ContactList.vue';
import AddContact from '../js/components/AddContact.vue';

import VueAxios from 'vue-axios';
import axios from "axios";
import Vue from 'vue';
Vue.use(VueAxios, axios);

const routes = [{
        name: '/',
        path: '/',
        component: Home
    },
    {
        name: '/contacts',
        path: '/contacts',
        component: ContactList
    },
    {
        name: '/add_contacts',
        path: '/add_contacts',
        component: AddContact
    }
];


const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");