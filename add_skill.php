<?php

session_start();

include "db.php";

if(!isset($_SESSION['id']))
{
	header("location:login.php");
}

if(isset($_POST['submit']))
{

	$skill=$_POST['skill'];

	$type=$_POST['type'];

	$user_id=$_SESSION['id'];

	if(empty($skill))
	{
		echo "<script>alert('Enter skill name')</script>";
	}

	else
	{

        $sql="INSERT INTO skills(user_id,skill_name,type)

        VALUES('$user_id','$skill','$type')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>alert('Skill added successfully')</script>";
        }

	}

}

?>

<!DOCTYPE html>
<html>

    <head>

        <title>Add Skill</title>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <div class="container">

            <h2>Add Skill</h2>

            <form method="POST">

                <input type="text" name="skill" placeholder="Enter skill">

                <select name="type">

                <option value="teach"> Teach</option>
                <option value="learn">Learn</option>

                </select>
                <br><br>

                <button type="submit" name="submit">Add Skill</button>

            </form>

            <a href="dashboard.php">

            <button>

            Back

            </button>

            </a>
        </div>
    </body>
</html>