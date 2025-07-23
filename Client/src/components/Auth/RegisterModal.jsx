import { useState } from "react";
const RegisterModal = ({ onRegister }) => {
  // 1. Set up component state
  const [formData, setFromData] = useState({
    name: "",
    email: "",
    password: "",
    phone: "",
    address: "",
  });


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
    onRegister(formData);
  };
  return (
    <>
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
      </form>
    </>
  );
};

export default RegisterModal;
