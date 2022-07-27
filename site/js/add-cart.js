/**
 * Thêm sản phẩm vào giỏ hàng
 */

`         <div class="absolute bottom-5 right-0 alert alert-success shadow-lg w-auto invisible">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Đã thêm vào giỏ hàng!</span>
                </div>
            </div>`;
const alertCartMessage = () => {
	setTimeout();
};
const addCart = (button) => {
	const cartItems = JSON.parse(localStorage.getItem("cart"));
	const product = {
		id: button.parentElement.querySelector(`input[name = "id"]`).value,
		name: button.parentElement.querySelector(`input[name = "name"]`).value,
		manu: button.parentElement.querySelector(`input[name = "manu"]`).value,
		img: button.parentElement.querySelector(`input[name = "img"]`).value,
		price: +button.parentElement.querySelector(`input[name = "price"]`).value,
		qty: +button.parentElement.querySelector(`input[name = "qty"]`).value,
		warranty: +button.parentElement.querySelector(`input[name = "warranty"]`).value,
	};
	product.total = product.price * product.qty;
	// kiểm tra sản phẩm đã có trong giỏ hàng chưa? nếu đã tồn tại => update lại số lượng, thành tiền
	const duplicatedItem = cartItems?.find((item) => item.id == product.id);
	if (duplicatedItem) {
		duplicatedItem.qty += product.qty;
		duplicatedItem.total = duplicatedItem.price * duplicatedItem.qty;
		cartItems[cartItems.indexOf(duplicatedItem)] = duplicatedItem;
		localStorage.setItem("cart", JSON.stringify(cartItems));
	}
	// nếu sản phẩm ko tồn tại trong giỏ hàng thì thêm mới
	else {
		cartItems.push(product);
		localStorage.setItem("cart", JSON.stringify(cartItems));
	}
	countItems();
};
/**
 *
 */
