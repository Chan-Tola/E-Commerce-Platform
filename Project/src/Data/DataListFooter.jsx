// Import the necessary icons
import { AiFillTwitterCircle, AiFillTikTok } from "react-icons/ai";
import {
  FaFacebook,
  FaInstagramSquare,
  FaPinterest,
  FaYoutube,
} from "react-icons/fa";

// Data list array
export const DataListFooter = [
  {
    id: 1,
    name: "product",
    listText: ["about", "Careers", "Brand Center", "Blog"],
  },
  {
    id: 2,
    name: "sport",
    listText: ["about", "Careers", "Brand Center", "Blog"],
  },
  {
    id: 3,
    name: "collections",
    listText: ["about", "Careers", "Brand Center", "Blog"],
  },
  {
    id: 4,
    name: "support",
    listText: ["about", "Careers", "Brand Center", "Blog"],
  },
  {
    id: 5,
    name: "campany info",
    listText: ["about", "Careers", "Brand Center", "Blog"],
  },
  {
    id: 6,
    name: "follow us",
    listText: [
      <FaFacebook />,
      <FaInstagramSquare className="rounded-full" />,
      <AiFillTwitterCircle />,
      <FaPinterest />,
      <FaYoutube />,
      <AiFillTikTok />,
    ],
  },
];
