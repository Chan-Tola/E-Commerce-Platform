import { createBrowserRouter, RouterProvider } from "react-router-dom";
import RoutLayout from "./layouts/RoutLayout";
RoutLayout;
const App = () => {
  const Routes = createBrowserRouter([
    {
      path: "/",
      element: <RoutLayout />,
      children: [
        {
          index: true,
          element: <h1>Hellowldword</h1>,
        },
        {
          path: "about",
          element: <h2>about</h2>,
        },
      ],
    },
  ]);
  return <RouterProvider router={Routes} />;
};

export default App;
