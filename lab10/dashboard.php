<?php
	session_start();
	if ($_SESSION["RegState"] != 4) {
		$_SESSION["RegState"] = 0;
		$_SESSION["Message"] = "Please login first.";
		header("location:index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Hirsa Kia">
		<meta name="generator" content="Jekyll v3.8.5">
		<title>Lab8. DOM and Event Scripting</title>
    <!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


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
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/bootstrap.bundle.min"></script>
    <script src="js/feather.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/lab8.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="js/final.js"></script>
<head>
  <body> 
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">tuq62578</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="php/logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item" id="showAll">
            <a class="nav-link active" href="#">
              <i class="fas fa-home"></i>
			  Hide Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
		  <li class="nav-item" id="run61">
            <a class="nav-link" href="#">
              <i class="fas fa-dot-circle"></i>
			  Hide Run Lab6.1
            </a>
          </li>
		  <li class="nav-item" id="run62">
            <a class="nav-link" href="#">
              <i class="fas fa-dot-circle"></i>
			  Hide Run Lab6.2
            </a>
          </li>
		  <li class="nav-item" id="report">
            <a class="nav-link" href="#">
              <i class="fas fa-layer-group"></i>
			  Hide Report
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CIS5015: Web Service Scripting</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
			
          </div>
		  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="feather feather-calendar"</span>
            This Week
          </button>
		  </div>
      </div>

	<div id="Lab62">
			  <h2 class="h2" >Lab6.2 Online</h2>
			  <div class="card" style="width: 100%;">
				<div class="card-header">
					Locality Mystery
				</div>
				<div class="card-body"> 
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						 
							<span class="btn btn-primary btn-small btn-block" data-toggle="collapse" 
								href="#correctMonitor">
								Loop Order Correctness Investigation
							</span>
					  </li>
					  <div class="collapse" id="correctMonitor">
						<div  class="card card-body">
							<form>
								Size(3-20): <input type="number" name="mSize" min="3" max="20" required>
								<button id="lab41a" class="btn btn-medium btn-primary">Run</button>
							</form>
							<hr>
							<div id="runtimeCorrectMonitor" class="card-body">
								Results:
							</div>
						</div>
					  </div>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						
						<span class="btn btn-primary btn-small btn-block" data-toggle="collapse" 
							href="#bestLoopOrder">Best Performing Order Investigation</span>
					  </li>
					  <div class="collapse" id="bestLoopOrder">
						<div  class="card card-body">
							<form>
								Size(100-2000): 
								<input type="number" name="mSize2" min="100" max="2000" required>
								Repeat(2-5): 
								<input type="number" name="mRep" min="2" max="5" required>
								<button id="lab41b" class="btn btn-medium btn-primary">
									Run
								</button>
							</form>
							<hr>
							<div id="loopOrderMonitor" class="card-body">
								Results:					
							</div>
							<hr>
							<button id="plot41b" class="btn btn-primary btn-block">Plot</button>
							<canvas class="my-4" id="myChart" width="900" height="380"></canvas>
						</div>
					  </div>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						
						<span class="btn btn-primary btn-small btn-block" data-toggle="collapse"
							href="#bestOrderScalability">
							Best Order Scalability Investigation</span>
					  </li>
					  <div class="collapse" id="bestOrderScalability">
						<div  class="card card-body">
							<form class="form-signin align-items-center">
								Loop Order:
								<input type="text" list="orders" class="mb-2" name="Order">
								<datalist id="orders">
									<option value="ijk">
									<option value="ikj">
									<option value="jik">
									<option value="jki">
									<option value="kij">
									<option value="kji">
								</datalist>						
								<div class="row">
									<input type="number" name="SSize" min="100" max="2000" class="col form-control" 
										placeholder="Start(N): 100-800" required autofocus>
									<input type="number" name="ESize" min="100" max="2000" class="col form-control" 
										placeholder="End(N): 100-800">
									<input type="number" name="Step" min="50" max="100" class="col form-control"
										placeholder="Step: 50-100">
								</div>
								<button id="lab41c" class="btn btn-lg btn-primary btn-block mt-2">Run</button>
							</form>	
							<hr>
							<div id="bestOrderMonitor" class="card-body">
								Results
							</div>
							<hr>
							<button id="plot41c" class="btn btn-primary btn-block">Plot</button>
							<canvas class="my-4" id="myChart2" width="900" height="380"></canvas>
						</div>
					  </div>
					</ul>
				</div> 
			  </div>
		  </div>

  	<div id="lab61">

		<h2 class="card-header" href="#card61">Lab6.1 online</h2>
			<div class="card" id="card61">
				<h6 class="card-header">Sort Magic</h6>
				<div class="card-body">
				<ul class="list-group list-group-flush">
						<li class="btn btn-primary btn-block mb-2" data-toggle="collapse" href="#cardC">Magic of Bubble Sorting</li>
							<div class="card mb-2" id="cardC">
								<li class="list-group-item">Lab6.2</li>
							</div>
					</ul>
				</div>
			</div>
	</div> 

  	<div id="Report">

		<h2 class="card-header" href="#projectreport">Lab6 Report</h2>
			<div class="card" id="projectreport">
				<h6 class="card-header">Report</h6>
				<div class="card-body">
				
				<ul class="list-group list-group-flush">
						<li class="btn btn-primary btn-block mb-2" data-toggle="collapse" href="#cardD">Magic of Bubble Sorting</li>
							<div class="card mb-2" id="cardD">
								<li class="list-group-item">Lab6.2</li>
							</div>
					</ul>
					</div>
			</div>
	</div> 	



</body></html>