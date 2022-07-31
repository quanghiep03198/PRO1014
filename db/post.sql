-- thêm bài viết
INSERT INTO posts (body,title,short_desc,author_id,post_cate_id,img)
VALUES (?,?,?,?,?,?);

-- sửa thông tin bài viết
UPDATE posts SET
body = ?
title = ?
short_desc = ?
author_id = ?
pst_cate_id = ?
img = ?
WHERE id = ?;

-- xóa bài viết
DELETE FROM posts WHERE id = ?;

