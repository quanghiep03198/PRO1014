<?php
if (isset($_POST['change_password'])) :
    $currentPassword = $_POST['current_password'];
    if (password_verify($currentPassword, $auth['password'])) {
        $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        execute_query("UPDATE users SET password = '{$newPassword}' WHERE users.id = '{$auth['user_id']}'");
        echo "<script>alert(`Đổi mật khẩu thành công!`);</script>";
    } else
        echo "<script>alert(`Mật khẩu hiện tại không chính xác!`);</script>";
endif;
?>
<div class="p-5">
    <h1 class="text-[40px] font-light mb-[40px]">Đổi mật khẩu</h1>
    <form action="?page=account&act=change_password" method="post" class="flex flex-col gap-5" onsubmit="return handleErrorChangePassword(this)">
        <div class="form-group">
            <label for="">Mật khẩu hiện tại</label>
            <div class="pass mt-[10px]">
                <input type="password" data-name="mật khẩu hiện tại" name="current_password" class="input input-bordered w-full">
                <small class="text-base text-error error-message font-semibold"></small>
            </div>
        </div>
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" data-name="mật khẩu mới" name="new_password" class="input input-bordered w-full">
            <small class="text-base text-error error-message font-semibold"></small>
            <div class="pass mt-[10px]">
            </div>
        </div>
        <div class="form-group">
            <label for="">Xác nhận mật khẩu mới</label>
            <input type="password" data-name="mật khẩu xác thực" name="cfm_new_password" class="input input-bordered w-full">
            <small class="text-base text-error error-message font-semibold"></small>
        </div>
        <div>
            <button type="submit" name="change_password" class="btn btn-lg hover:btn-primary w-auto">Đổi mật khẩu</button>
        </div>
    </form>
</div>