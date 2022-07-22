-- thêm bài viết
INSERT INTO posts (post_body,post_title,post_desc,user_id,pst_cate_id,post_img)
VALUES (?,?,?,?,?,?);

-- sửa thông tin bài viết
UPDATE posts SET
post_body = ?
post_title = ?
post_desc = ?
user_id = ?
pst_cate_id = ?
post_img = ?
WHERE post_id = ?;

-- xóa bài viết
DELETE FROM posts WHERE post_id = ?;

