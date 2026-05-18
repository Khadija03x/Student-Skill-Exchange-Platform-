<?php

    session_start();

    include "db.php";

    if(!isset($_SESSION['id']))
    {
        header("location:login.php");
    }

    $id=$_SESSION['id'];

?>

<!DOCTYPE html>

<html>

<head>

	<title>Skill Match</title>

	<link rel="stylesheet" href="style.css">

</head>

    <body>

        <div class="container">

            <h2>Matched Users</h2>

            <?php

                $sql="SELECT DISTINCT users.name,
                users.email,
                skills.skill_name

                FROM users

                JOIN skills
                ON users.id=skills.user_id

                WHERE skills.type='teach'

                AND skills.skill_name IN(

                SELECT skill_name
                FROM skills

                WHERE user_id='$id'
                AND type='learn'

                )

                AND users.id!='$id'";

                $result=mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0)
                {

                    while($row=mysqli_fetch_assoc($result))
                    {

                        echo "<hr>";

                        echo "<b>Name:</b> ".$row['name'];

                        echo "<br>";

                        echo "<b>Email:</b> ".$row['email'];

                        echo "<br>";

                        echo "<b>Teaches:</b> ".$row['skill_name'];

                        echo "<br>";

                    }

                }

                else
                {

                    echo "No matching users found";

                }

            ?>

            <br><br>
                <a href="dashboard.php">
                    <button> Back</button>
                </a>
        </div>

    </body>

</html>