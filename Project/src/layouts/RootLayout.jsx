import { Outlet } from "react-router-dom";
import { Navbar,Footer } from "../components/index";
const RootLayout = () => {
  return (
    <>
      <Navbar />
      <Outlet />
      <Footer />
    </>
  );
};

export default RootLayout;
