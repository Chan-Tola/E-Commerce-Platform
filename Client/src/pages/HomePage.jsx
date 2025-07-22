import { Cards, BannerSlides, PopularRightnow } from "../components/Index";

const HomePage = () => {
  return (
    <>
      <section>
        <BannerSlides />
      </section>
      <section className="max-w-[1520px] w-full mx-auto px-4 md:px-8 lg:px-16">
        <Cards />
        <PopularRightnow />
      </section>
    </>
  );
};

export default HomePage;
