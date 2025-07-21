import { Link } from "react-router-dom";
import { useCart } from "../../hooks/useCart";
const PaymentSummary = () => {
  const { cart } = useCart();
  const total = cart.reduce((sum, item) => sum + Number(item.price), 0);
  return (
    <main>
      <section className="bg-white rounded-lg p-3">
        <section className=" py-3 space-y-3 border-b border-dashed">
          <div className="flex justify-between font-normal items-center">
            <span className="text-gray-900"> {cart.length} item </span>
            <span>$ {total.toFixed(2)} </span>
          </div>
          <div className="flex justify-between font-bold items-center">
            <span className="text-gray-900">Total</span>
            <span>$ {total.toFixed(2)} </span>
          </div>
        </section>
        <section className="flex justify-center items-center mt-3">
          <Link
            to="/us/checkout"
            className="py-3 uppercase text-start px-4 bg-gray-900 w-full text-white rounded-sm "
          >
            checkout
            {/* this is checkout for create transition */}
          </Link>
        </section>
      </section>
    </main>
  );
};
export default PaymentSummary;
