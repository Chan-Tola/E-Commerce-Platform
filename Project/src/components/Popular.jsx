import { PopularData } from "../Data/PopularData";
const popularRightnow = () => {
  return (
    <div className="w-full px-4 md:px-8">
      <h2 className="text-3xl font-bold text-center my-6 uppercase">
        Popular Right Now
      </h2>
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        {PopularData.map((item) => (
          <div key={item.id} className="relative w-full h-[350px] group">
            <img
              src={item.image}
              alt={item.title}
              className="w-full h-full object-cover rounded-lg"
            />
            {/* Text Overlay */}
            <div className="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4 text-center opacity-100 transition-opacity group-hover:opacity-90">
              <h3 className="text-2xl font-bold">{item.title}</h3>
              <p className="mt-2 text-sm">{item.description}</p>
              <button className="mt-4 bg-white text-black px-6 py-2 text-lg font-medium rounded-md hover:bg-gray-300 transition">
                Shop Now
              </button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default popularRightnow;
