-- thêm mới đơn hàng
INSERT INTO orders (order_id,user_id,user_name,shipping_address,phone,order_stt_id,shipping_method_id,payment_method_id,total_amount,email) 
VALUES (?,?,?,?,?,?,?,?,?,?);

-- thêm đơn hàng chi tiết vào đơn hàng
INSERT INTO order_items(orders.id,product.id,unit_price,quantity,total,warranty_time)
VALUES (?,?,?,?,unit_price*quantity,DATE_ADD(current_date(), INTERVAL 1 year));

-- update trạng thái đơn hàng
UPDATE orders 
SET order_stt_id = ? 
WHERE id = ?;

-- lấy ra ngày hết hạn bảo hành 1 đơn hàng theo email/số điện thoại & tên người đặt hàng gần giống với tên nhập vào từ input
SELECT product.image,orders.order_id,orders.user_name
FROM orders INNER JOIN order_items
ON orders.id = order_items.order_id 
INNER JOIN product ON order_items.product_id = product.id
WHERE orders.phone = '?' AND orders.email = '?';