<?php 
include("database.php");

$sql="SELECT * FROM form_list";
$result=$conn->query($sql);


$result_per_page=8;

$page=isset($_GET['page'])?$_GET['page']:1;
$start_from = ($page-1)*$result_per_page;

$sql="SELECT * FROM form_list LIMIT $start_from, $result_per_page";
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
                                <th scope="col">Phoneno</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col"><a href="index.php" class="btn btn-primary">Insert</a>
                                
                                <input type="text" placeholder="Search" id="searchinput" name="filter">
                    
                                </th>
                            </tr>
                        </thead>
                        <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo "<tr>";
                                    echo "<td>{$row['Id']}</td>";
                                    echo "<td>{$row['Name']}</td>";
                                    echo "<td>{$row['Phoneno']}</td>";
                                    echo "<td>{$row['Address']}</td>";
                                    echo "<td>{$row['City']}</td>";
                                    echo "<td>{$row['State']}</td>";
                                    echo "<td><a href='update.php?id={$row['Id']}'class='btn btn-primary'>Update</a>
        
                                                <a href='delete.php?id={$row['Id']}'class='btn btn-primary'>Delete</a>
                                    </td>";
                                echo "</tr>" ;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
          <div class="row justify-content-center h-50">
            <div class="col-1">
              <nav aria-label="Page navigation example" class="d-flex justify-content-center align-items-center">
                <ul class="pagination">
                <?php 
                $totalcount="SELECT COUNT(*) as total FROM form_list";
                $totalresult=$conn->query($totalcount);
                $totalrows=$totalresult->fetch_assoc()['total'];

                $totalpages=ceil($totalrows/$result_per_page);

                if($page>1){
                  echo "<li class='page-item'><a class='page-link' href='?page=".($page-1)."' aria-label='Previous'><span aria-hidden='true'>&raquo;</span>
                  </a></li>";
                }

                for($i=1;$i<=$totalpages;$i++){
                  echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                }

                if($page<$totalpages){
                  echo "<li class='page-item'><a class='page-link' href='?page=".($page+1)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span>
                  </a></li>";
                }
                ?> 
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </main>
    
  
    <script>
    $(document).ready(function () {
        $("#searchinput").on("keyup", function () {
            var searchText = $(this).val().toLowerCase();
            var found = false;

            $("tbody tr").filter(function () {
                var Name = $(this).find("td:eq(1)").text().toLowerCase();
                

                var matchName = Name.includes(searchText);

                var match = matchName;
                $(this).toggle(match);

                if (match) {
                    found = true;
                }
            });

            if (!found) {
                $("#noResultMessage").show();
            } else {
                $("#noResultMessage").hide();
            }
        });
    });
</script>
</body>
</html>
           

