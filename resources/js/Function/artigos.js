import axios from 'axios';
const string  = require('../Strings');
// const URI = 'http://localhost:8000/api/search';


 export const getArtigos = function(){
  const URI = 'http://localhost:8081/api/search';
    return axios.
    get(URI,{
      headers: {
         'Access-Control-Allow-Origin': '*',
       },
       proxy: {
         host: 'http://localhost:8081/',
         port: 8080
       }
    })
    //   return axios(URI)

}

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






