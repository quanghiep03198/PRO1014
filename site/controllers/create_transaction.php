<?php
include_once "../../lib/db_execute.php";

$json = file_get_contents("php://input");

if ($json != "") {
    $data = json_decode($json, true);
    extract($data);

    // insert thông tin giao dịch vào database
    $sql = "INSERT INTO `transaction` (order_id,
    order_desc,
    transaction_code,
    bank_code,
    total_amount,
    payment_time
    )
    VALUES (
    '{$order_id}',
    '{$vnp_OrderInfo}',
    '{$vnp_TransactionNo}',
    '{$vnp_BankCode}',
    {$vnp_Amount},
    DATE(NOW())
    )";
    execute_query($sql);
    echo $json;
}
