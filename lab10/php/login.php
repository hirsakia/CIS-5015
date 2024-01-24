<?php

	session_start();
	require_once("config.php");
	
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		$_SESSION["RegState"] =1;
		$_SESSION["Message"] ="Database connection failed".mysqli_error($con);
		Print "Database connection failed <br>";
		header("location:../index.php");
		exit();
	}
	print "Database connected <br>";
	
	$Email = $_POST["inputEmail"];
	$Password = md5($_POST[inputPassword]);
	$RememberMe = $_POST["rememberMe"];
	print "Email=($Email) password($Password) rememberMe($RememberMe) <br>";
	
	$query = "select * from Users where Password='$Password' and Email='$Email';";
	$result = mysqli_query($con, $query);
	if (!$result){
		$_SESSION["RegState"] =1;
		$_SESSION["Message"] ="Authentication select query failed: ".mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	print "Query worked <br>";

	$rows = mysqli_num_rows($result);
	print "we are ok";
	if ($rows != 1){
		$_SESSION["RegState"]=0;
		$_SESSION["Message"]="Either Email or Password not match.";
		header("location:../index.php");
		exit();
	}
	print "Authentication success<br>";
	$data = mysqli_fetch_assoc($result);
	if (isset($_POST["rememberMe"])){
		$_SESSION["UID"]=$data["ID"];
	} else unset($_SESSION["UID"]);
	$_SESSION["RegState"]=4;
	$_SESSION["Message"]="Login Completed.";	
	header("location:../dashboard.php");

	exit();

?>
