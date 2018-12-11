/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(BootstrapVue);
Vue.use(VueRouter);
Vue.use(Vuex);

import App from './views/App';
import HolidayDestination from './components/HolidayDestination';
import Home from './components/Home';
import StepOne from './views/form-step/StepOne';

const store = new Vuex.Store({
    state: {
        destinations: {}
    },
    mutations: {
        updateDestinations(state, payload) {
            const destination = payload.destination;

            Vue.set(state.destinations, destination.id, destination);
        }
    }
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/form',
            name: 'stepOne',
            component: StepOne,
        },
        {
            path: '/holiday-destinations/:slug',
            name: 'holidayDestinations',
            component: HolidayDestination,
            props: true,
        },
    ],
});

const entry = new Vue({
    el: '#entry',
    components: { App },
    store,
    router,
});
