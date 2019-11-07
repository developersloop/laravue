var {getArtigos,Update,Store,Trash,artigoShow} = require('../Function/artigos');
const strings = require('../Strings');
const ARTIGOS  = 'ARTIGOS';
const MESSAGE = 'MESSAGE';
const ERR = 'ERR';
import axios from 'axios';
const URI = 'http://localhost:8000/api/search';

const state = {
    items:[],
    message:'',
    err:'',
    pg:[],
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
      .then(response => {
        //   console.log(response.data);
                       {commit(ARTIGOS,response.data)}
                })
      .catch(function(err) {
        console.log('Fetch Error :-S', err);
      });

    },

    show({commit},id){
        artigoShow(id)
        .then(data => console.log(data))
        .catch(err => console.log(err))
    },

    storeArtigos({commit},data){
        Store(data)
             .then(data => {
                  console.log(data);
                   commit(MESSAGE,data.data);
                   window.location.href  = strings.uri
             })
             .catch(err => console.log(err));
    },


    updateArtigos({commit},data){
       Update(data)
                .then(data => {
                         commit(MESSAGE,data.data);
                         window.location.href  = strings.uri

                })
                .catch(err => console.log(err));

    },

    delete({commit},id){
        Trash(id)
        .then(data => {
                 commit(MESSAGE,data.data);
                 window.location.href  = strings.uri

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
       },

       paginacao:() => {
           return state.pg;
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
