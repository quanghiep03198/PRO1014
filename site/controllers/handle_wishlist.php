<?php
// add wishlist
include_once "../../lib/db_execute.php";
include_once "../models/wishlist.php";


function add_wishlist_item($product_id)
{
    $wish_list_items = get_wishList_items(); // lấy tất cả sản phẩm trong wishlist
    $isnt_duplicated = true;
    foreach ($wish_list_items as $item) :
        if ($product_id == $item['product_id']) :
            $isnt_duplicated = false;
            $message = "Sản phẩm đã tồn tại trong danh sách!";
            break;
        endif;
    endforeach;
    if ($isnt_duplicated == true) :
        $list_id = mysqli_real_escape_string(get_db_connection(), get_wishList_id());
        $product_id = mysqli_real_escape_string(get_db_connection(), $product_id);
        $sql = "INSERT INTO wishlist_item (wishlist_id,product_id) VALUES ('{$list_id}',{$product_id})";
        execute_query($sql);
        $message = "Đã thêm sản phẩm vào danh sách!";

        $response = json_encode(
            [
                "list_id" => $list_id,
                "product" => $product_id,
                "message" => $message
            ]
        );
        echo $response;
    endif;
}

function remove_wishlist_item($product_id)
{
    $sql = "DELETE FROM wishlist_item WHERE product_id = {$product_id}";
    execute_query($sql);
}

if (isset($_POST['request']) && $_POST['request'] == 'add_wishlist' && isset($_POST['product_id']))
    add_wishlist_item($_POST['product_id']);

if (isset($_POST['request']) && $_POST['request'] == 'del_item' && isset($_POST['product_id']))
    remove_wishlist_item($_POST['product_id']);
