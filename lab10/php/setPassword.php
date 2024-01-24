<?php
    session_start();
    //Email is saved in $_SESSION["Email"]
    require_once("config.php");
    // Fetch data
    $Password = $_POST["inputPassword"];
    print "Fetched password($Password) Email=(".$_SESSION["Email"].")<br>";
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if (!$con){
        $_SESSION["RegState"] = 3;
        $_SESSION["Message"] = "Connection failed: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    print "DB connected <br>";

    // Password complexity check
    $uppercase = preg_match('@[A-Z]@', $Password);
    $lowercase = preg_match('@[a-z]@', $Password);
    $number    = preg_match('@[0-9]@', $Password);


    if(!$uppercase || !$lowercase || !$number || strlen($Password) < 8) {
        // Password does not meet complexity requirements
        $_SESSION["RegState"] = 3;
        $_SESSION["Message"] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        header("location:../index.php");
        exit();
    }

    $Password = md5($Password);

    //create the update
    $query = "Update Users set Password='$Password' where Email='".$_SESSION["Email"]
        ."';";
    $result=mysqli_query($con, $query);
    if ($result) print "Query worked <br>";
    else print "Query failed <br>";

    if (!$result){
        $_SESSION["RegState"]=3;
        $_SESSION["Message"]="Password update failure: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    $_SESSION["RegState"]=0;
    $_SESSION["Message"]="Password set. Please login.";
    header("location:../index.php");
    exit();
?>
