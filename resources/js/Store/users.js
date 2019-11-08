const {getUsers} = require('../Function/users');

const USERS = 'USERS';

const state = {
   users:[]
}

const mutations = {
   [USERS](state, ...params){

        localStorage.setItem('titles',JSON.stringify(params[0][0]));
        params[0].forEach(element => {
            state.users.push(element)
        });
   }
}

const actions = {
    getAll({commit}){
        getUsers()
                .then(data => commit('USERS',data.data))
                .catch(err => console.log(err))
    }
}

const getters = {
     data: () => {
           return state.users;
     }
}



export const Users = {
     namespaced: true,
     state,
     mutations,
     actions,
     getters
}
