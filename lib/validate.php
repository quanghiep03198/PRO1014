<?php

/**
 * -----------------------------------------
 * Định nghĩa ra các rule check validate
 * -----------------------------------------
 */
function check_empty($input_name, $error_name)
{
    global $error;
    if (isset($_POST[$input_name]) && empty($_POST[$input_name])) :
        $error[$input_name] = "Bạn chưa nhập " . $error_name;
        echo   $error[$input_name];
    endif;
}

function check_email($input_name)
{
    global $error;
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (
        isset($_POST[$input_name]) &&
        !empty($_POST[$input_name])  &&
        !preg_match($regex, $_POST[$input_name])
    ) :
        $error[$input_name] = "Bạn chưa nhập email";
        echo   $error[$input_name];
    endif;
}
// check giá trị trùng khớp
function check_matching($input_name1, $input_name2, $error_name)
{
    global $error;
    if (
        isset($_POST[$input_name2]) &&
        !empty($_POST[$input_name2]) &&
        $_POST[$input_name1] != $_POST[$input_name2]
    ) :
        $error[$input_name2] = $error_name . " không trùng khớp";
        echo $error[$input_name2];
    endif;
}
// check độ dài
function check_length($input_name, $minLength, $error_name)
{
    global $error;
    if (
        isset($_POST[$input_name]) &&
        !empty($_POST[$input_name]) &&
        strlen($_POST[$input_name]) < $minLength
    ) :
        $error[$input_name] = ucfirst($error_name) . "  phải có ít nhất {$minLength} ký tự";
        echo   $error[$input_name];
    endif;
}

// check số điện thoại
function check_phoneNumber($input_name)
{
    global $error;
    if (
        isset($_POST[$input_name]) &&
        !empty($_POST[$input_name]) &&
        strlen($_POST[$input_name]) != 10 &&
        !is_numeric($_POST[$input_name])
    ) :
        $error[$input_name] =  "Số điện thoại không hợp lệ !";
        echo   $error[$input_name];
    endif;
}
// check file ảnh
function check_image($input_name, $submitType)
{
    global $error;
    $allowedFile = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'jfif'];
    if (isset($_POST[$submitType]) && empty($_FILES[$input_name]['name'])) :
        $error[$input_name] = "Bạn chưa upload ảnh";
        echo   $error[$input_name];
    endif;
    if (isset($_POST[$submitType]) && !empty($_FILES[$input_name]['name'])) :
        $file_ext = explode(".", $_FILES[$input_name]['name']);
        if (is_array($file_ext)) :
            $isImageFile = in_array($file_ext[1], $allowedFile);

            if (!$isImageFile) :
                $error[$input_name] = "File không phải là ảnh!";
                echo  $error[$input_name];
            endif;
        endif;
    endif;
}
