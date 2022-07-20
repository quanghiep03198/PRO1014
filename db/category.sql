-- lấy danh sách danh mục sản phẩm
SELECT * FROM * product_category;

-- thêm danh mục sản phẩm
INSERT INTO product_category (cate_name, cate_image) VALUES(?,?);

-- sửa danh mục sản phẩm
UPDATE product_category SET cate_name = ? , cate_image = ? WHERE cate_id = ?; 

-- xóa danh mục sản phẩm
DELETE FROM product_category 
WHERE cate_id = ?;