<?php 
       if(isset($_GET['id']) && $_GET['id']>0){
           $id = $_GET['id'];
           $sql= "DELETE FROM manufacturer where id ='$id'";
           execute_query($sql);
         
           
       }
       $sql = "SELECT * FROM manufacturer order by id";
       
        include_once "admin/views/manufacturer/list.php";
        
 //-------------------
 ?>