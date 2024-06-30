<?php
include ("../connection.php");
if (isset($_GET['id'])) {
    // Retrieve the 'id' parameter from the URL
    $p_id = mysqli_real_escape_string($con,$_GET['id']);
    
    session_start();

// Retrieve a session variable
$u_id= $_SESSION['id'];
$query = "SELECT * FROM tbl_product WHERE p_id=$p_id";
   $result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));

   if ($row = mysqli_fetch_array($result)) {
      $price=$row['p_price']
    ?>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

    </section>
    <div class="container">

<section class="products">

   <div class="box-container">  
  <div class="box">
  <form method="POST" action="" enctype="multipart/form-data">

        <img width="300" height="300" src="../admin/product image/<?php echo $row['image'];?>"><br>
        <front size="1000"><div align="justify"> Name : <?php echo $row['p_name']; ?></div>
        <div align="justify">Company : <?php echo $row['p_company']; ?></div>
        <div align="justify">Vehicle Model:<?php echo $row['p_model']; ?></div>
        <div align="justify"> Vehicle Model Year : <?php echo $row['p_year']; ?></div>
        <div align="justify">Category : <?php echo $row['p_cat']; ?></div>
        <div align="justify"> Color : <?php echo $row['p_color']; ?></div>
        <div align="justify"> Price:$<?php echo $row['p_price']; ?>/-</div>
        <div align="justify"><input type="radio" name="method"value="cash on delivery"/> Cash on delivery  
        <input type="radio" name="method"value="online"/> Pay now
        </div>
        <div align="justify">Quantity :<input type="number"  name="qty" placeholder="Number of item" required /> </div>
        <br>
        <br>
           <div class="price"><input type="submit" value="Buy" name="btnbuy"></div></front>
        </div>
<?php 
} 
} 

if(isset($_POST['btnbuy']))
{
    $qty=$_POST["qty"];
    $total=$qty*$price;
    $date = date("Y-m-d");

    $method=$_POST["method"];
    $query="SELECT p_stock FROM tbl_product WHERE p_id='$p_id'";
    $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
    $row=mysqli_fetch_array($result);
    if($row['p_stock']<$qty)
    {
        echo "<script> alert('only $row[p_stock] available');</script>";
    }
    else{
    $query="INSERT INTO tbl_buyproduct(b_qty,b_totalamt,b_date,p_id,u_id,payment_method,status) VALUES ('$qty','$total','$date','$p_id','$u_id','$method','Not Delivered')";
    $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
    
    
// Retrieve current value
$query = "SELECT  `p_stock` FROM `tbl_product` WHERE p_id=$p_id";
$result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
$row=mysqli_fetch_array($result);
    $currentValue = $row["p_stock"];
    $newValue = $currentValue-$qty;

// Update the database with the new value
    $query= "UPDATE tbl_product SET p_stock= $newValue WHERE p_id=$p_id";
    $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
    header('Location:bill.php');
    $_SESSION['qty']=$qty;
    $_SESSION['total']=$total;
    $_SESSION['date']=$date;
    $_SESSION['method']=$method;
    $_SESSION['u_id']=$u_id;
    $_SESSION['p_id']=$p_id;
} 
}

?>