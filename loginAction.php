<?php
session_start();

require_once 'db_connect.php';

// checking the user

if(isset($_POST['submit1'])){
    require_once 'db_connect.php';

	$email = mysqli_real_escape_string($con,$_POST['email']);

	$pass = mysqli_real_escape_string($con,$_POST['pass']);

	//search student

	$sel_std = 'SELECT * FROM student WHERE email="'.$email.'" AND pass="'.$pass.'"';

	$run_std = mysqli_query($con, $sel_std);

	$check_std = mysqli_num_rows($run_std);

	//search subject Professional

	$sel_pro = "select * from prof WHERE email='$email' AND pass='$pass'";

	$run_pro = mysqli_query($con, $sel_pro);

	$check_pro = mysqli_num_rows($run_pro);

	//search Admin

	$sel_admin = "select * from admin WHERE email='$email' AND pass='$pass'";

	$run_admin = mysqli_query($con, $sel_admin);

	$check_admin = mysqli_num_rows($run_admin);

	//check student

	if($check_std>0){

		$_SESSION['user_email']=$email;

		echo "<script>window.open('StudentEditProfile.php','_self')</script>";


	}

	//check pro

	elseif ($check_pro>0) {
		$_SESSION['user_email']=$email;

		echo "<script>window.open('ProEditProfile.php','_self')</script>";
		
	}

	//check admin

	elseif ($check_admin>0) {
		$_SESSION['user_email']=$email;

		echo "<script>window.open('AdminEditProfile.php','_self')</script>";
		
	}

	else {

		echo "<script>alert('Email or password is not correct, try again!')</script>";
		echo "<script>window.location.href = 'index.php' </script>";

	}

}
//$conn->close();
?>