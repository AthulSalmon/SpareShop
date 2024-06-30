<?php
date_default_timezone_set("Asia/Calcutta");
include ("../connection.php");

?>
<!DOCTYPE html>

<html lang="en">
<style>
  body {
    background-color: rgba(255, 255, 255, 0.8); /* White background with 80% opacity */
}

.container {
    background-color: rgba(255, 255, 255, 0.9); /* White background with 90% opacity */
    /* Your other container styles */
}

  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

input[type="text"],
input[type="number"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.btn {
    display: inline-block;
    background-color: #f44336;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 4px;
}

.btn:hover {
    background-color: #d32f2f;
}
  </style>
  
  <body>
  <form method="POST" action="" enctype="multipart/form-data">
    <section class="container">
    <head> 
      <center>  
    <h2>  
    Add product  
    </h2>  
    </head>

    
        <div class="input-box">
        <table border="3" align="center">

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
        <div class="input-box">
        <tr><td><label>Image</label></td><td>
          <input type="file"  name="image"></td></tr>
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
   $query="SELECT * FROM tbl_product";
   $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
   //$row=mysqli_fetch_array($result);
   echo"<table border=1>";
   echo "<tr>";
   echo"<th>Product name</th><th>Company</th><th>Vehicle model</th><th>Model Year</th><th>Category</th><th>Color</th><th>Price</th><th>Stock</th><th>Image</th><th>Action</th>";
   
   while($rows = mysqli_fetch_assoc($result))
    {       
    echo'<tr><td>'.$rows['p_name'].'</td><td>'.$rows['p_company'].'</td><td>'.$rows['p_model'].'</td><td>'.$rows['p_year'].'</td><td>'.$rows['p_cat'].'</td><td>'.$rows['p_color'].'</td><td>'.$rows['p_price'],'</td><td>'.$rows['p_stock'].'</td><td>'.'<img height="150" width="150" src="product image/'.$rows['image'].'">'.'</td><td>';
    ?><a href="delete.php?id=<?=$rows['p_id'];?>" class=" btn">Delete</a><?php
    }
   echo"</table>";


  ?>
  <?php

if(isset($_POST['btnsave']))
{
     
  $name=$_POST["name"];
	$company=$_POST["company"];
	$model=$_POST["model"];
	$year=$_POST["year"];
	$cat=$_POST["cat"];
	$color=$_POST["color"];
	$price=$_POST["price"];
	$stock=$_POST["stock"];
  $file_name=$_FILES['image']['name'];
  $temp=$_FILES['image']['tmp_name'];
  $folder='product image/'.$file_name;
  

  
  $query="INSERT INTO tbl_product(p_name,p_company,p_model,p_year, p_cat, p_color, p_price, p_stock, image) VALUES ('$name','$company','$model','$year','$cat','$color','$price','$stock','$file_name')";
  $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
  if($result)
  {
  move_uploaded_file($temp,$folder);
  }
	
  //$query="SELECT * FROM tbl_product";
  //$result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
 // $row=mysqli_fetch_array($result);
 // echo"<table border=1>";
  //echo "<tr>";
 // echo"<th>Product name</th><th>Company</th><th>Vehicle model</th><th>Model Year</th><th>Category</th><th>Color</th><th>Price</th><th>Stock</th><th>Image</th>";
  //while($rows = mysqli_fetch_assoc($result))
  //  {       
  //  echo'<tr><td>'.$row['p_name'].'</td><td>'.$row['p_company'].'</td><td>'.$row['p_model'].'</td><td>'.$row['p_year'].'</td><td>'.$row['p_cat'].'</td><td>'.$row['p_color'].'</td><td>'.$row['p_price'],'</td><td>'.$row['p_stock'].'</td><td>'.'<img height="100" width="100" src="product image/'.$rows['image'].'">'.'</td></tr>';
   // }
 // echo"</table>";

}
?>