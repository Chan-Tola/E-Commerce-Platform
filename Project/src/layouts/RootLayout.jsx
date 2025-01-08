import { Outlet } from "react-router-dom";
import { Heading, Footer } from "../components/Index";
const RootLayout = () => {
  return (
    <>
      <Heading />
      <Outlet />
      <Footer />
    </>
  );
};

export default RootLayout;
