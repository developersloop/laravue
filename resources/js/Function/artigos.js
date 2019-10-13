import axios from 'axios';

const URI = 'http://localhost:8000/api/search';
 export const getArtigos = function(){
    return axios.
    get(URI,{
      headers: {
         'Access-Control-Allow-Origin': '*',
       },
       proxy: {
         host: 'http://localhost:8080/',
         port: 8080
       }
    })
    //   return axios(URI)

}

export const Update = function(data){
    const id = data.id;
   return axios.put(`http://localhost:8000/api/artigos/update/${id}`,data)

}

export const Store = function(data){
      return axios.post(`http://localhost:8000/api/artigos/store`,data)
}

export const Trash = function(id){
    return axios.get(`http://localhost:8000/api/artigos/delete/${id}`)
}

export const artigoShow = function(id){
    return axios.get(`http://localhost:8000/api/artigos/show/${id}`)
}






