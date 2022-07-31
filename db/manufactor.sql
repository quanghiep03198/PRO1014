-- lấy ra nhà sản xuất
SELECT * FROM manufacturer;

-- thêm nhà sản xuất
INSERT INTO manufacturer (name) VALUES (?);

-- sửa nhà sản xuất
UPDATE manufacturer SET name = ? WHERE id= ?;

-- xóa nhà sản xuất
DELETE FROM manufacturer WHERE id = ? ;
