<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>

<body>
    <div class="flex items-stretch">

        <!-- import sidebar from component  -->
        <?php include_once "/xampp/htdocs/PRO1014/admin/components/sidebar.php" ?>
        <!-- sidebar  end -->
        <section class="w-full">
            <!-- top -->
            <div class="bg-primary px-[50px] py-[30px] flex justify-between items-center">
                <h3 class="text-3xl text-white">Thêm mới tài khoản</h3>
            </div>
            <!-- main -->
            <div class="container mx-auto">
                <div class="flex justify-end items-center my-5">
                    <a href="?page=user-create" class="btn btn-ghost "><i class="bi bi-plus text-2xl"></i><span>Thêm mới</span></a>
                </div>

                <form action="/admin/controllers/user.php" method="POST" onsubmit="handleCreateAccount(this,event)">
                    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-5">
                        <!-- tài khoản -->
                        <div class="form-control">
                            <label for="">Tài khoản</label>
                            <input class="input input-bordered" type="text" data-name="tài khoản" name="account">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- mật khẩu -->
                        <div class="form-control">
                            <label for="">Password</label>
                            <input class="input input-bordered" type="password" data-name="mật khẩu" name="password">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- mât khẩu xác thực -->
                        <div class="form-control">
                            <label for="">Xác nhận mật khẩu</label>
                            <input class="input input-bordered" type="password" data-name="mật khẩu xác nhận" name="confirm_password">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- tên người dùng -->
                        <div class="form-control">
                            <label for="">Tên người dùng</label>
                            <input class="input input-bordered" type="text" name="username" data-name="tên người dùng">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- số diện thoại -->
                        <div class="form-control">
                            <label for="">Số điện thoại</label>
                            <input class="input input-bordered" type="text" data-name="số điện thoại" name="phone">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- email -->
                        <div class="form-control">
                            <label for="">Email</label>
                            <input class="input input-bordered" type="text" data-name="email" name="email">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- địa chỉ -->
                        <div class="form-control">
                            <label for="">Địa chỉ</label>
                            <input class="input input-bordered" data-name="địa chỉ" name="address" type="text">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- vai trò -->
                        <div class="form-control">
                            <label for="">Vai trò</label>
                            <select name="role" data-name="vai trò tài khoản" id="" class="select select-bordered">
                                <option value="">Phân quyền cho tài khoản là</option>
                                <?php foreach (get_all_user_roles() as $role) : extract($role) ?>
                                    <option value=<?php echo  $id ?>><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <div class="form-control">
                            <button type="submit" name="create_account" class="btn hover:btn-primary">Tạo mới tài khoản</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <script src="./js/common.js"></script>
        <script src="./js/validate.js"></script>
        <script>
            const handleCreateAccount = (form, event) => {
                const account = form["account"];
                const password = form["password"];
                const confirmPassword = form["confirm_password"];
                const username = form["username"];
                const email = form["email"];
                const address = form["address"];
                const phone = form["phone"];
                const role = form['role']
                if (areRequired(account, password, confirmPassword, username, email, address, phone, role) == false) event.preventDefault();
                if (checkLength(password, 8) == false) event.preventDefault();
                if (ckMatchingValue(confirmPassword, password) == false) event.preventDefault();
                if (isEmail(email) == false) event.preventDefault();
                if (isPhoneNumber(phone) == false) event.preventDefault();
            }
        </script>
</body>

</html>