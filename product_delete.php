<?php
include("database.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM product_list WHERE id='$id'";

    if($conn->query($sql)){
        echo"<script>alert('record is deleted successfully');window.location.
        href='product.php'
        </script>";
    }
}


?>