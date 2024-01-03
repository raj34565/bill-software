<?php 
include("database.php");

        $bill_no = $customer = $product = $rate =$amount=$subtotal= $quantity = $total ="";
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

        
        if(empty($bill_noErr) && empty($customerErr)){
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
        

          $sql="INSERT INTO sales_list(Bill_no,Customer_name,Product,Rate,Quantity,Total,Discount,Amount,Subtotal,Charges,Overalltotal)
                VALUES('$bill_no','$customer','$product','$rate','$quantity','$total','$discount','$amount','$subtotal','$charges','$overalltotal')";

                if($conn->query($sql)===True){
                  echo "table is created";
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

 

    <main role="main" class="col-md-9 col-lg-10 mr-auto px-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="row justify-content-between my-5">
                            <div class="col-lg-4 ">
                                <label for="bill_no">Bill No:</label>
                                <input type="number" name="bill_no" id="bill_no" class="form-control" autocomplete="off">
                                <span class="text-danger"><?php echo $bill_noErr ;?></span>
                            </div>

                            <div class="col-lg-4">
                                <label for="customer">Customer:</label>
                                <?php 
                                    echo '<select class="form-control" name="customer" id="customer" autocomplete="off">';
                                    echo '<option value="">Customer name</option>';
                                    
                                   while ($customer = $customerresult->fetch_assoc()) {
                                      echo "<option value='{$customer['Name']}'>{$customer['Name']}</option>";
                                  }
                                    echo '</select>';
                                ?>
                                <span class="text-danger"><?php echo $customerErr ?></span>
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
                                    <span class="text-danger"><?php echo $productErr ?></span>
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
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="row text-center">
                            <div class="col-lg-6 col-md-6 discount">
                                <label for="discount">Discount:</label>
                                <input type="text" id="discount" name="discount" autocomplete="off" >
                            </div>
                            <div class="col-md-6 text-md-initial">
                                <p>Amount:<small id=discount_amount></small></p>
                                <input type="hidden" id="dis_amount" name="amount">
                            </div>
                            <div class="col-lg-12">
                                <p>SubTotal:<small id="subTotal"></small></p>
                                <input type="hidden" id="discountupdate" name="subtotal">
                            </div>
                            <div class="col-lg-12">
                                <label for="charges">Charges:</label>
                                <input type="text" id="charges" name="charges">
                            </div>
                            <div class="col-lg-12">
                                <p>Overall Total:<small id="overallTotal"></small></p>
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
            var products = [];
            var rates = [];
            var quantities = [];
            var totals = []

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


            function updateTotal() {
             var totalSum = 0;

            
            $("#tablerow tbody tr").each(function () {
                var total = parseFloat($(this).find('td:eq(3)').text()) || 0;
                totalSum += total;
            });

                $("#subTotal").text(totalSum.toFixed(2));
                $("#discountupdate").val(totalSum.toFixed(2));
            }
           
            $("#submit").on("click",function(){
                var customer=$("#customer").val();
                var productname=$("#product").val();
                var ratedata=$("#rate").val();
                var quantitydata=$("#quantity").val();
                var totaldata=$("#total").val();

                if(customer===''){
                    alert("Please select customer first");
                    return;
                }

                if(!productname || !ratedata || !quantitydata || !totaldata){
                    alert("Please add product");
                    return;
                }

                var rate=parseFloat(ratedata);
                var quantity=parseFloat(quantitydata);
                var total=parseFloat(totaldata);

                products.push(productname);
                rates.push(rate);
                quantities.push(quantity);
                totals.push(total);

                $("#product_arr").val(products.join(','));
                $("#rate_arr").val(rates.join(','));
                $("#quantity_arr").val(quantities.join(','));
                $("#total_arr").val(totals.join(','));
               

                var removeButton=$("<button>").text("Remove").addClass("btn btn-danger");

                var newrow=$("<tr>");
                    newrow.append("<td>"+productname+"</td>");
                    newrow.append("<td>"+rate+"</td>");
                    newrow.append("<td>"+quantity+"</td>");
                    newrow.append("<td>"+total+"</td>");
                    newrow.append($("<td>").append(removeButton));

                $("#tablerow").append(newrow);  
                updateTotal();        

                removeButton.on("click", function () 
                {
                    $(this).closest("tr").remove();
                     updateTotal();
                });
                 $("#product, #rate, #quantity, #total").val('');
            });
        });

         $(document).ready(function () {
            function updatediscount(){
                 var discount=$("#discount").val() || 0 ;
                 var amount=$("#discountupdate").val() || 0;


                 if(discount.endsWith('%')){
                    var discount_percent=parseFloat(discount) || 0;
                    var discount_total=Math.round((discount_percent/100)*amount) ;
                    $("#discount_amount").text(discount_total);
                    $("#dis_amount").val(discount_total);
                 }
                 else{
                    var discount_percent=parseFloat(discount) || 0;
                    var discount_total=amount-discount_percent;
                    if(isNaN(discount_total)){
                        discount_total=0;
                    }
                    $("#discount_amount").text(discount_total);
                 }

                 overallTotal();
            }

            function overallTotal(){
                var subtotal=parseFloat($("#discountupdate").val()) || 0;
                var dis_amount=parseFloat($("#dis_amount").val()) || 0;
                var charges =parseFloat($("#charges").val()) || 0;

                if(isNaN(charges)){
                    charges = 0;
                }

                var total=(subtotal-dis_amount)+charges;
                $("#overallTotal").text(total);
                $("#overallupdate").val(total);
            }

            

           

             $("#discount").on("input",function(){
                    updatediscount();
            });

             $("#charges").on("input",function(){
                    overallTotal();
            });
        });
    </script>
</body>
</html>
