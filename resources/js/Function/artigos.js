import axios from 'axios';
const string  = require('../Strings');
// const URI = 'http://localhost:8000/api/search';


 export const getArtigos = (id) => axios.get(`${string.uriApiArtigos}?page=${id}`)

export const Update = function(data){
    const id = data.id;
   return axios.put(`${string.uriApiArtigos}/update/${id}`,data)

}

export const Store = function(data){
      return axios.post(`${string.uriApiArtigos}/store`,data)
}

export const Trash = function(id){
    return axios.get(`${string.uriApiArtigos}/delete/${id}`)
}

export const artigoShow = function(id){
    return axios.get(`${string.uriApiArtigos}/show/${id}`)
}






