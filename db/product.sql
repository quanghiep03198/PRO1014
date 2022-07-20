-- thêm sản phẩm
INSERT INTO product (product_name,cate_id,product_img,price,description,discount,stock,warranty_time,manu_id) 
VALUES (?,?,?,?,?,?,?,?,?);

-- sửa sản phẩm
UPDATE product
SET ?
WHERE ?;

-- xóa sản phẩm
DELETE FROM product 
WHERE PRODUCT_ID = ?;

-- lấy sản phẩm theo tên/nhà sản xuất/danh mục sản phẩm
----- Lấy theo tên -----
SELECT * FROM product WHERE product_name = ?;
----- Lấy theo nhà sản xuất -----
SELECT product.PRODUCT_NAME, manufacturer.MANU_NAME 
FROM product 
INNER JOIN manufacturer ON product.MANU_ID = manufacturer.MANU_ID;
----- Lấy theo nhà sản xuất -----
-- lấy danh sách sản phẩm đang giảm giá
SELECT * FROM product WHERE DISCOUNT > 0;
-- lấy danh sách sản phẩm được mua nhiều

-- lấy danh sách sản phẩm trong wishlist

-- lấy danh sách sản phẩm theo giá tăng/giảm dần
--- Giảm giá nhiều ---
SELECT * FROM product ORDER BY DISCOUNT DESC;

-- thêm feedback của khách hàng về sản phẩm