<!DOCTYPE html>
<html>
<head>
    <title>Spare Part Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #4CAF50;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        nav li {
            float: left;
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        #logo {
            display: block;
            margin: 10px auto; /* Adjust the margin as needed */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: end;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome User</h1>
    </header>

    <nav>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="searchproduct.php">Search</a></li>
            <li><a href="viewallproduct.php"> View product</a></li>
            <li><a href="viewbooking.php"> Booking Details</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Add your image tag below -->
    <img  src="../image/user.jpg" alt="Logo" height=1000 width="1365">

    <!-- Footer Section -->
    <footer>
        &copy; 2023 Spare Part Shop. All rights reserved.
    </footer>
</body>
</html>
