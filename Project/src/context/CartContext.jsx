// Holds cart state & logic (add, remove)
import { createContext, useState } from "react";

const CartContext = createContext(); //This creates a Cart Context object.
//  Create a Provider Component
export const CartProvider = ({ children }) => {
  // Initialize the Cart State
  const [cart, setCart] = useState([]);
  // Add to Cart Function
  const addToCart = (product) => {
    setCart((prev) => {
      if (prev.find((item) => item.id === product.id)) {
        console.log("🛒 Product already in cart:", product.name);
        return prev;
      }
      return [...prev, product];
    });
  };
  //Remove from Cart Function
  const removeFromCart = (id) => {
    setCart((prev) => prev.filter((item) => item.id !== id));
  };
  return (
    <CartContext.Provider value={{ cart, addToCart, removeFromCart }}>
      {children}
    </CartContext.Provider>
  );
};
export default CartContext;
