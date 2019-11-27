import {
         getUsers,
         storeUsers,
         updateUsers
        }
        from '../Function/users';

const USERS = 'USERS';
const MESSAGE = 'MESSAGE';


const state = {
   users:[],
   all:[],
   message:'',
   err:''
}

const mutations = {
   [USERS](state, ...params){

        // localStorage.setItem('titles',JSON.stringify(params[0][0]));
        // console.log(params);
        params[0].items.forEach(element => {
            state.users.push(element)
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
    getAll({commit},id){
        getUsers(id)
                .then(data => {
                    commit('USERS',data.data)
                })
                .catch(err => console.log(err))
    },
    postUsers({commit},data){
          storeUsers(data)
                                .then(data => {
                                    commit('MESSAGE',data.data);
                                })
                                .catch(err => console.log(err))
    },

    usersUpdate({commit},data){
        updateUsers(data);          
    }
}

const getters = {
     data: () => {
           return state.users;
     },
     message:() => {
        return state.err;
   },
}



export const Users = {
     namespaced: true,
     state,
     mutations,
     actions,
     getters
}
