<html><title>Bill</title>
<center><h2>Spare part Invoice</h2></center>
<?php
include ("../connection.php");

session_start();
$qty=$_SESSION['qty'];
$total=$_SESSION['total'];
$date= $_SESSION['date'];
$method=$_SESSION['method'];
$u_id=$_SESSION['u_id'];
$p_id= $_SESSION['p_id'];
$query=" SELECT * FROM `tbl_user` WHERE u_id='$u_id'";
$result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
$row=mysqli_fetch_array($result);
echo"<br><br><br><br><center><table border=1><tr><td>";
echo "Name :</td><td>".$row['u_name']."</td></tr><tr><td>Phone :</td><td>".$row['u_phn'];
echo"</td></tr><tr><td>Email :</td><td>".$row['u_email'];
$query="SELECT * FROM tbl_product WHERE p_id='$p_id'";
$result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
$row=mysqli_fetch_array($result);
echo"</td></tr><tr><td>Product name :</td><td>".$row['p_name'];
//echo"</td></tr><tr><td>Part Category :</td><td>".$row['p_cat'];
//echo "</td></tr><tr><td>Price :</td><td>$".$row['p_price'];
//echo"</td></tr><tr><td>Quantity :</td><td>".$qty;
echo"</td></tr><tr><td>date  :</td><td>".$date."</table>";
//echo"</td></tr><tr><td> Grand Total  :</td><td>$".$total."</table>";
echo"<form>";
echo"<table border='3' align='center'>";
echo"<tr><th>Product name</th><th>Product Category</th><th>Quantity</th><th>Rate</th><th>Total Amount</th></tr>";
echo" <tr><td>".$row['p_name']."</td><td>".$row['p_cat']."</td><td>".$qty."</td><td>".$row['p_price']."</td><td>".$total;
   echo"</from></table>";
    echo"<button> Print</button>";
    echo"<li><a href='userhomepage.php'>Back to home</a></li>";
    ?>
    </html>
