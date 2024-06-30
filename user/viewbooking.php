<?php
include ("../connection.php");

session_start();
$id= $_SESSION['id'];

$query="SELECT b.b_qty, b.b_totalamt, b.b_date, b.payment_method, p.p_name, p.p_cat, p.p_price
FROM tbl_buyproduct b
JOIN tbl_product p ON b.p_id = p.p_id
WHERE b.u_id = '$id';
";
$result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));
echo"<form>";
echo"<table border='3' align='center'>";
echo"<tr><th>Product name</th><th>Product Category</th><th>Rate</th><th>Quantity</th><th>Payment method</th><th>Total Amount</th></tr>";
while ($row = mysqli_fetch_array($result)) {
//$p_id=$row['p_id'];
//$query="SELECT * FROM tbl_product WHERE p_id='$p_id'";
//$result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
//$rows=mysqli_fetch_array($result);
echo" <tr><td>".$row['p_name']."</td><td>".$row['p_cat']."</td><td>".$row['p_price']."</td><td>";
echo$row['b_qty']."</td><td>".$row['payment_method']."</td><td>".$row['b_totalamt']."</td></tr>";
}
echo"</from></table>";
?>