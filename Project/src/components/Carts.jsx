// import { useState } from "react";
import { BsBag } from "react-icons/bs";
const handleOpen = () => setOpen((cur) => !cur);
const Carts = () => {
  return (
    <>
      <span onClick={handleOpen} className="text-black bg-transparent">
        <BsBag />
      </span>
      <h1>hello world</h1>
    </>
  );
};

export default Carts;
