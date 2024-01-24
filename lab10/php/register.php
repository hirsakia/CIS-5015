<?php
	session_start();
	
	require_once("config.php");
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	require '../PHPMailer-master/src/Exception.php';
	require '../PHPMailer-master/src/PHPMailer.php';
	require '../PHPMailer-master/src/SMTP.php';
	
	$FirstName = $_GET["inputFirstName"];
	$LastName = $_GET["inputLastName"];
	$Email = $_GET["inputEmail"];
	$recaptcha = $_GET['g-recaptcha-response'];
	print "webdata ($Email) ($FirstName) ($LastName) <br>";
	
	// Verify reCAPTCHA
	$recaptcha_secret = '6LfO9-4lAAAAAHsBuR60rlT6zgSs-hHYLGB5It06';
	$recaptcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha");
	$recaptcha_response = json_decode($recaptcha_response, true);
	
	if (!$recaptcha_response['success']) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "reCAPTCHA verification failed";
		header("location:../index.php");
		exit();
	}
	
	$con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
	if (!$con) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "Database connection failed" . mysqli_error($con);
		Print "Database connection failed <br>";
		header("location:../index.php");
		exit();
	}
	print "Database connected <br>";
	$Acode = rand();
	$Rdatetime = date("Y-m-d h:i:s");
	$query = "Insert into Users (FirstName,LastName,Email, Acode, Rdatetime) values ('$FirstName','$LastName', '$Email', '$Acode', '$Rdatetime');";
	$result = mysqli_query($con, $query);
	if (!$result) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "Database insert failed: " . mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	if (mysqli_affected_rows($con) != 1) {
		$_SESSION["RegState"] = 1;
		$_SESSION["Message"] = "Database insert check failed: " . mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	$_SESSION["RegState"] = 2;
	print "Registration successful. Ready to send Email.";

	$mail = new PHPMailer(true);
	try {
		$mail->SMTPDebug = 3;
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "cis501562578@gmail.com";
		$mail->Password = 'yezewgdhikhuytzm';
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->setFrom("hirsa.kia@temple.edu", "Hirsa");
		$mail->addReplyTo("hirsa.kia@temple.edu", "Hirsa");
		$msg = "Please use your personal authentication code to set password $Acode";
		$mail->addAddress($Email, "$FirstName $LastName");
		$mail->Subject = "Welcome";
		$mail->Body = $msg;
		$mail->send();
		print "Email Sent ... <br>";
		$_SESSION["RegState"]=2;
		$_SESSION["Message"]="Email Sent.";
		$_SESSION["Email"] = $Email;
		header("location:../index.php");
	} catch (phpmailerException $e) {
		$_SESSION["RegState"]=-4;
		$_SESSION["Message"]="Mailer error: ".$e->errorMessage();
		print "Message = [".$_SESSION["Message"]."]<br>";
	}
	
	header("location:../index.php");
	exit();
?>