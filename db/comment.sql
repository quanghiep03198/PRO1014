-- thêm bình luận sản phẩm
INSERT INTO product_comment (user_id,product_id,cmt_content) 
VALUES (?,?,?);

-- xóa bình luận
DELETE FROM product_comment 
WHERE pr_comment_id = ?;

-- thêm phản hồi bình luận sản phẩm
INSERT INTO product_comment_reply (user_id,content,cmt_id)
VALUES (?,?,?);

-- thêm bình luận bài viết
INSERT INTO post_comment (content, user_id)
VALUES (?,?);

-- xóa bình luận bài viết (trang admin)
DELETE FROM post_comment WHERE id = ?;

