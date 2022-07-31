<?php
// lấy tất cả sản phẩm trong wish list
function get_wishList_items()
{
    if (isset($_COOKIE['auth'])) :
        $auth_id = $_COOKIE['auth'];
        $sql = "SELECT wishlist_item.*, 
                product.id AS product_id,
                product.prod_name AS product_name,
				product.image AS image,
                product.price AS price,
                product.discount AS discount,
                (product.price*(100-product.discount)/100) AS discount_price,
                product.stock AS stock,
                product.warranty_time AS warranty_time
                FROM  wishlist_item
                INNER JOIN wishlist ON wishlist.id = wishlist_item.wishlist_id 
                INNER JOIN product ON wishlist_item.product_id = product.id
                WHERE wishlist.user_id = {$auth_id}";
        return  select_all_records($sql);
    endif;
}
// lấy ra mã wish list
function get_wishList_id()
{
    if (isset($_COOKIE['auth'])) :
        $auth_id = $_COOKIE['auth'];
        return select_one_value("SELECT id FROM wishlist WHERE user_id = '{$auth_id}'");
    endif;
}
// thêm sản phẩm vào wish list
function add_to_wishlist()
{
    if (!empty($_COOKIE['auth'])) {
        // check sản phẩm trùng trong wish list
        $product_id = $_POST['product_id'];
        $wish_list_items = get_wishList_items(); // lấy tất cả sản phẩm trong wishlist
        $isnt_duplicated = true;
        foreach ($wish_list_items as $item) :
            if ($product_id == $item['product_id']) :
                $isnt_duplicated = false;
                echo "<script>alert('Sản phẩm đã tồn tại trong danh sách!')</script>";
                break;
            endif;
        endforeach;
        if ($isnt_duplicated == true) {
            $list_id = get_wishList_id();
            $sql = "INSERT INTO wishlist_item (wishlist_id,product_id) VALUES ('{$list_id}','{$product_id}')";
            execute_query($sql);
            echo "<script>alert(`Đã thêm vào danh sách yêu thích!`)</script>";
        }
    } else  echo "<script>alert(`Bạn phải đăng nhập để sử dụng tính năng này!`)</script>";
}
function del_wishList_item()
{
    if (isset($_GET['id']))
        execute_query("DELETE FROM wishlist_item WHERE product_id = '{$_GET['id']}'");
}
