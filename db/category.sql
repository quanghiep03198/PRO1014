-- lấy danh sách danh mục sản phẩm
SELECT * FROM * product_category;

-- thêm danh mục sản phẩm
INSERT INTO product_category (name,cate) VALUES(?,?);

-- sửa danh mục sản phẩm
UPDATE product_category SET 
name = ? 
image = ?
WHERE cate_id = ?; 

-- xóa danh mục sản phẩm
DELETE FROM product_category 
WHERE id = ?;