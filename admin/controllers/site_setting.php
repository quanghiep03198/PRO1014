<?php
include_once "../../lib/validate.php";
include_once "../../lib/global.php";
include_once "../../lib/db_execute.php";

if (isset($_POST['update_site'])) {
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $hotline = $_POST['phone'];
    $address = $_POST['address'];

    $error_count = 0;

    check_empty($email, $facebook, $hotline, $address);
    check_email($email);
    check_phoneNumber($hotline);
    check_image('logo_header', 'update_site');
    check_image('logo_footer', 'update_site');
    if ($error_count == 0) {

        $logoHeader = upload_file("../../img/settings/", "logo_header");
        $logoFooter = upload_file("../../img/settings/", "logo_footer");
        $sql = "UPDATE `site_setting` SET `logo1` = '{$logoHeader}',
                                        `logo2` = '{$logoFooter}',
                                        `email` = '{$email}',
                                        `facebook` = '{$facebook}',
                                        `hotline` = '{$hotline}',
                                        `address` = '{$address}'
                                    WHERE `id` = 1";
        execute_query($sql);
        echo '<script>
                alert(`Thay đổi cài đặt website thành công!`);
                window.location =  "../../admin.php?page=setting";
            </script>';
    } else {
        echo $error_count;
    }
}
