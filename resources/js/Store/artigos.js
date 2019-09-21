var {getArtigos} = require('../Function/artigos');
const ARTIGOS  = 'ARTIGOS';
import axios from 'axios';
const URI = 'http://localhost:8000/api/search';

const state = {
    items:[]
}

const mutations = {
    [ARTIGOS](state, ...params){

        params[0].forEach(element => {
            state.items.push(element)
        });

    }
}

const actions = {
    getAll({commit}){
      getArtigos()
      .then(data => {commit(ARTIGOS,data.data)})
      .catch(function(err) {
        console.log('Fetch Error :-S', err);
      });

    }
}

const getters = {
       artigos: () => {
        //    console.log(state.items[0]);
           return state.items;
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
