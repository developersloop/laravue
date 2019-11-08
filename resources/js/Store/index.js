import Vue from 'vue';
import Vuex from 'vuex';
import { Artigos } from '../Store/artigos';
import { Users } from '../Store/users';

Vue.use(Vuex);


export default new Vuex.Store({
    strict: false,
     modules: {
          Artigos,
          Users
     }

})
