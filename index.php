<?php 
include("database.php");
        $name = $phoneno = $address = $city = $state="";
        $nameErr = $phonenoErr = $addressErr = $cityErr = $stateErr ="";

      if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        if(empty($_POST["name"])){
          $nameErr="Name is required";
        }
        else{
          $name=test_input($_POST["name"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }

        if(empty($_POST["phoneno"])){
          $phonenoErr="Phoneno is required";
        }
        else{
          $phoneno=test_input($_POST["phoneno"]);
          if(!preg_match("/^[0-9]{10}$/",$phoneno)){
            $phonenoErr="Invalid phoneno";
        }
        }

        if(empty($_POST["address"])){
          $addressErr="Address is required";
        }
        else{
          $address=test_input($_POST["address"]);
          if (!preg_match("/^[a-zA-Z-0-9' ]*$/",$address)) {
            $addressErr = "Only letters and white space allowed";
          }
        }

        if(empty($_POST["city"])){
          $cityErr="City is required";
        }
        else{
          $city=test_input($_POST["city"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
            $cityErr = "Only letters and white space allowed";
          }
        }

        if(empty($_POST["state"])){
          $stateErr="State is required";
        }
        else{
          $state=test_input($_POST["state"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$state)) {
            $stateErr = "Only letters and white space allowed";
          }
        }

        if(empty($nameErr) &&  empty($phonenoErr) && empty($addressErr) && empty($cityErr) && empty($stateErr)){
  
       $name= $_POST["name"];
        $phoneno= $_POST["phoneno"];
        $address= $_POST["address"];
        $city= $_POST["city"];
        $state= $_POST["state"];

        $sql="INSERT INTO form_list(Name,Phoneno,Address,City,State)
             VALUES('$name','$phoneno','$address','$city','$state')";

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
    <style>
      .nav-link{color: white !important;}
      .nav-link:hover{color: blue !important;;}
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          </li>
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



    <main role="main" class="col-md-9 col-lg-10 mr-auto">
        <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 mt-3">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group m-auto">
                      <label for="Name">Name:</label>
                      <input type="text" class="form-control" id="Name" name="name">
                      <span class="text-danger">*<?php echo $nameErr;?></span><br>
                    
                      <label for="Phoneno">Phoneno:</label>
                      <input type="text" class="form-control" id="Phoneno" name="phoneno">
                      <span class="text-danger">*<?php echo $phonenoErr;?></span><br>
                      
                      <label for="Address">Address:</label>
                      <input type="text" class="form-control" id="address" name="address">
                      <span class="text-danger">*<?php echo $addressErr;?></span><br>

                      <label for="city">City:</label>
                      <input type="text" class="form-control" id="city" name="city">
                      <span class="text-danger">*<?php echo $cityErr;?></span><br>

                      <label for="state">State:</label>
                      <input type="text" class="form-control" id="state" name="state">
                      <span class="text-danger">*<?php echo $stateErr;?></span><br>

                      <!--<select name="city" class="form-control">
                            <option>Select City</option>
                            <?php
                            $array=array('Chennai','Madurai','Trichy','Coimbatore','Tuticorin','Erode','Perambalur');
                            $length=count($array);
                            for($i=0;$i<$length;$i++){
                                echo "<option>{$array[$i]}</option>";     
                            }

                            ?>

                      </select>-->

                      <input type="submit" class="form-control mt-3 btn btn-primary" value="Submit" name="insert">

                    </div>
                  </form>
            </div>
        </div>
    </div>    
        
    </main>  
</body>
</html>