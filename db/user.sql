-- thêm tài khoản (đăng ký/ tạo tài khoản trong trang admin)
INSERT users (user_name,password,role_id,avatar,email,phone,address) 
VALUES (?,?,?,?,?,?,?);

-- sửa 1 tài khoản (update thông tin người dùng bao gồm: tên, số điện thoại, địa chỉ, email)
UPDATE users SET
user_name = ?
password = ?
role_id = ?
avatar = ?
email = ?
phone = ?
address = ?
WHERE user_id = ?

-- xóa 1 tài khoản (chức năng trang admin)
DELETE FROM users WHERE user_id = ?;

-- lấy ra 1 tài khoản có user_id = ? (để làm chức năng đăng nhập)
SELECT * FROM users WHERE user_id = ?;

-- update vai trò của tài khoản (chức năng phân quyền của admin)
UPDATE user_role SET role_name = ? WHERE role_id = ?;

-- 

