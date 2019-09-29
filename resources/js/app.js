
require('./bootstrap');
window.Vue = require('vue');

// import vue
import Vuex from 'vuex';
import store  from './Store/index';
import strict from './Store/index'


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Navbar',require('./components/Navbar/Navbar.vue').default)
Vue.component('Painel',require('./components/Painel/PainelComponent.vue').default)
Vue.component('Card',require('./components/Cards/CardComponent.vue').default)
Vue.component('Grid',require('./components/Grid/GridComponent.vue').default)
Vue.component('List',require('./components/TabelaList/TabelaList.vue').default)
Vue.component('Migalhas',require('./components/Migalhas/Migalhas.vue').default)
Vue.component('Formulario',require('./components/Formulario/Formulario.vue').default)
Vue.component('Editar',require('./components/Crud/Edit.vue').default)
Vue.component('Details',require('./components/Details/details.vue').default)



const app = new Vue({
    el: '#app',
    store,
});
