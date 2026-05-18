<?php

session_start();

include "db.php";

if(isset($_POST['login']))
    {

        $email=$_POST['email'];

        $password=$_POST['password'];

        if(empty($email)||empty($password))
        {

            echo "<script>alert('Please fill all fields');</script>";

        }

        else
        {

            $sql="SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0)
                {

                $row=mysqli_fetch_assoc($result);

                $_SESSION['id']=$row['id'];

                $_SESSION['name']=$row['name'];

                echo "<script>

                alert('Login successful');

                window.location='dashboard.php';

                </script>";

            }

            else
            {

                echo "<script>alert('Invalid email or password');</script>";

            }

        }

    }

?>

<!DOCTYPE html>

<html>

    <head>

        <title>Login</title>

        <link rel="stylesheet" href="style.css">

    </head>
    <body>

        <div class="container">
             <img class="logo" src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
            <h2>Login</h2>

                <form method="POST">

                    <input type="email" name="email" placeholder="Email">

                    <input type="password" name="password" placeholder="Password">

                    <button type="submit" name="login"> Login </button>

                </form>

            <p>

                No account?

                <a href="register.php">

                    Register

                </a>

            </p>

        </div>

    </body>

</html>