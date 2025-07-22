import { useState } from "react";
import { BsBag } from "react-icons/bs";
import { Link } from "react-router-dom";
import { useCart } from "../../hooks/useCart";

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
      <section className="relative ">
        <Link to="cast" className="text-black  transition">
          <BsBag />
        </Link>
        <span className="absolute translate-x-2 -translate-y-8 w-5 h-5 rounded-full bg-blue-700 text-white font-bold text-sm flex items-center justify-center">
          {cart.length}
        </span>
      </section>
    </>
  );
};
export default Carts;
