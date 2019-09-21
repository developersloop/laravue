import Vue from 'vue';
import Vuex from 'vuex';
import {Artigos} from '../Store/artigos';

Vue.use(Vuex);




export default new Vuex.Store({
    strict: false,
     modules: {
          Artigos
     }

})
