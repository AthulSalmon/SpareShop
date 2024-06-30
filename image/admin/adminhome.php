<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spare Part Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #f4f4f4;
            padding: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            float: left;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        a:hover {
            color: #009688;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome Admin</h1>
    </header>

    <nav>
        <ul>
            <li><a href="addproduct.php">Add Spare Part</a></li>
            <li><a href="viewbooking.php">View Booking</a></li>
            <li><a href="purchasebill.php">Purchase Bill</a></li>
            <li><a href="../login.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
