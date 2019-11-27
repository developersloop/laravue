import axios from 'axios';
const strings = require('../Strings');


export const getUsers = (id) => axios.get(`${strings.uriApiUsers}?page=${id}`)

export const Strings = () => strings.uriApiUsers

export const storeUsers = (data) =>  axios.post(`${strings.uriApiUsers}`,data)

export async function updateUsers(data){
    const id = data.id;
    const response = await axios.put(`${strings.uriApiUsers}/update/${id}`,data);
    return response;
 }

