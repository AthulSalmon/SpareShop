<html>
        <br><br><br>
       <center> <h2>PROFILE</h2></center>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    table {
        border-collapse: collapse;
        width: 50%;
        margin: 50px auto;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 12px;
    }

    th {
        background-color: #f2f2f2;
    }

    center {
        margin-top: 50px;
    }
</style>
</html>
<?php

include ("../connection.php");
// Start the session
session_start();

// Retrieve a session variable
$id= $_SESSION['id'];

// Use the variable
$query="select * from tbl_user where u_id='$id'";
        $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
        $row=mysqli_fetch_array($result);
        echo"<br><br><br><br><center><table border=1><tr><td>";
        echo "Name :</td><td>".$row['u_name']."</td></tr><tr><td>Phone :</td><td>";
        echo $row['u_phn']."</td></tr><tr><td>Address :</td><td>".$row['u_address'];
        echo"</td></tr><tr><td>District :</td><td>".$row['u_district']."</td></tr><tr><td>Place :</td><td>";
        echo $row['u_place']."</td></tr><tr><td>Email :</td><td>".$row['u_email']."</td></tr><tr><td>Gender :</td><td>".$row['gender']."</table></center>";
    
?>
