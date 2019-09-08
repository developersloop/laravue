/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Navbar',require('./components/Navbar/Navbar.vue').default)
Vue.component('Painel',require('./components/Painel/PainelComponent.vue').default)
Vue.component('Card',require('./components/Cards/CardComponent.vue').default)
Vue.component('Grid',require('./components/Grid/GridComponent.vue').default)
Vue.component('List',require('./components/TabelaList/TabelaList.vue').default)
const app = new Vue({
    el: '#app',
});
