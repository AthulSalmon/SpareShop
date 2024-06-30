<?php
date_default_timezone_set("Asia/Calcutta");
include ("../connection.php");

?>
<!DOCTYPE html>

<html lang="en">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

form {
    margin-bottom: 20px;
}

table.total {
    width: 30%;
    margin: 20px auto;
}

table.total th, table.total td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table.total th {
    background-color: #f2f2f2;
}

  </style>
  
  <body>
  <form method="POST" action="" enctype="multipart/form-data">
    <section class="container">
    <head> 
      <center>  
    <h2>  
   PURCHASE BILL
    </h2>  
    </head>

    
        <div class="input-box">
        <table border="3" align="center">
        <tr><td>Enter Your Name </td><td><input type="text" name="bname"placeholder="Product name" required /></td></tr>
        </div>

        <tr><td>Enter the product name </td><td><input type="text" name="name"placeholder="Product name" required /></td></tr>
        </div>

        <div class="selection-box">
        <tr><td><label for="company">Company name</td><td></label>
    <select name="company" id="company" >
   <option value=" ">----select----</option>
   <option value="bmw">BMW</option>
   <option value="audi">Audi</option>
   <option value="volvo">Volvo</option>
   <option value="rollsroyce">Rolls-Royce</option></td></tr>
     </select> </td></tr>
        </div>
           
        <div class="input-box">
          <tr><td><label>Vehicle model</label></td><td>
          <input type="text"  name="model" placeholder="Enter vechil model" required /></td></tr>
        </div>

          <div class="input-box">
          <tr><td><label>Model Year</label></td><td>
          <input type="number"  name="year" placeholder="Enter model year" required /></td></tr>
        </div>
          
        
        

        
        <div class="selection-box">
        <tr><td><label for="cat">Category</td><td></label>
    <select name="cat" id="cat" >
   <option value=" ">----select----</option>
   <option value="mirror">Mirror</option>
   <option value="light">Light</option>
   <option value="engine">Engine part</option>
   <option value="wheel">Wheels</option>
   <option value="body">Body part</option>
   <option value="other">Other</option>
     </select> </td></tr>
        </div>

        <div class="input-box">
          <tr><td><label>Color</label></td><td>
          <input type="text"  name="color" placeholder="Enter color" required /></td></tr>
        </div>


        <div class="input-box">
        <tr><td><label>Price</label></td><td>
          <input type="number"  name="price" placeholder="Enter the price" required /></td></tr>
        </div>
        

        <div class="input-box">
        <tr><td><label>Stock</label></td><td>
          <input type="number"  name="stock" placeholder="Enter number of item" required /></td></tr>
        </div>
        
        <div class="button">
       <tr><td> <center><input type="submit" name="btnsave" value="Save"/></td><td>
        <input type="submit" name="btncancel" value="Cancel"/></center></td><tr>
         </div>
        
</table>
</form>

    </section>

  </body>  

  <br><br><br>
  </html>


  <?php
  
   $query="SELECT * FROM purchase";
   $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
   //$row=mysqli_fetch_array($result);
   echo"<table border=1>";
   echo "<tr>";
   echo"<th>Purchaser Name</th><th>Product name</th><th>Company</th><th>Vehicle model</th><th>Model Year</th><th>Category</th><th>Color</th><th>Price</th><th>Stock</th><th>Total</th>";
   
   while($rows = mysqli_fetch_assoc($result))
    {       
      
    echo'<tr><td>'.$rows['bname'].'</td><td>'.$rows['p_name'].'</td><td>'.$rows['p_cmpny'].'</td><td>'.$rows['p_model'].'</td><td>'.$rows['p_yr'].'</td><td>'.$rows['p_cat'].'</td><td>'.$rows['p_price'].'</td><td>'.$rows['p_color'].'</td><td>'.$rows['stock'].'</td><td>'.$rows['total'].'</td></tr>';
    
    }
   echo"</table>";

  ?>
  <?php

if(isset($_POST['btnsave']))
{
    
    $bname=$_POST["bname"];
    $name=$_POST["name"];
	$company=$_POST["company"];
	$model=$_POST["model"];
	$year=$_POST["year"];
	$cat=$_POST["cat"];
	$color=$_POST["color"];
	$price=$_POST["price"];
	$stock=$_POST["stock"];
    $total=$stock*$price;
  $query="INSERT INTO `purchase`(`bname`,`p_name`, `p_cmpny`, `p_model`, `p_yr`, `p_cat`, `p_color`, `p_price`, `stock`,`total`) VALUES ('$bname','$name','$company','$model','$year','$cat','$color','$price','$stock','$total')";
  $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
  
	

}
?>