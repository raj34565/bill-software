<?php
include("database.php");

$sql="SELECT * FROM sales_list";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="jquery.min.js"></script>
     <link rel="stylesheet" href="style.css">
    <title>Form</title>
    <style>
        .table_insert,.discount{text-align: end;}
         .nav{height:500px;}
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              View data
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="table.php">Customer data</a>
              <a class="dropdown-item" href="pro_table.php">Product data</a>
              <a class="dropdown-item" href="sales_table.php">Sales data</a>
            </div>
          </li>
    
          <li class="nav-item">
            <a class="nav-link" href="#">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            </a>
          </li>
        </ul>  
      </div>
    </nav> 

     <main role="main" class="col-md-9 col-lg-10 mr-auto p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Bill_no</th>
                                <th scope="col">Customer_name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Charges</th>
                                <th scope="col">Overalltotal</th>
                                <th scope="col"><a href="sales.php" class="btn btn-primary">Insert</a>
                                </th>
                            </tr>
                        </thead>
                        <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo "<tr>";
                                    echo "<td>{$row['Bill_no']}</td>";
                                    echo "<td>{$row['Customer_name']}</td>";
                                    echo "<td>{$row['Product']}</td>";
                                    echo "<td>{$row['Rate']}</td>";
                                    echo "<td>{$row['Quantity']}</td>";
                                    echo "<td>{$row['Total']}</td>";
                                    echo "<td>{$row['Discount']}</td>";
                                    echo "<td>{$row['Charges']}</td>";
                                    echo "<td>{$row['Overalltotal']}</td>";
                                    echo "<td><a href='sales_update.php?id={$row['Bill_no']}'class='btn btn-primary mb-3'>Update</a>
        
                                                <a href='sales_delete.php?id={$row['Bill_no']}'class='btn btn-primary'>Delete</a>
                                    </td>";
                                echo "</tr>" ;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
