import { FaArrowLeft, FaArrowRight, FaRegHeart } from "react-icons/fa";
import { useEffect, useRef, useState } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { Link } from "react-router-dom";
// API serverice
import { getAllProducts } from "../services/ProductService";

const Cards = () => {
  const sliderRef = useRef(null);
  const [products, setProducts] = useState([]);
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024, // Tablets
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768, // Mobile Landscape
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480, // Mobile Portrait
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const data = await getAllProducts();
        setProducts(data);
      } catch (err) {
        console.log("Error Fetching products :", err);
      }
    };
    fetchProducts();
  }, []);
  return (
    <div className="relative w-full px-4 ">
      <button className="text-xl font-bold my-[2rem] uppercase border-2 border-black px-6 py-2 tracking-wider transition-all duration-200 hover:bg-black hover:text-white">
        Best Sellers
      </button>

      {/* Slider */}
      <Slider ref={sliderRef} {...settings}>
        {products.map(({ id, image, name, price }) => {
          return (
            <div
              key={id}
              className="p-4 w-full flex flex-col items-center transition-transform duration-200 hover:scale-105 "
            >
              <Link to={id.toString()}>
                <figure className="relative w-[280px] md:w-[250px] sm:w-[220px] h-[350px] bg-gray-100 shadow-md rounded-lg overflow-hidden">
                  <img
                    src={`http://localhost:8000/${image}`}
                    alt={name}
                    className="h-full w-full object-cover"
                  />
                  {/* Wishlist Button */}
                  <button className="absolute top-3 right-3 text-gray-600 bg-white p-2 rounded-full shadow hover:bg-gray-300 transition">
                    <FaRegHeart />
                  </button>
                  {/* Price */}
                  <div className="absolute bottom-1 left-1 rounded-sm bg-white/90 p-3 ">
                    <span className="text-sm  text-gray-800">${price}</span>
                  </div>
                </figure>
              </Link>
              {/* Product Name */}
              <p className="mt-3 text-sm md:text-xs font-semibold text-gray-800 tracking-wide uppercase text-center">
                {name}
              </p>
              {/* Detail Button */}
              {/* <Link
                to={id.toString()}
                className="mt-2 bg-black text-white px-4 py-2 text-sm md:text-xs font-medium rounded-md transition hover:bg-gray-800"
              >
                Detail
              </Link> */}
            </div>
          );
        })}
      </Slider>

      {/* Custom Navigation Buttons */}
      <button
        onClick={() => sliderRef.current.slickPrev()}
        className="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-md text-gray-700 hover:bg-gray-200 transition z-10"
      >
        <FaArrowLeft />
      </button>
      <button
        onClick={() => sliderRef.current.slickNext()}
        className="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-md text-gray-700 hover:bg-gray-200 transition z-10"
      >
        <FaArrowRight />
      </button>
    </div>
  );
};

export default Cards;
