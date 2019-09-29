var {getArtigos,Update,Store} = require('../Function/artigos');
const ARTIGOS  = 'ARTIGOS';
const MESSAGE = 'MESSAGE';
const ERR = 'ERR';
import axios from 'axios';
const URI = 'http://localhost:8000/api/search';

const state = {
    items:[],
    message:'',
    err:''
}

const mutations = {
    [ARTIGOS](state, ...params){

        params[0].forEach(element => {
            state.items.push(element)
        });

    },

    [MESSAGE](state, ...params){
         state.message = params[0].message;
         state.err = params[0].error;
         localStorage.setItem('mensagem',state.message);
         localStorage.setItem('error',state.err);

    },
}

const actions = {
    getAll({commit}){
      getArtigos()
      .then(data => {commit(ARTIGOS,data.data)})
      .catch(function(err) {
        console.log('Fetch Error :-S', err);
      });

    },

    storeArtigos({commit},data){
        Store(data)
             .then(data => {
                   commit(MESSAGE,data.data);
                   window.location.href  = 'http://localhost:8000/admin/artigos'
             })
             .catch(err => console.log(err));
    },


    updateArtigos({commit},data){
       Update(data)
                .then(data => {
                         commit(MESSAGE,data.data);
                         window.location.href  = 'http://localhost:8000/admin/artigos'

                })
                .catch(err => console.log(err));

    }
}

const getters = {
       artigos: () => {
        //    console.log(state.items[0]);
           return state.items;
       },

       message:() => {
            return state.message;
       },

       error:() => {
           return state.err;
       }
}





export const Artigos = {
    namespaced : true,
    state,
    mutations,
    actions,
    getters

}

// export default Artigos;
