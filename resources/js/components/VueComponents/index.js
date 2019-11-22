import Vue from 'vue';


import Navbar from '../Navbar/Navbar.vue';
import Painel from '../Painel/PainelComponent.vue';
import Card from '../Cards/CardComponent.vue';
import Grid from '../Grid/GridComponent.vue';
import List from '../TabelaList/TabelaList.vue';
import Migalhas from '../Migalhas/Migalhas.vue';
import Formulario  from '../Formulario/Formulario.vue';
import FormularioUser from '../Users/FormularioUser.vue';
import FormularioArtigos from '../Formularios/Formulario.vue';
import Editar from '../Crud/Edit.vue';
import Details from '../Details/details.vue';
import Input from '../Input/Input.vue';
import Label from '../Label/Label.vue';
import Button from '../Button/Button.vue';

export const Componets = [
                        Vue.component('Navbar',Navbar),
                        Vue.component('Painel',Painel),
                        Vue.component('Card',Card),
                        Vue.component('Grid',Grid),
                        Vue.component('List',List),
                        Vue.component('Migalhas',Migalhas),
                        Vue.component('Formulario',Formulario),
                        Vue.component('FormularioArtigos',FormularioArtigos),
                        Vue.component('Formulariouser',FormularioUser),
                        Vue.component('Editar',Editar),
                        Vue.component('Details',Details),
                        Vue.component('Input',Input),
                        Vue.component('Label',Label),
                        Vue.component('Button',Button)

]

