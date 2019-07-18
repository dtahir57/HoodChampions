
require('./bootstrap');

import '@/css/select.css';
import '@/css/master.css';
import '@/font-awesome/css/all.css';

import Vue from 'vue';
import router from './routes'
import store from './store'
import VeeValidate from 'vee-validate'

Vue.use(VeeValidate);

Vue.component('app', require('@/App.vue').default);

const app = new Vue({
	store: store,
    el: '#app',
    router: router
});
