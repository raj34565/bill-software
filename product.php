<?php 
include("database.php");
        $pro_name = $rate = "";
        $pro_nameErr = $rateErr = "";

      if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        if(empty($_POST["pro_name"])){
          $pro_nameErr="Product name is required";
        }
        else{
          $pro_name=test_input($_POST["pro_name"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$pro_name)) {
            $pro_nameErr = "Only letters and white space allowed";
          }
        }

        if(empty($_POST["rate"])){
          $rateErr="rate is required";
        }
        else{
          $rate=test_input($_POST["rate"]);
          if(!preg_match("/^[0-9]*$/",$rate)){
            $rateErr="Invalid rate";
        }
        }

        if(empty($pro_nameErr) &&  empty($rateErr)){

          $target_dir ="uploads/";
          $target_file = $target_dir . basename($_FILES["upload"]["name"]);
          $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $uploadOk = 1;
          move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
          if(file_exists($target_file)){
            echo "Sorry, file already exists";
            $uploadOk = 0;
          }
          if ($uploadOk === 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    echo "File uploaded successfully: " . $target_file;
}
  
        $pro_name= $_POST["pro_name"];
        $rate= $_POST["rate"];
        

        $sql="INSERT INTO product_list(Product_name,Rate,Images)
             VALUES('$pro_name','$rate','$target_file')";

             if($conn->query($sql)===True){
                echo"table is created";
             }
             else{
                echo "table is not created";
             }
    }
  }

  function test_input($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}


    
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
    <title>Form</title>
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
              <a class="dropdown-item" href="sales.php">Sales data</a>
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



    <main role="main" class="col-md-9 col-lg-10 mr-auto">
        <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 mt-3">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="form-group m-auto">
                      <label for="name">ProductName:</label>
                      <input type="text" class="form-control" id="name" name="pro_name">
                      <span class="text-danger">*<?php echo $pro_nameErr;?></span><br>
                    
                      <label for="rate">Rate:</label>
                      <input type="number" class="form-control" id="rate" name="rate">
                      <span class="text-danger">*<?php echo $rateErr;?></span><br>

                      <input type="file" class="form-control" name="upload" id="upload">
                
                      <input type="submit" class="form-control mt-3 btn btn-primary" value="Addproduct" name="insert">
                    </div>
                  </form>
            </div>
        </div>
    </div>    
        
    </main>  
</body>
</html>