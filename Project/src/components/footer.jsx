import { DataListFooter } from "../Data/DataListFooter";

const Footer = () => {
  return (
    <>
      <footer className="bg-white">
        <section className="mx-auto cursor-pointer max-w-screen-xl w-full grid grid-cols-2 lg:py-8 md:grid-cols-6 gap-8 px-4 py-6">
          {DataListFooter.map((i) => {
            return (
              <div key={i.id}>
                {/* Category Name */}
                <h2 className="mb-6 text-xl font-bold uppercase">{i.name}</h2>
                <ul
                  className={`text-black uppercase ${
                    i.name === "follow us" ? "text-2xl font-bold" : "text-sm"
                  }`}
                >
                  {i.listText.map((f, index) => {
                    return (
                      <li className="mb-4" key={index}>
                        <a className="hover:underline capitalize">{f}</a>
                      </li>
                    );
                  })}
                </ul>
              </div>
            );
          })}
          {/* not yet build the small device */}
        </section>
      </footer>
    </>
  );
};

export default Footer;
