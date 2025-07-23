// src/services/ProdcutService.js
import axios from "axios";
const API_URL = "http://127.0.0.1:8000/api"; // ពេលតភ្ជាប់ទៅ backend
// get all products
export const getAllProducts = async () => {
  try {
    const response = await axios.get(`${API_URL}/products`);
    console.log("Data get from respone :", response);
    return response.data.data;
  } catch (error) {
    console.error("❌ Product API error:", error);
    throw error;
  }
};
// get product by id
export const getPBID = async (id) => {
  try {
    const response = await axios.get(`${API_URL}/product/${id}`);
    console.log("Data get by ID :", response);
    return response.data.data;
  } catch (error) {
    console.error("❌ Product API error:", error);
    throw error;
  }
};
