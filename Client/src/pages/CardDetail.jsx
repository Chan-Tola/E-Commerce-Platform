import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { useCart } from "../hooks/useCart";
// API serverice
import { getPBID } from "../services/ProductService";

const CardDetail = () => {
  const { id } = useParams(); // get product ID from URL
  const [product, setProduct] = useState(null);
  const { cart, addToCart } = useCart(); // using cart context

  // get product by id
  useEffect(() => {
    const fetchProduct = async () => {
      try {
        const data = await getPBID(id);
        setProduct(data);

        if (data?.id != id) {
          console.warn("⚠️ ID mismatch between URL and API data");
        }
      } catch (err) {
        console.error("❌ Error fetching product:", err);
      }
    };
    // fetcchProduct
    fetchProduct();
  }, [id]);

  if (!product) return <div className="text-center mt-10">Loading...</div>;
  // Destructure safely
  const { name, price, image } = product;

  // check that product add to cart or not
  const isInCart = cart.some((item) => item.id === product.id);

  return (
    <div className="w-full px-4 md:px-0 py-16 ">
      <div className="flex flex-col md:flex-row justify-evenly items-center w-full gap-8 md:gap-16">
        {/* Product Image */}
        <div className="w-full md:w-auto flex justify-center">
          <img
            src={`http://localhost:8000/${image}`}
            alt={name}
            className="w-[550px] h-[550px]  object-cover shadow-md rounded-lg"
          />
        </div>

        {/* Product Details */}
        <div className="flex flex-col justify-center text-center md:text-left">
          <h1 className="text-2xl sm:text-3xl font-bold text-gray-900">
            {name}
          </h1>
          <p className="text-lg sm:text-xl font-semibold text-gray-700 mt-2">
            {price}
          </p>
          {/* Add to Cart Button */}
          <button
            onClick={() => !isInCart && addToCart(product)}
            disabled={isInCart}
            className={`mt-4 bg-black uppercase  text-white px-6 py-3 text-lg font-medium rounded-md hover:bg-gray-800 transition ${
              isInCart
                ? "bg-gray-500 cursor-not-allowed text-white"
                : "bg-black text-white hover:bg-gray-800"
            }`}
          >
            {isInCart ? "added" : "add to cart"}
          </button>
        </div>
      </div>
    </div>
  );
};

export default CardDetail;
