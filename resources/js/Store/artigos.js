var {getArtigos,Update} = require('../Function/artigos');
const ARTIGOS  = 'ARTIGOS';
const MESSAGE = 'MESSAGE';
import axios from 'axios';
const URI = 'http://localhost:8000/api/search';

const state = {
    items:[],
    message:''
}

const mutations = {
    [ARTIGOS](state, ...params){

        params[0].forEach(element => {
            state.items.push(element)
        });

    },

    [MESSAGE](state, ...params){
         state.message = params[0].error;

    }
}

const actions = {
    getAll({commit}){
      getArtigos()
      .then(data => {commit(ARTIGOS,data.data)})
      .catch(function(err) {
        console.log('Fetch Error :-S', err);
      });

    },

    updateArtigos({commit},data){
       Update(data)
                .then(data => {
                         commit(MESSAGE,data.data);

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
