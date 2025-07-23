import { CartProvider } from "../context/CartContext";
import { AuthProvider } from "../context/AuthContext";
const AppProviders = ({ children }) => {
  return (
    <AuthProvider>
      <CartProvider>{children}</CartProvider>;
    </AuthProvider>
  );
};
export default AppProviders;
