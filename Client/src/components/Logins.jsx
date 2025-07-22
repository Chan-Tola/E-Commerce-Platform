import { useState } from "react";
import {
  Dialog,
  DialogHeader,
  DialogBody,
  IconButton,
  Typography,
} from "@material-tailwind/react";
import { FaRegUser, FaFacebook } from "react-icons/fa";
import { FcGoogle } from "react-icons/fc";
import { MdClear } from "react-icons/md";

const Logins = () => {
  const [open, setOpen] = useState(false);
  const [step, setStep] = useState(1);
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const handleOpen = () => setOpen((cur) => !cur);

  const handleContinue = (e) => {
    e.preventDefault();
    if (email) setStep(2);
  };
  const handleSubmite = (e) => {
    e.preventDefault();
    console.log("email :", email);
    console.log("password :", password);
    // Add your submit logic here
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
              log in or sign up
            </Typography>
          </div>
          <MdClear onClick={handleOpen} className="cursor-pointer" />
        </DialogHeader>
        <DialogBody className="!px-5">
          <div className="mb-6">
            <ul className="mt-3 -ml-2 flex flex-col gap-1">
              <span className="mb-4 flex items-center gap-3">
                <IconButton>
                  <FaFacebook className="text-4xl" />
                </IconButton>
                <IconButton>
                  <FcGoogle className="text-4xl" />
                </IconButton>
              </span>
              <form
                className="flex flex-col gap-3 "
                onSubmit={step === 1 ? handleContinue : handleSubmite}
              >
                {step === 1 && (
                  <div class="relative text-black w-full">
                    <input
                      type="email"
                      required
                      value={email}
                      onChange={(e) => setEmail(e.target.value)}
                      className="peer w-full bg-transparent placeholder-transparent text-slate-700 text-sm border border-black rounded-md px-3 py-4 transition duration-300 ease-in-out focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                      placeholder="Email"
                    />
                    <label className="uppercase absolute bg-white px-1 left-2.5 top-2.5 text-slate-400 text-sm transition-all transform origin-left cursor-text peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                      Email Address
                    </label>
                  </div>
                )}
                {step === 2 && (
                  <div class="relative text-black w-full">
                    <input
                      type="password"
                      required
                      value={password}
                      onChange={(e) => setPassword(e.target.value)}
                      className="peer w-full bg-transparent placeholder-transparent text-slate-700 text-sm border border-black rounded-md px-3 py-4 transition duration-300 ease-in-out focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                      placeholder="Password"
                    />
                    <label className="uppercase absolute bg-white px-1 left-2.5 top-2.5 text-slate-400 text-sm transition-all transform origin-left cursor-text peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                      Password
                    </label>
                  </div>
                )}
                <button
                  type="submit"
                  className="relative w-[200px] bottom-0 flex justify-center items-center gap-2 border border-[#000] rounded-xl text-[#FFF] font-black bg-[#000] uppercase px-8 py-4 z-10 overflow-hidden ease-in-out duration-700 group hover:text-[#000] hover:bg-[#FFF] active:scale-95 active:duration-0 focus:bg-[#FFF] focus:text-[#000] isolation-auto before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-[#FFF] before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700"
                >
                  <span className="truncate eaes-in-out duration-300 group-active:-translate-x-96 group-focus:translate-x-96">
                    {step === 1 ? "Continue" : "Login"}
                  </span>
                  {/* place where for loading */}
                  {/* <div className="absolute flex flex-row justify-center items-center gap-2 -translate-x-96 eaes-in-out duration-300 group-active:translate-x-0 group-focus:translate-x-0">
                    <div className="animate-spin size-4 border-2 border-[#000] border-t-transparent rounded-full" />
                    Processing...
                  </div> */}
                  <svg
                    className="fill-[#FFF] group-hover:fill-[#000] group-hover:-translate-x-0 group-active:translate-x-96 group-active:duration-0 group-focus:translate-x-96 group-focus:fill-[#000] ease-in-out duration-700"
                    stroke="currentColor"
                    fill="currentColor"
                    strokeWidth={0}
                    viewBox="0 0 512 512"
                    height={16}
                    width={16}
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="m476.59 227.05-.16-.07L49.35 49.84A23.56 23.56 0 0 0 27.14 52 24.65 24.65 0 0 0 16 72.59v113.29a24 24 0 0 0 19.52 23.57l232.93 43.07a4 4 0 0 1 0 7.86L35.53 303.45A24 24 0 0 0 16 327v113.31A23.57 23.57 0 0 0 26.59 460a23.94 23.94 0 0 0 13.22 4 24.55 24.55 0 0 0 9.52-1.93L476.4 285.94l.19-.09a32 32 0 0 0 0-58.8z" />
                  </svg>
                </button>
              </form>
            </ul>
          </div>
        </DialogBody>
      </Dialog>
    </>
  );
};
export default Logins;
