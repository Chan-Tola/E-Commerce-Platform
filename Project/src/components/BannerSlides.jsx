import React from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { Banners } from "../Data/BannerData";

const BannerSlides = () => {
  const settings = {
    infinite: true,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true, // Smooth fade effect
    arrows: false,
  };
  return (
    <div className="relative w-full">
      <Slider {...settings}>
        {Banners.map((slide) => (
          <div key={slide.id} className="relative w-full h-[86vh]">
            <img
              src={slide.image}
              alt={slide.title}
              className="w-full h-full object-cover"
            />
            {/* Overlay Content */}
            <div className="absolute   bottom-5 flex flex-col justify-center items-start  text-white px-6">
              <h2 className="text-4xl font-bold bg-black/50 p-2">{slide.title}</h2>
              <p className="text-lg mt-2 max-w-2xl bg-black/50 p-2">{slide.description}</p>
              <button className="mt-4 bg-white text-black px-6 py-2 text-lg font-medium rounded-md hover:bg-gray-300 transition">
                {slide.buttonText}
              </button>
            </div>
          </div>
        ))}
      </Slider>
    </div>
  );
};

export default BannerSlides;
