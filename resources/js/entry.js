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
import StepOne from './views/form/StepOne';
import StepTwo from './views/form/StepTwo';
import StepThree from './views/form/StepThree';

const store = new Vuex.Store({
    state: {
        destinations: {},
        stepData: {
            progressValue: 0,
            step: 1,
            isDisabled: true,
        },
        selections: {},
    },

    getters: {
        progressValue: state => {
            return state.stepData.progressValue;
        },

        currentStep: state => {
            return state.stepData.step;
        },

        isDisabled: state => {
            return state.stepData.isDisabled;
        },
    },

    mutations: {
        updateDestinations(state, payload) {
            const destination = payload.destination;

            Vue.set(state.destinations, destination.id, destination);
        },

        updateSelections(state, payload) {
            state.selections = { ...payload.selections, ...state.selections }
        },

        updateStepData(state, payload) {
            state.stepData = payload.stepData;
        },

        clearSelections(state) {
            state.selections = {};
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
            path: '/form-step-one',
            name: 'stepOne',
            component: StepOne,
        },
        {
            path: '/form-step-two',
            name: 'stepTwo',
            component: StepTwo,
        },
        {
            path: '/form-step-three',
            name: 'stepThree',
            component: StepThree,
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
