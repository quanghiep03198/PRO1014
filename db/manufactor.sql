-- lấy ra nhà sản xuất
SELECT * FROM manufactor;
-- thêm nhà sản xuất
INSERT INTO manufacturer (manu_name) VALUES (?);
-- sửa nhà sản xuất
UPDATE manufacturer SET manu_name = ? WHERE manu_id = ?;
-- xóa nhà sản xuất
DELETE FROM manufacturer WHERE manu_id = ? ;
