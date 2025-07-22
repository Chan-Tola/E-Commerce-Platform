import { CartItem, PaymentSummary } from "../components/Index";
import { useCart } from "../hooks/useCart";

const CartPage = () => {
  const { cart } = useCart();

  const isCartEmpty = !cart || cart.length === 0;

  if (isCartEmpty) {
    return (
      <main className="my-8 flex items-center justify-center">
        <section className="container shadow-lg bg-gray-50 rounded-lg p-8">
          <div className="text-center">
            <h1 className="uppercase font-bold text-2xl mb-2">
              Your bag is empty
            </h1>
            <p className="text-sm text-gray-600">
              Please go to the Home page to add products.
            </p>
          </div>
        </section>
      </main>
    );
  }

  return (
    <main className="my-8 flex items-center justify-center">
      <section className="container  p-12">
        <div className="grid grid-cols-12 gap-6">
          {/* Left: Cart Items */}
          <section className="col-span-12  lg:col-span-8">
            {/* dynamic name */}
            <section className=" w-full bg-[#ECEFF1]  mb-4 rounded-sm px-2 py-5">
              <span className="font-bold uppercase text-2xl ">
                HI, CHANTOLA
              </span>
            </section>
            <h2 className="text-3xl font-bold uppercase mb-1">Your Bag</h2>
            <CartItem />
          </section>

          {/* Right: Summary */}
          <div className="col-span-12 lg:col-span-4">
            <h2 className="text-xl font-bold uppercase mb-4">Order Summary</h2>
            <PaymentSummary />
          </div>
        </div>
      </section>
    </main>
  );
};

export default CartPage;
