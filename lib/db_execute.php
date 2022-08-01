<?php
function get_db_connection()
{
    $connection = new mysqli("localhost", "root", "", "duan1");
    if ($connection->connect_error) die($connection->connect_error);
    return $connection;
}


// lấy 1 giá trị
function select_one_value($sql)
{
    try {
        $connection = get_db_connection();
        $statement = $connection->prepare($sql);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $data = $result->fetch_row();
            $result->free_result();
            $connection->close();
            if (!is_null($data))  return $data[0];
            // else throw new Exception("No Result");
        } else {
            throw new Exception("SQL Syntax Error!");
            return false;
        }
    } catch (Exception $e) {
        echo "<span class='text-danger fw-bold'>Message: {$e->getMessage()}</span>";
    }
}
// lấy 1 bản ghi 
function select_single_record($sql)
{
    try {
        $connection = get_db_connection();
        $statement = $connection->prepare($sql);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $data = $result->fetch_assoc();
            $result->free_result();
            $connection->close();
            if (!is_null($data))  return $data;
        } else throw new Exception("SQL SELECT Syntax Error!");
    } catch (Exception $e) {
        echo "<span class='text-danger fw-bold'>Message: {$e->getMessage()}</span>";
    }
}
// lấy tất cả bản ghi
function select_all_records($sql)
{
    try {
        $connection = get_db_connection();
        $statement = $connection->prepare($sql);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free_result();
            $connection->close();
            if (!is_null($data))  return $data;
        } else throw new Exception("SQL Syntax Error");
    } catch (Exception $e) {
        echo "<span class='text-danger fw-bold'>Message: {$e->getMessage()}</span>";
    }
}

function execute_query($sql)
{
    try {
        $connection = get_db_connection();
        $statement = $connection->prepare($sql);
        if ($statement->execute()) {
            $statement->close();
            return $connection->insert_id;
        } else {
            throw new Exception("SQL Syntax Error");
        }
    } catch (Exception $e) {
        echo "<span class='text-danger fw-bold'>Message: {$e->getMessage()}</span>";
    } finally {
        $connection->close();
    }
}
