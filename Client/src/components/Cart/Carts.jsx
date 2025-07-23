import { useState } from "react";
import { BsBag } from "react-icons/bs";
import { Link } from "react-router-dom";
import { useCart } from "../../hooks/useCart";
import { Badge, Button } from "@material-tailwind/react";
const Carts = () => {
  const [showTable, setShowTable] = useState(false);
  const { cart } = useCart();
  const isCartEmpty = !cart || cart.length === 0;
  if (isCartEmpty) {
    return (
      <>
        {/* ICON WITH HOVER popup */}
        <section
          className="relative "
          onMouseEnter={() => setShowTable(true)}
          onMouseLeave={() => setShowTable(false)}
        >
          <Link to="cast" className="text-black  transition">
            <BsBag />
          </Link>
          {showTable && (
            <div className="absolute top-10 right-1/2  bg-gray-200 text-black py-6 px-10 rounded shadow-md z-20 w-80">
              <h1 className="uppercase text-center">you cart is empty</h1>
            </div>
          )}
        </section>
      </>
    );
  }
  return (
    <>
      <section>
        <Link to="cast" className="text-black transition">
          <Badge className="bg-blue-500 -top-1 -right-1" content={cart.length}>
            <BsBag />
          </Badge>
        </Link>
      </section>
    </>
  );
};
export default Carts;
