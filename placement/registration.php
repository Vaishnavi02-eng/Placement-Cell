<?php
include_once('include/config.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$tenth=$_POST['10th'];
$twelveth=$_POST['12th'];
$course=$_POST['course'];
$branch=$_POST['branch'];
$backlog=$_POST['backlog'];
$year_gap=$_POST['year-gap'];
//$no_of_backlog=$_POST['no-of-backlog'];

$semester_3=$_POST['semester-3'];
$age=$_POST['age'];
$experience=$_POST['experience'];

$email=$_POST['email'];
$password=md5($_POST['password']);

$sql1="select * from student where(email='$email');";
		$res=mysqli_query($conn,$sql1);
		if (mysqli_num_rows($res) > 0) {
        
			$row = mysqli_fetch_assoc($res);
			if($email==isset($row['email']))
			{
					echo "<script>alert('email already exists');</script>";
			}
		}
		else
		{
		$sql="INSERT INTO student(fullName, address, city, gender, 10th, 12th, course,branch, backlog, gap_year, semester_3, age, experience, email, password) VALUES ('$fname','$address','$city','$gender','$tenth','$twelveth','$course','$branch','$backlog','$year_gap','$semester_3','$age','$experience','$email','$password');";

		$query=$conn->query($sql);
		if($query)
			{
				
				//echo "<script>alert('Thanks, We Will Contact you Shortly');</script>";
			echo "<script>alert('Successfully Registered. You can login now');</script>";
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
			$bodyContent .= '<p><h4>Your Registration is Successfully Done.<br><br>Now you can successfully login.</h4></p>';
			$mail->Body    = $bodyContent; 
			$mail->addAddress($email); 
			$mail->send();
			}else{
			echo "<script>alert('Try Again.');</script>";
			}
		}
		
	}
?>
<!-- <?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$tenth=$_POST['10th'];
$twelveth=$_POST['12th'];
//$diploma=$_POST['diploma'];
$backlog=$_POST['backlog'];
$year_gap=$_POST['year-gap'];
//$no_of_backlog=$_POST['no-of-backlog'];

$semester_3=$_POST['semester-3'];
$age=$_POST['age'];
$experience=$_POST['experience'];


$email=$_POST['email'];
$password=md5($_POST['password']);


$course=$_POST['course'];
$branch=$_POST['branch'];

$sql1="select * from student where(email='$email');";
		$res=mysqli_query($conn,$sql1);
		if (mysqli_num_rows($res) > 0) {
        
			$row = mysqli_fetch_assoc($res);
			if($email==isset($row['email']))
			{
					echo "<script>alert('email already exists');</script>";
			}
			else
			{
				$sql="INSERT INTO student(fullName, address, city, gender, 10th, 12th, course,branch,backlog, gap_year, semester_3, age, experience, email, password) VALUES ('$fname','$address','$city','$gender','$tenth','$twelveth','$course','$branch','$backlog','$year_gap','$semester_3','$age','$experience','$email','$password');";

				$query=$conn->query($sql);
				if($query)
					{
					echo "<script>alert('Successfully Registered. You can login now');</script>";
					}else{
					echo "<script>alert('Try Again.');</script>";
					}

			}
		}
	


}
?> -->


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Student Registration</title>
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
			function valid(){
				let x=document.forms["registration"]["full_name"].value;
				let y=document.forms["registration"]["address"].value;
				let z=document.forms["registration"]["city"].value;
				let a=document.forms["registration"]["password"].value;
				let b=document.forms["registration"]["password_again"].value;
				if(x==y){
					alert("Please Avoid Duplicate Entries");
					return false;
				}
				if(y==z)
				{
					alert("Please Avoid Duplicate Entries");
					return false;
				}
				if(x==z)
				{
					alert("Please Avoid Duplicate Entries");
					return false;
				}
				if(a!=b){
					alert("Password should be same");
					return false;
				}
			}
			</script>
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.htmlssss"><h2>Student Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onsubmit="return valid()">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" pattern="[a-zA-Z'-'\s]*" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" pattern="[A-Za-z0-9'\.\-\s\,]" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" pattern="[a-zA-Z'-'\s]*" required>
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<p>
								Enter your Academic details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="number" class="form-control" name="10th" id="10th" placeholder="10th Percent(%) " min="35" max="100" required>
									<i class="fa fa-plus"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="number" class="form-control" name="12th" id="12th" placeholder="Enter your 12th/Diploma percentage(%) " min="35" max="100"  required>
									<i class="fa fa-plus"></i> </span>
							</div>
							

							<div class="form-group">	
							<span class="input-icon">
							<label>Choose Current Course:</label>
								<select name="course" id="course" class="form-control" required>
								<option value="">Current Course</option>
								<option value="1">BTech</option>
								<option value="2">MTech</option>
								<!-- <option value="Bsc">Bsc</option> -->
								</select>
							 </span></div>

							<div class="form-group">	
							<span class="input-icon">
							<label>Choose Current Specialization:</label>
							<select name="branch" id="branch" class="form-control" required>
							<option value="">Current Specialization</option>
							<option value="Civil Engineering">Civil Engineering</option>
								<option value="Electrical Engineering">Electrical Engineering</option>
								<option value="Mechanical Engineering">Mechanical Engineering</option>
								<option value="Information Technology Engineering">Information Technology Engineering</option>
								<option value="Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
								<option value="Computer Science Engineering">Computer Science Engineering</option>
								<option value="Information Technology">Information Technology</option>
								<option value="Electronic">Electronic</option>
								<option value="Computer Science ">Computer Science </option>
								<!-- <option value="">Computer Science Engineering</option> -->

								</select>
							</span></div>

							<p>
								Enter Aggregate upto current Semester(%) :
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="number" class="form-control" name="semester-3" id="semester-3" placeholder="Aggregate upto current Semester" min="35" max="100"  required>
									<i class="fa fa-plus"></i> </span>
							</div>

							<div class="form-group">
							<span class="input-icon">
								<label>No of backlog:</label>
								<input type="number" class="form-control" name="backlog" id="backlog" placeholder="No of on going backlog" min="0" required >
									
							</div>
							<div class="form-group">
							<span class="input-icon">
								<label>No of Gap Year:</label>
								<input type="number" class="form-control" name="year-gap" id="year-gap" placeholder="No of Gap Year" min="0" required >
									
							</div>
							<div class="form-group">
							<span class="input-icon">
								<label>Age:</label>
								<input type="number" class="form-control" name="age" id="age" placeholder="your age" min="20" required >
									
							</div>
							<div class="form-group">
							<span class="input-icon">
								<label>Experience:</label>
								<input type="number" class="form-control" name="experience" id="experience" placeholder="If you are fresher then place 0" min="0" required >
									
							</div>

							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" min="6" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_again" placeholder="Password Again" min="6" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Placement Cell</span>. <span>All rights reserved</span>
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
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	<!-- end: BODY -->
</html>