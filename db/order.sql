-- thêm mới đơn hàng
INSERT INTO orders (order_id,user_id,user_name,address,create_date,phone,order_stt_id,shipping_method_id,payment_method_id,total_amount,email) 
VALUES (?,?,?,?,?,?,?,?,?,?,?);

-- thêm đơn hàng chi tiết vào đơn hàng
INSERT INTO order_items(order_parent_id,product_id,unit_price,quantity,total)
VALUES (?,?,?,?,unit_price*quantity);

-- update trạng thái đơn hàng
UPDATE orders 
SET order_stt_id = ? 
WHERE order_parent_id = ?;

-- lấy ra ngày hết hạn bảo hành 1 đơn hàng theo email/số điện thoại & tên người đặt hàng gần giống với tên nhập vào từ input
SELECT order_items.warranty_time,orders.* 
FROM orders INNER JOIN order_items
ON orders.order_parent_id = order_items.order_parent_id 
WHERE (orders.phone LIKE '%?%' OR orders.email LIKE '%?')
AND orders.user_name LIKE '%?%';