import { useCart } from "../../hooks/useCart";
import { MdClear } from "react-icons/md";
const CartItem = () => {
  const { cart, removeFromCart } = useCart();
  console.log(cart.price);
  const total = cart.reduce((sum, item) => sum + Number(item.price), 0);
  return (
    <>
      <section className="uppercase text-xs mb-4">
        total: ({cart.length} item)
        <span className="font-semibold"> ${total.toFixed(2)}</span>
      </section>
      {cart.map((item) => {
        return (
          <div
            key={item.id}
            className="flex my-1 justify-between items-center gap-2 border border-black py-4 px-2 flex-wrap md:flex-nowrap  "
          >
            <div className="flex gap-3 items-center justify-center md:justify-normal basis-full md:basis-3/5">
              <div className="w-40 aspect-square rounded-lg overflow-hidden">
                <img
                  src={`http://localhost:8000/${item.image}`}
                  alt={item.name}
                  className="w-full h-full object-cover"
                />
              </div>
              {/* <div>
                <p className="text-xl">{item.name}</p>
                <p>
                  <span className="text-gray-400">Color:</span> {item.name}
                </p>
                <p>
                  <span className="text-gray-400">Size:</span> {item.name}
                </p>
              </div> */}
            </div>
            <p>
              {/* {(item.price * count).toFixed(2)} */}
              {item.price}
              <span>$</span>
            </p>
            {/* <div>
              <span className="text-gray-400">Count: </span>
              <input
                type="number"
                value={count}
                className="border outline-none w-14 h-10 text-center rounded-lg"
                onChange={(event) => this.changeCount(event, id)}
              />
            </div> */}
            <MdClear
              className="w-6 h-6 cursor-pointer  mr-4"
              onClick={() => removeFromCart(item.id)}
            />
          </div>
        );
      })}
    </>
  );
};

export default CartItem;
