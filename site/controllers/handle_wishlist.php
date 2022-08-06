<?php
include_once '../../lib/db_execute.php';
include_once '../models/wishlist.php';
include_once '../models/product.php';

$json = file_get_contents("php://input");
$data = json_decode($json, true);
extract($data);

switch ($request) {
    case 'POST':
        $wish_list_items = get_wishList_items(); // lấy tất cả sản phẩm trong wishlist
        $product =  get_one_product($product_id);
        if (in_array($product, $wish_list_items))
            echo "Sản phẩm đã tồn tại trong danh sách!";
        else {
            $list_id = get_wishList_id();
            $sql = "INSERT INTO wishlist_item (wishlist_id,product_id) VALUES ('{$list_id}',{$product_id})";
            execute_query($sql);
            echo "Đã thêm 1 sản phẩm vào danh sách!";
        }
        break;
    case 'DELETE':
        $sql = "DELETE FROM wishlist_item WHERE product_id = {$product_id}";
        execute_query($sql);
        $products = json_encode(get_wishList_items());
        echo $products;
        break;
    default:
        break;
}
