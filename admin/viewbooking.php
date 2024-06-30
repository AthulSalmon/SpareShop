<?php
include ("../connection.php");
$total=0;
$query = "SELECT 
            b.b_qty, 
            b.b_totalamt, 
            b.b_date, 
            b.payment_method, 
            p.p_name, 
            p.p_cat, 
            p.p_price,
            u.u_name,
            u.u_phn
          FROM 
            tbl_buyproduct b
          JOIN 
            tbl_product p ON b.p_id = p.p_id
         JOIN
            tbl_user u ON b.u_id=u.u_id
            order by b.b_date DESC ";

$result = mysqli_query($con, $query) or die("Selection error: " . mysqli_error($con));
echo"<form>";
echo"<table border='3' align='center'>";
echo"<tr><th>Customer Name</th><th>Customer Phone number</th><th>Product name</th><th>Product Category</th><th>Rate</th><th>Quantity</th><th>Date</th><th>Payment method</th><th>Total Amount</th></tr>";
while ($row = mysqli_fetch_array($result)) {
    $date=$row['b_date'];
    $newdate= new DateTime($date);  
    $formattedDate = $newdate->format('d-m-Y'); 
    $total=$total+$row['b_totalamt'];
echo" <tr><td>".$row['u_name']."</td><td>".$row['u_phn']."</td><td>".$row['p_name']."</td><td>".$row['p_cat']."</td><td>".$row['p_price']."</td><td>";
echo$row['b_qty']."</td><td>".$formattedDate."</td><td>".$row['payment_method']."</td><td>".$row['b_totalamt']."</td></tr>";
}
echo"</from></table>";
echo"<table border='3' align='center'>";
echo"<tr><th> Total Sales Amount</th><td>$total</td>";
?>
<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        background-color: #ffffff;
    }

    form {
        text-align: center;
    }

    table.total {
        margin-top: 20px;
    }

    table.total th, table.total td {
        padding: 8px;
        text-align: right;
    }

    table.total th {
        background-color: #f2f2f2;
    }
  </style>