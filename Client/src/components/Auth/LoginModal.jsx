import { useState } from "react";
import { Input, Checkbox } from "@material-tailwind/react";
const LoginModal = ({ onLogin }) => {
  const [step, setStep] = useState(1);
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  //  handle step Continue
  const handleContinue = (e) => {
    e.preventDefault();
    if (email) setStep(2);
  };
  // handle on submit
  const handleSubmite = (e) => {
    e.preventDefault();
    onLogin({ email, password });
    console.log("value email :", email);
    console.log("value password :", password);
  };
  return (
    <>
      <form
        className="flex flex-col gap-3 "
        onSubmit={step === 1 ? handleContinue : handleSubmite}
      >
        {step === 1 && (
          <section className="relative text-black w-full">
            {/* <Typography className="-mb-2" variant="h6">
              Your Email
            </Typography> */}
            <Input
              type="email"
              required
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              label="Email"
              size="lg"
            />
          </section>
        )}
        {step === 2 && (
          <section className="relative text-black w-full">
            <Input
              label="Password"
              type="password"
              required
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              size="lg"
            />
            <div className="-ml-2.5 mt-2">
              <Checkbox label="Remember Me" />
            </div>
          </section>
        )}
        <button
          type="submit"
          className="relative h-[40px] w-[200px] bottom-0 flex justify-center items-center gap-2 border border-[#000] rounded-xl text-[#FFF] font-black bg-[#000] uppercase px-8 py-4 z-10 overflow-hidden ease-in-out duration-700 group hover:text-[#000] hover:bg-[#FFF] active:scale-95 active:duration-0 focus:bg-[#FFF] focus:text-[#000] isolation-auto before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-[#FFF] before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700"
        >
          <span className="truncate eaes-in-out duration-300 group-active:-translate-x-96 group-focus:translate-x-96">
            {step === 1 ? "Continue" : "Login"}
          </span>
          {/* place where for loading */}
          <div className="absolute flex flex-row justify-center items-center gap-2 -translate-x-96 eaes-in-out duration-300 group-active:translate-x-0 group-focus:translate-x-0">
            <div className="animate-spin size-4 border-2 border-[#000] border-t-transparent rounded-full" />
            loading...
          </div>
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
    </>
  );
};
export default LoginModal;
