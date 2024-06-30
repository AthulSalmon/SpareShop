<?php
date_default_timezone_set("Asia/Calcutta");
include ("../connection.php");
$id = mysqli_real_escape_string($con,$_GET['id']);
$query = "SELECT * FROM tbl_product WHERE p_id=$id";
$result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));
$rows=mysqli_fetch_array($result);
$pname=$rows['p_name'];
$company=$rows['p_company'];
$model=$rows['p_model'];
$year=$rows['p_year'];
$cat=$rows['p_cat'];
$color=$rows['p_color'];
$price=$rows['p_price'];
$stock=$rows['p_stock'];

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
  
    $query = "UPDATE `tbl_product` SET 
    `p_name`='$name',
    `p_company`='$company',
    `p_model`='$model',
    `p_year`='$year',
    `p_cat`='$cat',
    `p_color`='$color',
    `p_price`='$price',
    `p_stock`='$stock' 
    WHERE p_id=$id";

$result = mysqli_query($con, $query) or die("Connection error: " . mysqli_error($con));
header('Location:addproduct.php');
}

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
    Update details 
    </h2>  
    </head>

    
        <div class="input-box">
        <table border="3" align="center">

        <tr><td>Enter the product name </td><td><input type="text" name="name" value="<?php echo $pname; ?>" placeholder="Product name" required /></td></tr>
        </div>

        <div class="selection-box">
  <tr>
    <td><label for="company">Company name</label></td>
    <td>
      <select name="company" id="company">
        <option value=" ">----select----</option>
        <option value="bmw" <?php echo ($company == 'bmw') ? 'selected' : ''; ?>>BMW</option>
        <option value="audi" <?php echo ($company == 'audi') ? 'selected' : ''; ?>>Audi</option>
        <option value="volvo" <?php echo ($company == 'volvo') ? 'selected' : ''; ?>>Volvo</option>
        <option value="rollsroyce" <?php echo ($company == 'rollsroyce') ? 'selected' : ''; ?>>Rolls-Royce</option>
      </select>
    </td>
  </tr>
</div>

           
        <div class="input-box">
          <tr><td><label>Vehicle model</label></td><td>
          <input type="text"  name="model" value="<?php echo $model; ?>" placeholder="Enter vechil model" required /></td></tr>
        </div>

          <div class="input-box">
          <tr><td><label>Model Year</label></td><td>
          <input type="number"  name="year" value="<?php echo $year; ?>" placeholder="Enter model year" required /></td></tr>
        </div>
          
        
    
        
        <div class="selection-box">
  <tr>
    <td><label for="cat">Category</label></td>
    <td>
      <select name="cat" id="cat">
        <option value=" ">----select----</option>
        <option value="mirror" <?php echo ($cat == 'mirror') ? 'selected' : ''; ?>>Mirror</option>
        <option value="light" <?php echo ($cat == 'light') ? 'selected' : ''; ?>>Light</option>
        <option value="engine" <?php echo ($cat == 'engine') ? 'selected' : ''; ?>>Engine part</option>
        <option value="wheel" <?php echo ($cat == 'wheel') ? 'selected' : ''; ?>>Wheels</option>
        <option value="body" <?php echo ($cat == 'body') ? 'selected' : ''; ?>>Body part</option>
        <option value="other" <?php echo ($cat == 'other') ? 'selected' : ''; ?>>Other</option>
      </select>
    </td>
  </tr>
</div>


        <div class="input-box">
          <tr><td><label>Color</label></td><td>
          <input type="text"  name="color" value="<?php echo $color; ?>" placeholder="Enter color" required /></td></tr>
        </div>


        <div class="input-box">
        <tr><td><label>Price</label></td><td>
          <input type="number"  name="price" value="<?php echo $price; ?>" placeholder="Enter the price" required /></td></tr>
        </div>
        

        <div class="input-box">
        <tr><td><label>Stock</label></td><td>
          <input type="number"  name="stock" value="<?php echo $stock; ?>" placeholder="Enter number of item" required /></td></tr>
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
   

