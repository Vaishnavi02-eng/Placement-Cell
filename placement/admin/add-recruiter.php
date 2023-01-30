<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

check_login();
if(isset($_POST['submit']))
{

	$company_id 					=$_POST["company_id"];
	$name 							=$_POST["name"];
	$designation					=$_POST["designation"];
	$emailid 						=$_POST["emailid"];
	$contact_no						=$_POST["contact_no"];
	$experience						=$_POST["experience"];
	$password 						=md5($_POST['password']);

	$sql1="select * from recruiter where(emailid='$emailid');";
	$res=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($res) > 0) {
	
		$row = mysqli_fetch_assoc($res);
		if($emailid==isset($row['emailid']))
		{
				echo "<script>alert('email already exists');</script>";
		}
	}
	else{


		$sql="insert into recruiter(company_id,name,designation,emailid,contact_no,experience,password)values('$company_id','$name','$designation','$emailid','$contact_no','$experience','$password ')";
		$query=$conn->query($sql);
		if($query)
			{
				echo "<script>alert('Successfully Recruiter Added');</script>";
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
				$bodyContent .= '<p>Your Login Credentials are:<br>Username : '.$emailid.'<br>Password :'.$_POST['password'].'</p>';
				$mail->Body    = $bodyContent; 
				$mail->addAddress($emailid); 
				$mail->send();
			}
			else{
				echo "<script>alert('Try Again.');</script>";
			}

	}
	
}

	function sendMailToRecruiter($mail,$email,$pwd){
		$mail->Subject = 'Placement Cell'; 
            // Mail body content 
    		$bodyContent = '<h1>Greetings From Placement Cell Department</h1>'; 
    		$bodyContent .= '<p>Your Login Credentials are:<br>Username : '.$email.'<br>Password :'.$pwd.'</p>';
    		$mail->Body    = $bodyContent; 
		$mail->addAddress($email); 
    	$mail->send();
		}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    	<title>Company | Add</title>
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
    	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    	<link rel="stylesheet" href="assets/css/styles.css">
    	<link rel="stylesheet" href="assets/css/plugins.css">
    	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

		<script>

		var password=document.getElementById("password");

		function genPassword() 
		{
		var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		var passwordLength = 5;
		var password = "";
		for (var i = 0; i <= passwordLength; i++) {
		var randomNumber = Math.floor(Math.random() * chars.length);
		password += chars.substring(randomNumber, randomNumber +1);
		}
			document.getElementById("password").value = password;
		}

		</script>


    </head>
    <body>
    	<div id="app">		
    		<?php include('include/sidebar.php');?>
    		<div class="app-content">

    			<?php include('include/header.php');?>

    			<!-- end: TOP NAVBAR -->
    			<div class="main-content" >
    				<div class="wrap-content container" id="container">
    					<!-- start: PAGE TITLE -->
    					<section id="page-title">
    						<div class="row">
    							<div class="col-sm-8">
    								<h1 class="mainTitle">Admin | Add Recruiter</h1>
    							</div>
    							<ol class="breadcrumb">
    								<li>
    									<span>Admin</span>
    								</li>
    								<li class="active">
    									<span>Add Recruiter</span>
    								</li>
    							</ol>
    						</div>
    					</section>
    					<!-- end: PAGE TITLE -->
    					<!-- start: BASIC EXAMPLE -->
    					<div class="container-fluid container-fullw bg-white">
    						<div class="row">
    							<div class="col-md-12">

    								<div class="row margin-top-30">
    									<div class="col-lg-6 col-md-12">
    										<div class="panel panel-white">
    											<div class="panel-heading">
    												<h5 class="panel-title">Recruiter Details</h5>
    											</div>
    											<div class="panel-body">
    												<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
    												<?php echo htmlentities($_SESSION['msg']="");?></p>	
    												<form role="form" name="dcotorspcl" method="post" >
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Name of Company : 
    														</label>
    														<select name="company_id" class="form-control" required="required">
    															<option value="">-</option>
    															<?php $ret=mysqli_query($conn,"select * from company order by company_name");
    															while($row=mysqli_fetch_array($ret))
    															{
    																?>
    																<option value="<?php echo htmlentities($row['company_id']);?>">
    																	<?php echo htmlentities($row['company_name']);?>
    																</option>
    															<?php } ?>

    														</select>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Name of Recruiter :
    														</label>
    														<input type="text" name="name" class="form-control"  placeholder="Name of Recruiter" required>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Designation :
    														</label>
    														<input type="text" name="designation" class="form-control"  placeholder="Enter Designation" required>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Enter Email Id :
    														</label>
    														<input type="text" name="emailid" class="form-control" required  placeholder="Enter Email Id" required>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Contact No :
    														</label>
    														<input type="text" name="contact_no" class="form-control"  placeholder="Contact No" maxlength="10" required>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Experience :
    														</label>
    														<input type="text" name="experience" class="form-control"  placeholder="Experience" maxlength="2" required>
    													</div>
    													<div class="form-group">
    														<label for="exampleInputEmail1">
    															Password :
    														</label>
    														<div>
    														<input type="text" name="password"  id="password" class="form-control"  placeholder="Password"  required>
															<!-- <div id="button" class="btn1" ></div> -->
															<br/>
															<button type="button" onclick="genPassword()">Generate</button>
															</div>
    													</div>
    													<button type="submit" name="submit" class="btn btn-o btn-primary">
    														Submit
    													</button>
    												</form>
    											</div>
    										</div>
    									</div>

    								</div>
    							</div>
    							<div class="col-lg-12 col-md-12">
    								<div class="panel panel-white">


    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- end: BASIC EXAMPLE -->
    			<!-- end: SELECT BOXES -->

    		</div>
    	</div>
    </div>
    <!-- start: FOOTER -->
    <?php include('include/footer.php');?>
    <!-- end: FOOTER -->

    <!-- start: SETTINGS -->
    <?php include('include/setting.php');?>

    <!-- end: SETTINGS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
	jQuery(document).ready(function() {
		Main.init();
		FormElements.init();
	});
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
