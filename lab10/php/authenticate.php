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
	
	$Acode=$_POST["Acode"];
	$Email=$_SESSION["Email"];
	print "Webdata ($Acode) ($Email) <br>";

	$query = "select * from Users where Acode='$Acode' and Email='$Email';";
	$result = mysqli_query($con, $query);
	if (!$result){
		$_SESSION["RegState"] =1;
		$_SESSION["Message"] ="Authentication select query failed: ".mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	print "Query worked <br>";

	$rows = mysqli_num_rows($result);
	if ($rows != 1){
		$_SESSION["RegState"]=0;
		$_SESSION["Message"]="Either Email or Acode not match.";
		header("location:../index.php");
		exit();
	}
	print "Authentication success<br>";

	$_SESSION["RegState"]=3;
	$_SESSION["Message"]="Authentication success. please set password.";
	header("location:../index.php");

	exit();
?>
