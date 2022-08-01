<?php 
       if(isset($_GET['id']) && $_GET['id']>0){
           $id = $_GET['id'];
           $sql= "DELETE FROM product_category where id ='$id'";
           execute_query($sql);
         
           
       }
       $sql = "SELECT * FROM product_category order by id";
       
        include_once "admin/views/categories/list.php";
        
 //-------------------
 ?>