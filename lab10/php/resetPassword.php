<?php

	session_start();
	require_once("config.php");

	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "Database connection failed" . mysqli_error($con);
		header("location:../index.php");
		exit();
	}

	$registeredEmail = $_POST["registeredEmail"];

	// Check if email exists in Users table
	$query = "SELECT * FROM Users WHERE Email='$registeredEmail';";
	$result = mysqli_query($con, $query);
	if (!$result) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "Error: " . mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	print "User found<br>";
	
	$rows = mysqli_num_rows($result);
	if ($rows != 1) {
		$_SESSION["RegState"] = 5;
		$_SESSION["Message"] = "Error: Email not registered.";
		header("location:../index.php");
		exit();
	}
	$row = mysqli_fetch_assoc($result);

	$Acode = $row['Acode'];
	print ("Acode is $Acode<br>");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	require '../PHPMailer-master/src/Exception.php';
	require '../PHPMailer-master/src/PHPMailer.php';
	require '../PHPMailer-master/src/SMTP.php';		  
	
	$mail = new PHPMailer (true);
	try {
		$mail->SMTPDebug = 3;
		$mail->IsSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->SMTPAuth=true;
		$mail->Username="cis501562578@gmail.com";
		$mail->Password='yezewgdhikhuytzm';
		$mail->SMTPSecure="ssl";
		$mail->Port=465;
		$mail->SMTPKeepAlive=true;
		$mail->Mailer="smtp";
		$mail->setFrom("hirsa.kia@temple.edu","Hirsa");
		$mail->addReplyTo("hirsa.kia@temple.edu","Hirsa");
		$msg="Please use this code to reset password ($Acode)";
		$mail->addAddress($registeredEmail);
		$mail->Subject="Password Recovery";
		$mail->Body=$msg;
		$mail->send();
		print "Email Sent ... <br>";
		$_SESSION["RegState"]=2;
		$_SESSION["Message"]="Email Sent.";
		$_SESSION["Email"] = $registeredEmail;
		header("location:../index.php");
	} catch (phpmailerException $e) {
		$_SESSION["RegState"]=-4;
		$_SESSION["Message"]="Mailer error: ".$e->errorMessage();
		print "Message = [".$_SESSION["Message"]."]<br>";
	}
	print "Registration successful. Ready to send Email.";
	header("location:../index.php");

	exit();
?>