
require('./bootstrap');
window.Vue = require('vue');

// import vue
import Vuex from 'vuex';
import store  from './Store/index';
import router from '../js/router/index';
Vue.use(require('vue-resource'));

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { Components } from './components/VueComponents/index';


Vue.use(BootstrapVue)




const app = new Vue({
    el: '#app',
    store,
});
