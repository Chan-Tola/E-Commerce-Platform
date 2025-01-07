import { createBrowserRouter, RouterProvider } from "react-router-dom";
import RootLayout from "./layouts/RootLayout";
import { HomePage } from "./pages/index";
const Routers = createBrowserRouter([
  {
    path: "/",
    element: <RootLayout />,
    children: [
      // this is the homePage
      {
        index: true,
        element: <HomePage />,
      },
    ],
  },
]);
const App = () => {
  return <RouterProvider router={Routers} />;
};

export default App;
