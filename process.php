<?php
include "database.php";

	//see if form was submitted
	if(isset($_POST["submit"])){
		$User = mysqli_real_escape_string($con, $_POST["User"]);
		$Message = mysqli_real_escape_string($con, $_POST["Message"]);
	
		//set timezone
		date_default_timezone_set("Europe/London");
		$Time = date("h:i:s a",time());
	
		//validate log in 
		if(!isset($User) || $User == "" || !isset($Message) || $Message == ""){
				$error = "Please fill in name and message!";
				header ("Location:index.php?error=".urlencode($error));
				exit();
			}else{
				$query = "INSERT INTO requests (User, Message, Time)
					VALUES ('$User', '$Message', '$Time')";
					
				if(!mysqli_query($con, $query)){
					die("Error!".mysqli_error($con));
					
				}else{
					header("Location: index.php");
					exit();
				}
			}	
	}
?>