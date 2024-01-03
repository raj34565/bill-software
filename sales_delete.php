<?php
include("database.php");


if(isset($_GET['id'])){
    $bill_no=$_GET['id'];

    $sql="DELETE FROM sales_list WHERE Bill_no='$bill_no'";

    if($conn->query($sql)===True){
         echo"<script>alert('record is deleted successfully');window.location.href='sales_table.php'
        </script>";
    }
}

?>