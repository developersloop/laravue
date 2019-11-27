import Vue from 'vue';


import Navbar from '../Navbar/Navbar.vue';
import Painel from '../Painel/PainelComponent.vue';
import Card from '../Cards/CardComponent.vue';
import Grid from '../Grid/GridComponent.vue';
import List from '../TabelaList/TabelaList.vue';
import Lista from '../TabelaListArtigos/TabelaListArtigos.vue';
import Migalhas from '../Migalhas/Migalhas.vue';
import Formulario  from '../Formulario/Formulario.vue';
import FormularioUser from '../Users/FormularioUser.vue';
// import FormularioArtigos from '../Formularios/Formulario.vue';
// import Editar from '../Crud/Edit.vue';
import Editar from '../Users/EditUser.vue'
import Details from '../Details/details.vue';
import Input from '../Input/Input.vue';
import Label from '../Label/Label.vue';
import Button from '../Button/Button.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
export const Componets = [
                        Vue.component('Navbar',Navbar),
                        Vue.component('Painel',Painel),
                        Vue.component('Card',Card),
                        Vue.component('Grid',Grid),
                        Vue.component('List',List),
                        Vue.component('Lista',Lista),
                        Vue.component('Migalhas',Migalhas),
                        Vue.component('Formulario',Formulario),
                        // Vue.component('FormularioArtigos',FormularioArtigos),
                        Vue.component('Formulariouser',FormularioUser),
                        // Vue.component('Editar',Editar),
                        Vue.component('Editar',Editar),
                        Vue.component('Details',Details),
                        Vue.component('Input',Input),
                        Vue.component('Label',Label),
                        Vue.component('Button',Button),
                        Vue.component('font-awesome-icon', FontAwesomeIcon)

]

