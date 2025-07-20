import axios from "axios";
import { useState } from "react";
const Register = () => {
  // 1. Set up component state
  const [formData, setFromData] = useState({
    name: "",
    email: "",
    password: "",
    phone: "",
    address: "",
  });
  // create message to show that success or not
  const [message, setMessage] = useState("");

  // 2. Create input change handler
  const handleChange = (e) => {
    setFromData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };
  //3. Create form submit handler
  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      // api [http://localhost:8000/api/register]
      const response = await axios.post(
        "http://localhost:8000/api/register",
        formData
      );
      //   setMessage("✅ Registration successful!");
      console.log(response.data);

      // ✅ Clear the form
      setFromData({
        name: "",
        email: "",
        password: "",
        phone: "",
        address: "",
      });
    } catch {
      if (error.response && error.response.data) {
        const errors = Object.values(error.response.data).flat().join(", ");
        setMessage("❌ Error: " + errors);
      } else {
        setMessage("❌ An unknown error occurred.");
      }
    }
  };

  //   4. Add form JSX with Tailwind styles
  return (
    <div className="max-w-md mx-auto m-32 p-6 bg-white rounded-lg border border-black shadow-lg shadow-gray-400/30">
      <h1 className="text-3xl font-bold mb-6 text-center text-gray-900">
        Register
      </h1>
      {/* show message
      {message && (
        <div
          className={`mb-4 p-4 rounded-lg text-sm text-white text-center font-semibold
      ${message.startsWith("✅") ? "bg-green-600" : "bg-red-600"}
    `}
        >
          {message}
        </div>
      )} */}

      <form onSubmit={handleSubmit}>
        {/* Name */}
        <label
          className="block mb-2 font-semibold text-gray-800"
          htmlFor="name"
        >
          Name
        </label>
        <input
          type="text"
          id="name"
          name="name"
          value={formData.name}
          onChange={handleChange}
          className="w-full px-3 py-2 mb-4 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
          placeholder="Your full name"
          required
        />

        {/* Email */}
        <label
          className="block mb-2 font-semibold text-gray-800"
          htmlFor="email"
        >
          Email
        </label>
        <input
          type="email"
          id="email"
          name="email"
          value={formData.email}
          onChange={handleChange}
          className="w-full px-3 py-2 mb-4 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
          placeholder="Your email address"
          required
        />

        {/* Password */}
        <label
          className="block mb-2 font-semibold text-gray-800"
          htmlFor="password"
        >
          Password
        </label>
        <input
          type="password"
          id="password"
          name="password"
          value={formData.password}
          onChange={handleChange}
          className="w-full px-3 py-2 mb-4 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
          placeholder="Choose a strong password"
          required
        />

        {/* Phone */}
        <label
          className="block mb-2 font-semibold text-gray-800"
          htmlFor="phone"
        >
          Phone
        </label>
        <input
          type="text"
          id="phone"
          name="phone"
          value={formData.phone}
          onChange={handleChange}
          className="w-full px-3 py-2 mb-4 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
          placeholder="Your phone number"
        />

        {/* Address */}
        <label
          className="block mb-2 font-semibold text-gray-800"
          htmlFor="address"
        >
          Address
        </label>
        <input
          type="text"
          id="address"
          name="address"
          value={formData.address}
          onChange={handleChange}
          className="w-full px-3 py-2 mb-6 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
          placeholder="Your address"
        />

        <button
          type="submit"
          className="w-full bg-black hover:bg-gray-900 text-white py-3 rounded-lg font-semibold transition"
        >
          Register
        </button>
        <button>Login</button>
      </form>
    </div>
  );
};
export default Register;
