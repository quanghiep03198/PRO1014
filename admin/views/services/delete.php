<?php 
       if(isset($_GET['id']) && $_GET['id']>0){
           $id = $_GET['id'];
           $sql= "DELETE FROM services where id ='$id'";
           execute_query($sql);
         
           
       }
       $sql = "SELECT * FROM services order by id";
       
        include_once "admin/views/services/list.php";
        
 //-------------------
 ?>