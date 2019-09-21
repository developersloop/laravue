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





