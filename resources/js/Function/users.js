import axios from 'axios';
const strings = require('../Strings');


export const getUsers = () => axios.get(strings.uriApiUsers)


export const storeUsers = (data) =>  axios.post(`${strings.uriApiUsers}`,data)
