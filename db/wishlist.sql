-- thêm wishlist
INSERT INTO wishlist (id) VALUES (?);

-- thêm wishlist item (thêm sản phẩm vào wishlist)
INSERT INTO wishlist_item (wishlist_id,product_id) VALUES (?,?);

-- xóa wishlist item
DELETE FROM wishlist_item WHERE id = ?;