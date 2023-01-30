<?php
session_start();
error_reporting(0);
include("include/config.php");

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM recruiter WHERE emailid='".$_POST['username']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="index.php";//
$_SESSION['dlogin']=$_POST['username'];
$emailid=$_POST['username'];
$password=md5($_POST['password']);
///////////////////////////////////////////////////
                
				$mail = new PHPMailer; 
				$mail->isSMTP();                      // Set mailer to use SMTP 
				$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers   
				$mail->SMTPAuth = true;               // Enable SMTP authentication 
				$mail->Username = 'vaishnavihale2000@gmail.com';   // SMTP username 
				$mail->Password = 'hkdqypwyxutitjwc';   // SMTP password 
				$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
				$mail->Port = 587;                    // TCP port to connect to 

				// Sender info 
				$mail->setFrom('vaishnavihale2000@gmail.com', 'Placement Cell'); 
				$mail->isHTML(true); 
				$mail->Subject = 'Placement Cell'; 
				// Mail body content 
				$bodyContent = '<h1>Greetings From Placement Cell Department</h1>'; 
				$bodyContent .= '<p>Your Login Credentials and New Generated Password:<br>Username : '.$emailid.'<br>Password : '.$_POST['password'].'<br><h4>Use This Password For One Time. After Login If you want change your password. </h4></p>';
				$sql=mysqli_query($con,"Update recruiter set password='$password' where emailid='".$_POST['username']."'");
				$mail->Body    = $bodyContent; 
                //echo "<script>alert('Please Check Login'.$emailid.'');</script>";
				$mail->addAddress($emailid); 
				$mail->send();
 ////////////////////////////////////////
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo "<script>
      window.location.href = 'http://$host$uri/$extra';
      alert('Please Check Your Email');
</script>";
//header("location:http://$host$uri/$extra");
exit();
}
else
{
//echo "<script>alert('Please Check 453789Email');</script>";
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo "<script>
      window.location.href = 'http://$host$uri/$extra';
      alert('Successfullyghk Login');
</script>";
//header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Recruiter-Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

        <script>

		var password=document.getElementById("password");

		function genPassword() 
		{
		var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		var passwordLength = 7;
		var password = "";
		for (var i = 0; i <= passwordLength; i++) {
		var randomNumber = Math.floor(Math.random() * chars.length);
		password += chars.substring(randomNumber, randomNumber +1);
		}
			document.getElementById("password").value = password;
		}

		</script>

	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2> Placement| Forget Password</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
                            Forget Password
							</legend>
							<p>
								Please enter your email<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="username" placeholder="Username" required>
									<i class="fa fa-user"></i> </span>
							</div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Password :
                                </label>
                                <div>
                                <input type="password" name="password"  id="password" class="form-control"  placeholder="Password"  required>
                                <!-- <div id="button" class="btn1" ></div> -->
                                <br/>
                                <button type="button" onclick="genPassword()">Generate</button>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                                Submit
                            </button>
							
					
						</fieldset>
					</form>
                    </div>
					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Placement</span>. <span>All rights reserved</span>
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>