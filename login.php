
<?php
date_default_timezone_set("Asia/Calcutta");
include ("connection.php");
?>



<?php
session_start();
if(isset($_POST['btnsave']))
{
      $email=$_POST["uname"];
      $pass=$_POST["pass"];

      $query="select * from tbl_admin where admin_email='$email' and admin_pass='$pass'";
        $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
        $row=mysqli_fetch_array($result);

        if($row)
          {
            
            $email1=$row['admin_email'];
            $pass1=$row['admin_pass'];
            if($email==$email1 and $pass1==$pass)
            {
              $_SESSION['email']=$row['admin_email'];
              header('Location:admin/adminhome.php');
              exit();
            }
          }

       $query="select * from tbl_user where u_email='$email' and u_pass='$pass'";
        $result=mysqli_query($con,$query)or die("selection error".mysqli_error($con));
        $row=mysqli_fetch_array($result);

        if($row)
          {
            $email1=$row["u_email"];
            $pass1=$row["u_pass"];
            if($email==$email1 and $pass1==$pass)
            {
              $_SESSION['id']=$row['u_id'];
              echo "<script> alert('Login successfull');</script>";
             header('Location:user/userhomepage.php');
              exit();
            }
            
           }
        else
        {
          echo "<script> alert('invalid userid or password');</script>";
        }
      }
  
  
?>
        </html>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('image/login.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        #login-container {
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 50px;
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: #fff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    
    <div id="login-container">
        <h1>Login</h1>

        <?php if (isset($error_message)): ?>
            <p style="color: #ff0000;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="uname"placeholder="Enter your email" required />
            <br>
            <label for="password">Password:</label>
            <input type="Password" id="pass" name="pass"placeholder="Enter your password" required />
            <br>
            <button type="submit" name="btnsave">Login</button>
        </form>

        Don't have an account ? <a href="registration.php">Sign up</a><br>
     Back to home ? <a href="Index.php">Home</a>
    </div>
</body>
</html>