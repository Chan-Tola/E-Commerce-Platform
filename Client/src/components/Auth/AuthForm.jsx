import { useState } from "react";
import {
  Dialog,
  DialogHeader,
  DialogBody,
  IconButton,
  Typography,
} from "@material-tailwind/react";
import { MdClear } from "react-icons/md";
import { FaRegUser, FaFacebook } from "react-icons/fa";
import { FcGoogle } from "react-icons/fc";
import LoginModal from "./LoginModal";
import RegisterModal from "./RegisterModal";
import { registerUser } from "../../services/AuthService";
const AuthForm = () => {
  const [open, setOpen] = useState(false);
  // form Type
  const [formType, setFormType] = useState("login");
  // create message to show that success or not
  const [message, setMessage] = useState("");
  // function open
  const handleOpen = () => {
    setOpen((prev) => !prev);
    setFormType("login"); // Reset to login every time modal opens
  };

  // function login
  const handleLogin = (data) => {
    console.log("Login Data:", data);
    // Add your login API here
  };

  // function register
  const handleRegister = async (data) => {
    console.log("Register Data:", data);
    // Add your register API here
    try {
      const response = await registerUser(data);
      console.log("✅ Registered:", response);
      setMessage("✅ Registration successful!");
      data = null;
    } catch {
      if (error.response && error.response.data) {
        const errors = Object.values(error.response.data).flat().join(", ");
        setMessage("❌ Error: " + errors);
      } else {
        setMessage("❌ An unknown error occurred.");
      }
    }
  };

  return (
    <>
      <span onClick={handleOpen} className="text-black bg-transparent">
        <FaRegUser />
      </span>
      <Dialog size="xs" open={open} handler={handleOpen}>
        <DialogHeader className="justify-between">
          <div>
            <Typography className="text-3xl font-bold uppercase">
              {formType === "login" ? "Log In" : "Register"}
            </Typography>
          </div>
          <MdClear onClick={handleOpen} className="cursor-pointer" />
        </DialogHeader>
        <DialogBody className="!px-5">
          <div className="mb-6">
            <ul className="mt-3 -ml-2 flex flex-col gap-1">
              {formType === "login" ? (
                <>
                  <span className="mb-4 flex items-center gap-3">
                    <IconButton>
                      <FaFacebook className="text-4xl" />
                    </IconButton>
                    <IconButton>
                      <FcGoogle className="text-4xl" />
                    </IconButton>
                  </span>
                  <LoginModal onLogin={handleLogin} />
                  {/* please go to rigester */}
                  <p className="mt-4 text-sm">
                    Don’t have an account?
                    <button
                      className="text-blue-500 underline ms-1"
                      onClick={() => setFormType("register")}
                    >
                      Register
                    </button>
                  </p>
                </>
              ) : (
                <>
                  <RegisterModal onRegister={handleRegister} />
                  <p className="mt-4 text-sm">
                    Already have an account?
                    <button
                      className="text-blue-500 underline ms-1"
                      onClick={() => setFormType("login")}
                    >
                      Login
                    </button>
                  </p>
                </>
              )}
            </ul>
          </div>
        </DialogBody>
      </Dialog>
    </>
  );
};

export default AuthForm;
