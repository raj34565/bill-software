<?php
include ("database.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="SELECT * FROM sales_list WHERE Bill_no='$id'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){
        $id=$row['Bill_no'];
        $customer=$row['Customer_name'];
        $product=$row['Product'];
        $rate=$row['Rate'];
        $quantity=$row['Quantity'];
        $total=$row['Total'];
        $discount=$row['Discount'];
        $amount=$row['Amount'];
        $subtotal=$row['Subtotal'];
        $charges=$row['Charges'];
        $overalltotal=$row['Overalltotal'];

        $product_array= explode(',', $product);
        $rate_array= explode(',', $rate);
        $quantity_array= explode(',', $quantity);
        $total_array= explode(',', $total);
    }
}
     $bill_no = $customer = $product = $rate = $quantity = $total ="";
     $bill_noErr = $customerErr = $productErr = $rateErr = $quantityErr = $totalErr ="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["bill_no"])){
          $bill_noErr="Bill_no is required";
        }
        else{
          $bill_no=test_input($_POST["bill_no"]);
          if(!preg_match("/^[0-9]*$/",$bill_no)){
            $bill_noErr="Invalid bill_no";
        }
    }

     if(empty($_POST["customer"])){
          $customerErr="Select a customer";
        }
        else{
          $customer=test_input($_POST["customer"]);
        }

         if(empty($_POST["product"])){
          $productErr="Select a product";
        }
        else{
          $product=test_input($_POST["product"]);
        }
}
/*
if(empty($bill_noErr)&& empty($customerErr)){
          $bill_no=$_POST["bill_no"];
          $customer=$_POST["customer"];
          $product=$_POST["product_arr"];
          $rate=$_POST["rate_arr"];
          $quantity=$_POST["quanity_arr"];
          $total=$_POST["total_arr"];
          $discount=$_POST["discount"];
          $amount=$_POST["amount"];
          $subtotal=$_POST["subtotal"];
          $charges=$_POST["charges"];
          $overalltotal=$_POST["overalltotal"];

      $sql="UPDATE sales_list SET Bill_no='$bill_no',Customer_name='$customer',Product='$product',Rate='$rate',Quantity='$quantity',Total='$total',Discount='$discount',
      Charges='$charges',Overalltotal='$overalltotal' WHERE Bill_no='$id'";

      if($conn->query($sql)){
        echo "<script>
        alert('Record is update successfully');window.location.href='sales_table.php';
        </script>";
      }    
      else {
        echo "table is not created";
      }
}
*/
function test_input($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}


$productdata="SELECT Product_name,Rate FROM product_list";
$productresult=$conn->query($productdata);


$customerdata="SELECT Name FROM form_list";
$customerresult=$conn->query($customerdata);
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

 

    <main role="main" class="col-md-9 col-lg-10 mr-auto px-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="row justify-content-between my-5">
                            <div class="col-lg-4 ">
                                <label for="bill_no">Bill No:</label>
                                <input type="number" name="bill_no" id="bill_no" class="form-control" value=
                      "<?php echo $id  ?>">
                                
                            </div>

                            <div class="col-lg-4">
                                <label for="customer">Customer:</label>
                                <?php 
                                    echo '<select class="form-control" name="customer" id="customer" >';
                                    echo '<option value="'.$customer.'">'.$customer.'</option>';
                                    
                                   while ($customer = $customerresult->fetch_assoc()) {
                                      echo "<option value='{$customer['Name']}'>{$customer['Name']}</option>";
                                  }
                                    echo '</select>';
                                ?>
                            </div>
                        </div>
                       
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 mb-md-3">
                            <label for="product">Product:</label>
                                 <?php 
                                    echo '<select class="form-control" name="product" id="product">';
                                    echo '<option value="">Product name</option>';
                                    
                                   while ($product = $productresult->fetch_assoc()) {
                                      echo "<option value='{$product['Product_name']}' data-rate='{$product['Rate']}'>{$product['Product_name']}</option>";
                                  }
                                    echo '</select>';
                                    ?>
                                   
                            </div>
                            <div class="col-lg-3 col-md-6 mb-md-3">
                                <label for="rate">Rate:</label>
                                <input type="number" name="rate" id="rate" class="form-control">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="total">Total:</label>
                                <input type="number" name="total" id="total" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 table_insert text-md-center">                                
                                    <button type="button" id="submit"class="btn btn-danger">+</button>
                                    <input type="hidden" name="product_arr" id="product_arr">
                                    <input type="hidden" name="rate_arr" id="rate_arr">
                                    <input type="hidden" name="quanity_arr" id="quantity_arr">
                                    <input type="hidden" name="total_arr" id="total_arr">
                            </div>
                        </div>

                        <div class="container my-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table" id="tablerow">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Rate</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        for($i=0; $i<count($product_array); $i++){ ?>
                                          <tr>
                                              <td><?php echo $product_array[$i]; ?></td>
                                              <td><?php echo $rate_array[$i]; ?></td>
                                              <td><?php echo $quantity_array[$i]; ?></td>
                                              <td><?php echo $total_array[$i]; ?></td>
                                              <td><button class="btn btn-danger remove-button">
                                              Remove</button></td>
                                          </tr>
                                       <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="row text-center">
                            <div class="col-lg-6 col-md-6 discount">
                                <label for="discount">Discount:</label>
                                <input type="text" id="discount" name="discount" value=
                      "<?php echo $discount  ?>" >
                            </div>
                            <div class="col-md-6 text-md-initial">
                                <p>Amount:<small id=discount_amount><?php echo "$amount";?></small></p>
                                <input type="hidden" id="dis_amount">
                            </div>
                            <div class="col-lg-12">
                                <p>SubTotal:<small id="subTotal"><?php echo "$subtotal";?></small></p>
                                <input type="hidden" id="discountupdate">
                            </div>
                            <div class="col-lg-12">
                                <label for="charges">Charges:</label>
                                <input type="text" id="charges" name="charges" value=
                      "<?php echo $charges  ?>">
                            </div>
                            <div class="col-lg-12">
                                <p>Overall Total:<small id="overallTotal"><?php echo "$overalltotal";?></small></p>
                                <input type="hidden" id="overallupdate" name="overalltotal">
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" name="insert" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function(){
             
            function updateRate(){
              var selectedRate = $("#product option:selected").data("rate");
                  $("#rate").val(selectedRate);

                   $("#quantity").on("input",function(){
              calculateTotalQuantity();
            });
                
            }
            function calculateTotalQuantity() {
                var rate = parseFloat($("#rate").val()) || 0;
                var quantity = parseFloat($("#quantity").val()) || 0;
                var total = rate * quantity;
                    $("#total").val(total);
            }

            $("#product").on("change",function(){
              updateRate();
            });

            $('.remove-button').on('click',function(){
                $(this).closest('tr').remove();
            });

             function updateTotal() {
             var totalSum = 0;
            
            $("#tablerow tbody tr").each(function () {
                var total = parseFloat($(this).find('td:eq(3)').text()) || 0;
                totalSum += total;
            });
                
                $("#subTotal").text(totalSum);
                $("#discountupdate").val(totalSum);
                updatediscount();
                overallTotal();
            }

             function updatediscount(){
                 var discount=$("#discount").val() || 0 ;
                 var amount=$("#discountupdate").val() || 0;
                 console.log(amount);

                 if(discount.endsWith('%')){
                    var discount_percent=parseFloat(discount) || 0;
                    var discount_total=Math.round((discount_percent/100)*amount) ;
                    $("#discount_amount").text(discount_total);
                    $("#dis_amount").val(discount_total);
                 }
                 else{
                    var discount_percent=parseFloat(discount) || 0;
                    var discount_total=amount-discount_percent;
                    $("#discount_amount").text(discount_total);
                 }
            }

            
            function overallTotal(){
                var subtotal=$("#discountupdate").val() || 0;
                var dis_amount=$("#dis_amount").val() || 0;
                var charges =parseFloat($("#charges").val()) || 0;
                var total=(subtotal-dis_amount)+charges;
                $("#overallTotal").text(total);
                $("#overallupdate").val(total);
            }

            $("#discount").on("keyup",function(){
                    updatediscount();
                    overallTotal();
            });

             $("#charges").on("keyup",function(){
                    overallTotal();
            });


            $("#submit").on("click",function(){
              var productdata=$("#product").val();
              var ratedata=$("#rate").val();
              var quantitydata=$("#quantity").val();
              var totaldata=$("#total").val();

              var removebutton=$("<button>").text("Remove").addClass("btn btn-danger");

              var newrow=$("<tr>");
                  newrow.append("<td>"+productdata+"</td>");
                  newrow.append("<td>"+ratedata+"</td>");
                  newrow.append("<td>"+quantitydata+"</td>");
                  newrow.append("<td>"+totaldata+"</td>");
                  newrow.append($("<td>").append(removebutton));

              $("#tablerow").append(newrow);
              updateTotal();

              removebutton.on("click",function(){
                $(this).closest("tr").remove();
                updateTotal();
              });
              $("#product,#rate,#quantity,#total").val('');
            });



        });
    </script>
</body>
</html>