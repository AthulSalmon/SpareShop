<?php

include ("../connection.php");
if (isset($_GET['id'])) {
    // Retrieve the 'id' parameter from the URL
    $id = mysqli_real_escape_string($con,$_GET['id']);
    // Use the $id variable as needed
   $query = "SELECT * FROM tbl_product WHERE p_id=$id";
   $result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));

   if ($row = mysqli_fetch_array($result)) {
    /*echo "<center><table border=1>";
    echo "<tr><td>";
       echo "<img height =300 width=300 src='../admin/product image/".$row['image']."'>"."</tr></td></center>";
       echo "<tr><td>Product Name</td><td>";
       echo $row['p_name'] ."</td></tr><tr><td>Company</td><td>". $row['p_company'] ."</td></tr><tr><td>Vehicle Model</td><td>". $row['p_model'] ."</td></tr><tr><td>Vehicle Model Year</td><td>". $row['p_year'] ."</td></tr><tr><td>Category</td><td>". $row['p_cat'] ."</td></tr><tr><td>Color</td><td>". $row['p_color'] ."</td></tr><tr><td>Price</td><td>". $row['p_price']."</table>";
   */?>
   <style>
    :root {
   --blue: #2980b9;
   --red: tomato;
   --orange: orange;
   --black: #333;
   --white: #fff;
   --bg-color: #eee;
   --dark-bg: rgba(0, 0, 0, 0.7);
   --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
   --border: 0.1rem solid #999;
 }
 
 html {
   font-size: 78%;
   overflow-x: hidden;
 }
 
 .products .box-container {
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   gap: 1.5rem;
   justify-content: center;
 }
 
 .products .box-container .box {
   text-align: justify;
   padding: 2rem;
   box-shadow: var(--box-shadow);
   border: var(--border);
   border-radius: 0.5rem;
 }
 
 .products .box-container .box img {
   height: 25rem;
 }
 
 .products .box-container .box h3 {
   margin: 1rem 0;
   font-size: 2.5rem;
   color: var(--black);
 }
 
 .products .box-container .box .price {
   font-size: 2.5rem;
   color: var(--black);
 }
 </style>
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
        <img width="300" height="300" src="../admin/product image/<?php echo $row['image'];?>"><br>
        <div class="price"> Name : <?php echo $row['p_name']; ?></div>
        <div class="price">Company : <?php echo $row['p_company']; ?></div>
        <div class="price">Vehicle Model:<?php echo $row['p_model']; ?></div>
        <div class="price"> Vehicle Model Year : <?php echo $row['p_year']; ?></div>
        <div class="price">Category : <?php echo $row['p_cat']; ?></div>
        <div class="price"> Color : <?php echo $row['p_color']; ?></div>
        <div class="price"> Price:$<?php echo $row['p_price']; ?>/-</div>
           <input type="hidden" name="product_name" value="<?php echo $row['p_name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $row['p_price']; ?>">
           <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
           <a href='Buy.php?id=<?=$row['p_id'];?>'>Buy</a>
        </div>
<?php 
} else {
       echo "Product not found.";
   }
} 

else {
    echo "ID parameter not set.";
}
?>