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
        $sql = "UPDATE site_setting SET 'logo1'= $logoHeader,
         'logo2' = $logoFooter,
         'email' = $email,
         'facebook' = $facebook,
         'phone' = $hotline,
         'address'= $address";
        execute_query($sql);
        header('Location: ../../admin.php?page=setting');
    } else {
        echo $error_count;
        // print_r([$logoHeader,$logoFooter,$email,$facebook,$hotline,$address]);
    }
}
