<?php
include "db.php";

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $department=$_POST['department'];

    if(empty($name) || empty($email) || empty($password) || empty($confirmpassword) || empty($department))
        {
            echo "<script>alert('Please fill all fields');</script>";
        }

    elseif($password!=$confirmpassword)
        {
            echo "<script>alert('Passwords do not match');</script>";
        }

    else{

        $check="SELECT * FROM users WHERE email='$email'";

        $result=mysqli_query($conn,$check);

        $count=mysqli_num_rows($result);

        if($count>0)
            {
                echo "<script>alert('Email already exists');</script>";
            }

        else{

            $sql="INSERT INTO users(name,email,password,department)

            VALUES('$name','$email','$password','$department')";

            if(mysqli_query($conn,$sql))
                {
                    echo "<script>
                    alert('Registration successful');
                    window.location='login.php';
                    </script>";
                }

            }

        }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>

    <body>

        <div class="container">
            <img class="logo" src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
            <h2>Register</h2>

                <form method="POST">

                    <input type="text" name="name" placeholder="Name">

                    <input type="email" name="email" placeholder="Email">

                    <input type="text" name="department" placeholder="Department">

                    <input type="password" name="password" placeholder="Password">

                    <input type="password" name="confirmpassword" placeholder="Confirm Password">

                    <button type="submit" name="submit">Register</button>

                </form>

            <p>Already have account?

                <a href="login.php">Login</a>

            </p>

        </div>

</body>

</html>