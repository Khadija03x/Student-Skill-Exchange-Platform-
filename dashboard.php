<?php

    session_start();

    if(!isset($_SESSION['id']))
        {

            header("location:login.php");

        }

?>

<!DOCTYPE html>

<html>

     <head>

        <title>Dashboard</title>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <div class="container">
             <img class="logo" src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
            <h2> Welcome <?php echo $_SESSION['name']; ?> </h2>

                <a href="profile.php"> <button>Profile</button> </a>

                <a href="add_skill.php"> <button>Add Skill</button> </a>

                <a href="match.php"> <button>Find Match</button> </a>

                <a href="logout.php"> <button>Logout</button> </a>

        </div>

    </body>

</html>