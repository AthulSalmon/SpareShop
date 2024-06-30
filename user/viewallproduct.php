<?php
date_default_timezone_set("Asia/Calcutta");

include ("../connection.php");

?>
<!DOCTYPE html>

<html lang="en">

<style>
    
    ... Your existing styles ... 

    /* New styles for the search bar */
    .search-container {
        margin: 20px;
        text-align: center;
    }

    .search-container input[type=text] {
        padding: 10px;
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .search-container button {
        padding: 10px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Responsive styles for smaller screens */
    @media screen and (max-width: 600px) {
        .search-container input[type=text] {
            width: 100%;
        }
    }
</style>

  <body>
  <form method="POST" action="" enctype="multipart/form-data">
    
    <head> 
    <center>
   <h1>Latest Products</h1>
   <br><br>
</center> 
</head>
        
       

        
       <br>
       <br>
       <br>
       <br> 
       <head>
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

  </body>  

  
 


  <div class="container">

<section class="products">

   <div class="box-container">

 <?php
  
   $query="SELECT * FROM tbl_product";
   $result = $con->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
     
      ?>
       <form action="viewmore.php" method="">
         <div class="box">
         <img width="300" height="250" src="../admin/product image/<?php echo $row['image'];?>">
            <h3><?php echo $row['p_name']; 
            //$id=$row['p_name'];?></h3>
            <div class="price">$<?php echo $row['p_price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $row['p_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['p_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
            <a href='Buy.php?id=<?=$row['p_id'];?>'>Buy</a>
            <a href="viewmore.php?id=<?=$row['p_id'];?>" class=" btn">View Details</a>
          

           
         </div>
      </form>
      <?php
   

    }
  }
  else {
    echo "0 results";
}
  // if(isset($_POST['btnview']))
   // {
      //$_SESSION["pid"]=$row["p_id"];
    
  //$pid=DOMDocument::getElement
   //   setcookie("btn",$pid);
   // header('Location:viewmore.php');
    ?>
    </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
     </html>

    