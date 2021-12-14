<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	$connection = mysqli_connect('localhost','root','');
		if(!$connection){
			die("Database Connection Failed.".mysqli_error($connection));
		}
	$select_db = mysqli_select_db($connection, 'iso27001');
		if(!$select_db){
			die("Database Selection Failed.".mysqli_error($connection));
		}
    // If the username and the password are correct redirect to Home.html.
    if (isset($_POST) & !empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];
		
		$query = "SELECT * FROM `user_data` WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
        if($count==1){
			header('Location:Home.html');
            //echo $smsg = "User Created Successfully.";
        }
		else{
            echo $smsg ="Access Denied!";
        }
    }
?>
</body>