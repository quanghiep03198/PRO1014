<?php

/**
 * -----------------------------------------
 * Định nghĩa ra các rule check validate
 * -----------------------------------------
 */
function check_empty()
{
    global $error_count;
    $form_controls = func_get_args();
    foreach ($form_controls as $form_ctrl)
        if (isset($form_ctrl) && empty($form_ctrl))
            $error_count++;
}

function check_email($form_ctrl)
{
    global $error_count;
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (
        isset($form_ctrl) &&
        !empty($form_ctrl)  &&
        !preg_match($regex, $form_ctrl)
    )
        $error_count++;
    // echo   $error_count;

}
// check giá trị trùng khớp
function check_matching($form_ctrl1, $form_ctrl2)
{
    global $error_count;
    if (
        isset($_POST[$form_ctrl1]) &&
        !empty($_POST[$form_ctrl2]) &&
        $form_ctrl1 != $form_ctrl2
    )
        $error_count++;
}
// check độ dài
function check_length($form_ctrl, $minLength)
{
    global $error_count;
    if (
        isset($form_ctrl) &&
        !empty($form_ctrl) &&
        strlen($form_ctrl) < $minLength
    ) :
        $error_count++;

    // echo   $error_count;
    endif;
}

// check số điện thoại
function check_phoneNumber($form_ctrl)
{
    global $error_count;
    if (
        isset($form_ctrl) &&
        !empty($form_ctrl) &&
        strlen($form_ctrl) != 10 &&
        !is_numeric($form_ctrl)
    ) :
        $error_count++;
    // echo   $error_count;
    endif;
}
// check file ảnh
function check_image($name_attr, $submitType)
{
    global $error_count;
    $allowedFile = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'jfif'];
    if (isset($_POST[$submitType]) && empty($_FILES[$name_attr]['name'])) :
        $error_count++;
    endif;
    if (isset($_POST[$submitType]) && !empty($_FILES[$name_attr]['name'])) :
        $file_ext = explode(".", $_FILES[$name_attr]['name']);
        if (is_array($file_ext)) :
            $isImageFile = in_array($file_ext[1], $allowedFile);
            if (!$isImageFile) :
                $error_count++;
            endif;
        endif;
    endif;
}
