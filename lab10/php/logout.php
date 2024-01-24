<?php
	session_start();
	// May need to log user's exit timestamp
	session_destroy();
	header("location:../index.php");
	exit();
?>