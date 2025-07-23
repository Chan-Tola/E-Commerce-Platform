// src/services/authService.js
import axios from "axios";
//    "http://localhost:8000/api/register",
const API_URL = "http://localhost:8000/api"; // ពេលតភ្ជាប់ទៅ backend

// register 
export const registerUser = (data) => {
  return axios.post(`${API_URL}/register`, data);
};

// login
export const loginUser = (data)=> {
    return axios.post(`${API_URL}/login`,data);
}
export const logoutUser = (data)=> {
    return axios.post(`${API_URL}/logout`,data);
}
// logout


