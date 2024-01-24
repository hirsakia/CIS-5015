<?php
	session_start();
	if (!isset($_SESSION["RegState"])) $_SESSION["RegState"]=0;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Hirsa Kia">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Lab10: Secure Web Service I</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	<link rel="stylesheet" href="css/signin.css">
	<script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/bootstrap.bundle.min.js"></script>
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

</head>
<body class="text-center">
<?php
	if ($_SESSION["RegState"]<=0){
?>
	<form id="loginForm" class="form-signin" action="php/login.php" method="POST">
		<img class="mb-4" src="images/temple-owls.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" name="rememberMe" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<div class="alert alert-info mt-2" id="MessageBox">
			<?php
				print $_SESSION["Message"];
				$_SESSION["Message"] = "";
			?>
		</div>
		<br>
		<a href="php/registerView.php">Register</a> | <a href="php/forgetView.php">Forget</a>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
	<?php
	}
	if ($_SESSION["RegState"]==1){
?>
	<form id="registerForm" class="form-signin" action="php/register.php" method="GET">
		<img class="mb-4" src="images/temple-owls.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
		
		<label for="inputFirstName" class="sr-only">First Name</label>
		<input type="text" name="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
		
		<label for="inputLastName" class="sr-only">Last Name</label>
		<input type="text" name="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
		
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		
		<br>

		<div class="g-recaptcha" data-sitekey="6LfO9-4lAAAAAP6RQl7r4yjwltEkq1WSj8qmalx1"></div>
		<br>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		<div class="alert alert-info mt-2" id="RMessageBox">
			<?php
				print $_SESSION["Message"];
				$_SESSION["Message"]="";
			?>
		</div>
		
		<a href="php/returnView.php">
		<button type="button" id="returnButton">Return</button>
		</a>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php
	}
	if ($_SESSION["RegState"]==2){
?>
	<form id="authenticateForm" class="form-signin" action="php/authenticate.php" method="POST">
		<img class="mb-4" src="images/temple-owls.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">CIS5015 Project Email Authentication</h1>
		 
		
		<label for="authenticationCode" class="sr-only">Authentication Code</label>
		<input type="text" name="Acode" class="form-control" placeholder="Enter Authentication Code" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Authenticate</button>
		<div class="alert alert-info mt-2" id="authMessageBox">
			<?php
				print $_SESSION["Message"];
				$_SESSION["Message"] = "";
			?>
		</div>
		<br>
		<a href="php/returnView.php">
			<button type="button" id="authButton">Return</button>
		</a>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
<?php
	}
	if ($_SESSION["RegState"]==3){
?>
	<form id="setPasswordForm" class="form-signin" action="php/setPassword.php" method="POST">
		<img class="mb-4" src="images/temple-owls.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">CIS5015 Project Password Setting</h1>
		
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
		<div class="alert alert-info mt-2" id="setPasswordMessageBox">
			<?php
				print $_SESSION["Message"];
				$_SESSION["Message"] = "";
			?>		
		</div>
		<br>
		<button type="button" id="returnButton">Return</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
<?php
	}
	if ($_SESSION["RegState"]==5){
?>
	<form id="resetPasswordForm" class="form-signin" action="php/resetPassword.php" method="POST">
		<img class="mb-4" src="images/temple-owls.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">CIS5015 Project Password Recovery</h1>
		 
		<!--<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>-->
		
		<label for="registeredEmail" class="sr-only">Registered Email</label>
		<input type="email" name="registeredEmail" class="form-control" placeholder="Registered email address" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Send Email</button>
		<div class="alert alert-info mt-2" id="resetPMessageBox">
			<?php
				print $_SESSION["Message"];
				$_SESSION["Message"] = "";
			?>
		</div>
		<br>
		<a href="php/returnView.php">
			<button type="button" id="loginButton">Return</button>
		</a>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
	</form>
<?php
	} 
?>
</body>
</html>
