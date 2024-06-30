<?php
date_default_timezone_set("Asia/Calcutta");

include ("../connection.php");

?>
<!DOCTYPE html>

<html lang="en">

  
  <body>
  <form method="POST" action="" enctype="multipart/form-data">
    
    <head> 
    <center>
   <h1>Latest Products</h1>
   <br><br>
</center> 
    </head>

        
    <label for="company">Company name</label>
    <select name="company" id="company" >
   <option value=" ">----select----</option>
   <option value="bmw">BMW</option>
   <option value="audi">Audi</option>
   <option value="volvo">Volvo</option>
   <option value="rollsroyce">Rolls-Royce</option>
     </select> 

           
        
        <label>Vehicle model</label>
          <input type="text"  name="model" placeholder="Enter vechil model">
       

         
          
        
          
        
        

        
        
        <label for="cat">Category</label>
    <select name="cat" id="cat" >
   <option value=" ">----select----</option>
   <option value="mirror">Mirror</option>
   <option value="light">Light</option>
   <option value="engine">Engine part</option>
   <option value="wheel">Wheels</option>
   <option value="body">Body part</option>
   <option value="other">Other</option>
     </select> 
       

        
         <label>Color</label>
          <input type="text"  name="color" placeholder="Enter color">
        
        <input type="submit" name="search" value="Search"/>

        
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
    if(isset($_POST['search']))
    {
 
   $company=$_POST["company"];
   $model=$_POST["model"];
   $cat=$_POST["cat"];
   $color=$_POST["color"];
   $query="SELECT * FROM `tbl_product` WHERE p_company='$company' or p_model='$model' or p_cat='$cat' or p_color='$color'";
   $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
 
   while($rows = mysqli_fetch_assoc($result))
   {  
     ?>
      <form action="" method="POST">
        <div class="box">
        <img width="200" height="250" src="../admin/product image/<?php echo $rows['image'];?>">
           <h3><?php echo $rows['p_name']; ?></h3>
           <div class="price">$<?php echo $rows['p_price']; ?>/-</div>
           <input type="hidden" name="product_name" value="<?php echo $rows['p_name']; ?>">
           <input type="hidden" name="product_price" value="<?php echo $rows['p_price']; ?>">
           <input type="hidden" name="product_image" value="<?php echo $rows['image']; ?>">
           <input type="submit"  value="View more" name="btnview">
           <input type="submit" value="Buy" name="btnbuy">
        </div>
     </form>
     <?php
 
    }
   }
  session_start();
   $query="SELECT * FROM tbl_product";
   $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));

   
   while($rows = mysqli_fetch_assoc($result))
    {  
      ?>
       <form action="" method="POST">
         <div class="box">
         <img width="200" height="250" src="../admin/product image/<?php echo $rows['image'];?>">
            <h3><?php echo $rows['p_name']; ?></h3>
            <div class="price">$<?php echo $rows['p_price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $rows['p_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $rows['p_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $rows['image']; ?>">
            <input type="submit"  value="View more" name="btnview">
            <input type="submit" value="Buy" name="btnbuy">
         </div>
      </form>

      <?php
      
      if (isset($_POST['btnview'])) {
    $pid = $_POST['btnview'];
    setcookie("btn", $pid);
    header('Location: viewmore.php');
    exit();
    

    }
}
    ?>
    </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
     </html>

  



     