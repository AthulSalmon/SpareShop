<?php
date_default_timezone_set("Asia/Calcutta");
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('image/login.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            background-color: transparent; /* Set background color to transparent */
            margin: 0;
        }

        .container {
            width: 50%;
            margin: auto;
            background: rgba(255, 255, 255, 0.8); /* Use rgba for background with some transparency */
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .input-box,
        .column,
        .text-area,
        .selection-box,
        .gender-box,
        .password {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select,
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        .center {
            text-align: center;
        }

        /* Add styles for the gender box */
        .gender-box label {
            display: inline-block;
            margin-right: 10px;
        }

        .gender-box input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <section class="container">
        <form method="post" action="">
            <center>
                <h2>Registration Page</h2>
            </center>

            <div class="input-box">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter full name" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" placeholder="Enter phone number" required />
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address" required />
                </div>
            </div>

            <div class="text-area">
                <label for="address">Address</label>
                <textarea name="address" placeholder="Enter your address" required></textarea>
            </div>

            <div class="selection-box">
                <label for="dis">District</label>
                <select name="dis" id="dis">
                    <option value="">----select----</option>
                    <option value="idukki">Idukki</option>
                    <option value="ernakulam">Ernakulam</option>
                    <option value="kollam">Kollam</option>
                    <option value="kottayam">Kottayam</option>
                </select>
            </div>

            <div class="input-box">
                <label for="place">Place</label>
                <input type="text" name="place" placeholder="Enter your place" required />
            </div>

            <div class="gender-box">
                <label>Gender</label>
                <input type="radio" name="gender" value="male" /> Male
                <input type="radio" name="gender" value="female" /> Female
                <input type="radio" name="gender" value="other" /> Other
            </div>

            <div class="password">
                <div class="input-box">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter a password" required />
                </div>

                <div class="input-box">
                    <label for="pass2">Confirm Password</label>
                    <input type="password" id="pass2" name="pass2" placeholder="Confirm password" required />
                </div>
            </div>

            <center>
                <input type="submit" name="btnsave" value="Save" />
                <input type="submit" name="btncancel" value="Cancel" />
            </center>
        </form>
        <br>
        Go to <a href="login.php">Login</a>
    </section>
</body>
</html>

  <?php
  date_default_timezone_set("Asia/Calcutta");
  
  if(isset($_POST["btnsave"]))
  {
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $dis=$_POST["dis"];
    $place=$_POST["place"];
    $pass=$_POST["pass"];
    $pass2=$_POST["pass2"];
    if($pass==$pass2)
    {
      $query="INSERT INTO tbl_user(u_name,u_phn,u_address,u_email,u_district,u_place,u_pass,gender) VALUES('$name','$phone','$address','$email','$dis','$place','$pass','$gender')";
      
      $result=mysqli_query($con,$query)or die("connection error".mysqli_error($con));
      echo "<script> alert('Registration successful');</script>";
      
    }
    else
    {
      echo "<script>alert('Password mismatch');</script>";
    }
  }
  if(isset($_POST["btncancel"]))
  {
    // Handle cancel button click if needed
  }
  ?>
</html>
