<?php 
include("database.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM form_list WHERE Id='$id'";

    if($conn->query($sql)===True){
        
        echo"<script>alert('record is deleted successfully');window.location.href='table.php'
        </script>";
    }
}
?>