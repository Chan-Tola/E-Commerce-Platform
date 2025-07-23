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
      <main>
        <form onSubmit={handleSubmit}>
          {/* Name */}
          <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
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
            className="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="full name"
            required
          />
          {/* Email */}
          <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
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
            className="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Your email address"
            required
          />
          {/* Password */}
          <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
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
            className="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Choose a strong password"
            required
          />
          {/* Phone */}
          <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
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
            className="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Your phone number"
          />
          {/* Address */}
          <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
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
            className="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Your address"
          />
          <button
            type="submit"
            className="w-full mt-2 bg-black hover:bg-gray-900 text-white py-3 rounded-lg font-semibold transition"
          >
            Register
          </button>
        </form>
      </main>
    </>
  );
};

export default RegisterModal;
