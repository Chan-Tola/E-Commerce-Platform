import { createBrowserRouter, RouterProvider } from "react-router-dom";

import RootLayout from "./layouts/RootLayout";
import { HomePage, CardDetail, Register } from "./pages/Index";
const Routers = createBrowserRouter([
  {
    path: "/us",
    element: <RootLayout />,
    children: [
      // this is the homePage
      {
        index: true,
        element: <HomePage />,
      },
      {
        path: "men",
        element: <h1>Men Page</h1>,
      },
      {
        path: "women",
        element: <h1>women Page</h1>,
      },
      {
        path: "kid",
        element: <h1>Kid Page</h1>,
      },
      {
        path: "sale",
        element: <h1>Sale Page</h1>,
      },
      {
        path: "new & trendings",
        element: <h1>Trending Page</h1>,
      },
      {
        path: ":id",
        element: <CardDetail />,
      },
      // register path
      {
        path: "register",
        element: <Register />,
      },
    ],
  },
]);
const App = () => {
  return <RouterProvider router={Routers} />;
};

export default App;
