<?php
    include("database.php");
    
    if(isset($_POST['insert']))   
    { 
        $id=$_POST['id'];
        $name= $_POST['name'];
        $phoneno= $_POST['phoneno'];
        $address= $_POST['address'];
        $city= $_POST['city'];
        $state= $_POST['state'];

       $sql="UPDATE form_list SET Name='$name',Phoneno='$phoneno',Address='$address', City='$city', State='$state' WHERE Id='$id'";

             if($conn->query($sql)===True){
                echo "<script>
                alert('Record is updated');window.location.href='table.php';</script>";
             }
             else{
                echo "table is not created";
             }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="jquery.min.js"></script>
   <title>Document</title>
   
</head>
<body>
         <form id="myform">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <button type="button" id="submit">Submit</button>
         </form>

         <table id="tablerow">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>

            <script>
               $(document).ready(function(){
                  $("#submit").on("click",function(){
                     var name=$("#name").val();
                     var email=$("#email").val();
      
                     var newrow= "<tr><td>"+name+"</td>"
                                 "<td"+email+"</td></tr>";
      
                     $("#tablerow tbody").append(newrow);        
                     
                  $("#myform")[0].reset(0);
                  });
               });

         </script>
</body>
</html>

<!--<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="jquery.min.js"></script>
   <title>Document</title>
</head>
<body>
   <form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <button type="button" id="submitBtn">Submit</button>
</form>
<table id="dataTable" border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    $(document).ready(function () {
        $("#submitBtn").on("click", function () {
            // Get form values
            var name = $("#name").val();
            var email = $("#email").val();

            // Validate form data (you may add more validation here)

            // Append data to the table
            var newRow = $("<tr>");
            newRow.append("<td>" + name + "</td>");
            newRow.append("<td>" + email + "</td>");
            $("#dataTable tbody").append(newRow);

            // Clear the form
            $("#myForm")[0].reset();
        });
    });
</script>

</body>
</html>-->











