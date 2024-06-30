<?php
date_default_timezone_set("Asia/Calcutta");
include ("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
<form method="POST" action="" enctype="multipart/form-data">
    <center>
        <h1>Latest Products</h1>
        <br><br>
    </center>
        
   
    Category<select name="cat" id="cat">
        <option value=" ">----select----</option>
        <option value="mirror">Mirror</option>
        <option value="light">Light</option>
        <option value="engine">Engine part</option>
        <option value="wheel">Wheels</option>
        <option value="body">Body part</option>
        <option value="other">Other</option>
    </select>  

    
    Color:<input type="text"  name="color" placeholder="Enter color">
    
    <input type="submit" name="search" value="Search"/>
    <br><br>
</form>
</center>

<div class="container">
    <section class="products">
        <div class="box-container">
            <?php
            if(isset($_POST['search'])) {
                $cat = $_POST["cat"];
                $color = $_POST["color"];

                // Initial query without any filters
                $query = "SELECT * FROM tbl_product WHERE 1";

                // Add category filter if selected
                if (!empty($cat) && $cat != " ") {
                    $query .= " AND p_cat = '$cat'";
                }

                // Add color filter if selected
                if (!empty($color)) {
                    $query .= " AND p_color = '$color'";
                }

                $result = $con->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        ?>
                        <form action="viewmore.php" method="">
                            <div class="box">
                                <img width="300" height="250" src="../admin/product image/<?php echo $row['image'];?>">
                                <h3><?php echo $row['p_name']; ?></h3>
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
            }
            ?>
        </div>
    </section>
</div>

</body>
</html>
<style>
  /* Add these styles to your existing CSS file or create a new one */

/* Search form styling */
form {
  margin-bottom: 20px;
}
select {
  width: 10%;
  padding: 8px;
  margin-top: 5px;
  box-sizing: border-box;
}
label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 10%;
  padding: 8px;
  margin-top: 5px;
  box-sizing: border-box;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

/* Search results styling */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.products {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.box-container {
  display: flex;
  flex-wrap: wrap;
}

.box {
  background-color: #fff;
  border: 1px solid #ddd;
  margin: 10px;
  padding: 15px;
  text-align: center;
  width: 300px;
}

.box img {
  max-width: 100%;
  height: auto;
}

.price {
  color: #333;
  font-size: 18px;
  margin-top: 10px;
}

a {
  display: inline-block;
  margin-top: 10px;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  background-color: #007bff;
  color: #fff;
  border-radius: 4px;
}

a:hover {
  background-color: #0056b3;
}

/* Add more styles as needed */

/* Add more styles as needed */

  </style>