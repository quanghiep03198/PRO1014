-- CRUD product admin
-- thêm sản phẩm
INSERT INTO product (product_name, cate_id, product_img, price, description, discount, stock, warranty_time, manu_id) 
VALUES (?,?,?,?,?,?,?,?,?);

-- sửa sản phẩm
UPDATE product
SET product_name = ? ,
cate_id = ? ,
product_img =?,
price = ?,
description = ? ,
discount = ? ,
stock = ?,
warranty_time = ?,
manu_id = ?
WHERE product_id = ?;

-- xóa sản phẩm
DELETE FROM product WHERE product_id = ?;

-- FEATURE CHO KHÁCH HÀNG
-- tìm kiếm sản phẩm theo key word
SELECT * FROM product 
INNER JOIN product_category ON product.cate_id = product.cate_id
INNER JOIN manufacturer ON product.manu_id = manufacturer.manu_id
WHERE product.product_name LIKE '%kw%' OR 
	product_category.cate_name LIKE '%kw%' OR 
    manufacturer.manu_name LIKE '%kw%'; 

-- Lấy ra tất sản phẩm (phân trang)
SELECT * FROM product 
ORDER BY (price- price * discount) ASC 
LIMIT 0, 10

-- lấy ra sản phẩm có trong danh mục và nhà sản xuất tương ứng
SELECT * FROM product 
INNER JOIN product_category ON product.cate_id = product.cate_id
INNER JOIN manufacturer ON product.manu_id = manufacturer.manu_id
WHERE product.cate_id = ? AND  manufacturer.MANU_ID = ?
ORDER BY (price- price * discount) ASC ;

-- lọc sản phẩm theo danh mục và có hãng sản xuất là x
SELECT * FROM product INNER JOIN manufacturer ON product.MANU_ID = manufacturer.MANU_ID;

-- lấy danh sách sản phẩm đang giảm giá
SELECT * FROM product WHERE DISCOUNT > 0;


--- lấy ra sản phẩm được giảm giá
SELECT * FROM product ORDER BY DISCOUNT DESC LIMIT 0,10;

-- thêm feedback của khách hàng về sản phẩm