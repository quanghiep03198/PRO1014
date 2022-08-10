<?php
if (isset($_GET['id'])) {
    $account = get_user_data($_GET['id']);
}
?>
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
                <h3 class="text-3xl text-white">Cập nhật tài khoản: <?= $account['account'] ?></h3>
            </div>
            <!-- main -->
            <div class="container mx-auto">

                <form action="/admin/controllers/user.php" method="POST" onsubmit="handleUpdateAccount(this,event)">
                    <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-5">
                        <!-- tên người dùng -->
                        <div class="form-control">
                            <label for="">Tên người dùng</label>
                            <input class="input input-bordered" type="text" name="username" data-name="tên người dùng" value="<?php echo $account['name'] ?>">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- số diện thoại -->
                        <div class="form-control">
                            <label for="">Số điện thoại</label>
                            <input class="input input-bordered" type="text" data-name="số điện thoại" name="phone" value="<?php echo $account['phone'] ?>">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- email -->
                        <div class="form-control">
                            <label for="">Email</label>
                            <input class="input input-bordered" type="text" data-name="email" name="email" value="<?php echo $account['email'] ?>">
                            <small class="text-error error-message font-semibold"></small>
                        </div>
                        <!-- địa chỉ -->
                        <div class="form-control">
                            <label for="">Địa chỉ</label>
                            <input class="input input-bordered" data-name="địa chỉ" name="address" type="text" value="<?php echo $account['address'] ?>">
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
                    </div>
                    <div class="mt-10">
                        <button type="submit" name="create_account" class="btn hover:btn-primary">Cập nhật tài khoản</button>
                    </div>
                </form>
            </div>
        </section>
        <script src="./js/common.js"></script>
        <script src="./js/validate.js"></script>
        <script>
            const handleUpdateAccount = (form, event) => {
                const username = form["username"];
                const email = form["email"];
                const address = form["address"];
                const phone = form["phone"];
                const role = form['role']
                if (areRequired(username, email, address, phone, role) == false) event.preventDefault();
                if (isEmail(email) == false) event.preventDefault();
                if (isPhoneNumber(phone) == false) event.preventDefault();
            }
        </script>
</body>

</html>