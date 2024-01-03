<?php 
include("database.php");

$sql="SELECT * FROM product_list";
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
    <link rel="stylesheet" href="style.css">
    <script src="jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse min-vh-100">
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
                <li class="nav-item">
                  <a class="nav-link" href="#">
                  </a>
                </li>
              </ul>  
            </div>
          </nav>
          
    <main role="main" class="col-md-9 col-lg-10 mr-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Images</th>
                                <th scope="col"><a href="product.php" class="btn btn-primary">Insert</a>
                    
                                </th>
                            </tr>
                        </thead>
                        <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo "<tr>";
                                    echo "<td>{$row['Id']}</td>";
                                    echo "<td>{$row['Product_name']}</td>";
                                    echo "<td>{$row['Rate']}</td>";
                                    echo "<td>";
                                    
                                    echo "<img src='{$row['Images']}' style='max-width: 100px;
                                    max-height: 100px;'>";
                                    echo "</td>";
                                    echo "<td><a href='product_update.php?id={$row['Id']}' class='btn btn-primary'>Update</button>
                                    <a href='product_delete.php?id={$row['Id']}' class='btn btn-primary ml-3' id='deletebutton'>Delete</button></td>";
                                echo "</tr>" ;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

       
           
</body>
</html>
           

