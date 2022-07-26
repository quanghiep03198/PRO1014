-- CRUD product admin
-- thêm sản phẩm
INSERT INTO product (prod_name, cate_id, image, price, description, discount, stock, warranty_time, manu_id) 
VALUES (?,?,?,?,?,?,?,?,?);

-- sửa sản phẩm
UPDATE product
SET prod_name = ? ,
cate_id = ? ,
image =?,
price = ?,
description = ? ,
discount = ? ,
stock = ?,
warranty_time = ?,
manu_id = ?
WHERE id = ?;

-- xóa sản phẩm
DELETE FROM product WHERE id = ?;

-- FEATURE CHO KHÁCH HÀNG
-- tìm kiếm sản phẩm theo key word
SELECT * FROM product 
INNER JOIN product_category ON product.cate_id = product_category.id
INNER JOIN manufacturer ON product.man_id = manufacturer.id
WHERE product.prod_name LIKE '%?%' OR 
	  product_category.name LIKE '%?%' OR 
      manufacturer.name LIKE '%?%'; 

-- Lấy ra tất sản phẩm (phân trang)
SELECT * FROM product 
ORDER BY (price- price * discount) ASC 
LIMIT 0, 10

-- lấy ra sản phẩm có trong danh mục và nhà sản xuất tương ứng
SELECT * FROM product 
INNER JOIN product_category ON product.cate_id = product_category.id
INNER JOIN manufacturer ON product.man_id = manufacturer.id
WHERE product.cate_id = ? AND  manufacturer.id = ?
ORDER BY (price- price * discount) ASC ;

-- lọc sản phẩm theo danh mục và có hãng sản xuất là x
SELECT * FROM product INNER JOIN manufacturer ON product.man_id = manufacturer.id;

-- lấy danh sách sản phẩm đang giảm giá
SELECT * FROM product WHERE discount > 0;


--- lấy ra sản phẩm được giảm giá
SELECT * FROM product ORDER BY discount DESC LIMIT 0,10;

-- thêm feedback của khách hàng về sản phẩm
INSERT INTO product_feedback (product_id,user_id,pr_review_id) VALUES (?,?,?);
