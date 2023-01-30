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
	
if(isset($_POST['submit']))
{
	$emailid=$_SESSION['dlogin'];
	$jobrole=$_POST['jobrole'];
	$tenth=$_POST['10th-Marks'];
	$twelveth=$_POST['12th-Marks'];
	$dbranch=$_POST['dbranch'];
	$batch=$_POST['batch'];
	$backlog=$_POST['backlog'];
	$gap_year=$_POST['gap-year'];
	$semester_3=$_POST['semester-3'];
	$experience=$_POST['experience'];
	$url=$_POST['url'];
	$location=$_POST['location'];
	$ctc=$_POST['ctc'];
	$train=$_POST['train'];
	$inter=$_POST['inter'];
	$bond=$_POST['bond'];
	$aboutcompany=$_POST['aboutcompany'];
	$body=$_POST['body'];
	$pro=$_POST['pro'];
	$appdate=$_POST['appdate'];
	
	
	$sql=mysqli_query($con,"insert into company_criteria(recruiter_id,jobrole,10th,12th,dbranch,batch,backlog,gap_year,semester_3,experience,url,location,ctc,train,inter,bond,aboutcompany,body,pro,appdate)values('$emailid','$jobrole','$tenth','$twelveth','$dbranch','$batch','$backlog','$gap_year','$semester_3','$experience','$url','$location','$ctc','$train','$inter','$bond','$aboutcompany','$body','$pro','$appdate');");
	if($sql)
	{
		echo "<script>alert('Company Job Criteria Added Successfully')</script>";
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
		$sql="select email from student";

		$result =$con->query($sql);

		if(mysqli_num_rows($result)){
			while($row=mysqli_fetch_assoc($result))
			{
				$email=$row['email'];
				echo $email;
				//sendMailToRecruiter($mail,$email);
				$mail->Subject = 'Placement Cell'; 
				// Mail body content 
				$bodyContent = '<h3>Greetings From Placement Cell Department</h3>'; 
				$bodyContent .= '<p>New Company Added to our Placement Cell.</p>
								<p> Grab the opportunity and apply for the Drive. </p>';
				$mail->Body    = $bodyContent; 
				$mail->addAddress($email); 
				
				// $mail->addAddress($email); 
				// $mail->send();
			}	
			$mail->send();
		}
		
	}
}
// function sendMailToRecruiter($mail,$email){
// 	$mail->Subject = 'Placement Cell'; 
// 		// Mail body content 
// 		$bodyContent = '<h1>Greetings From Placement Cell Department for Student</h1>'; 
// 		//$bodyContent .= '<p>Your Login Credentials are:<br>Username : '.$email.'<br>Password :'.$pwd.'</p>';
// 		$mail->Body    = $bodyContent; 
// 	$mail->addAddress($email); 
// 	$mail->send();
// 	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recruiter | Company Criteria</title>
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

</head>
<body>
	<div id="app">		
		<?php include('include/sidebar.php');?>
		<div class="app-content">
			<?php include('include/header.php');?>
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Recruiter | Company Criteria Details</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Recruiter</span>
								</li>
								<li class="active">
									<span>Company Criteria Details</span>
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
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title"><h3>Criteria For Job</h3></h5>
											</div>
											<div class="panel-body">
												<form role="form" name="forms" method="post">

												        <div class="form-group">
														Role Name(Designation) : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="text" name="jobrole" class="form-control" placeholder="ex: Android Developer" style="width: 320px;" required>
															</label>
                                                        </div>
														
														<div class="form-group">
														10th Marks : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>	
															<input type="number" name="10th-Marks" class="form-control" placeholder="Enter 10th Percentage(%)" min="35" max="100" style="width: 400px;" required>
															</label>
														
														</div>


														<div class="form-group">
															12th/Diploma Marks : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
																<input type="number" name="12th-Marks" class="form-control" placeholder="Enter 12th/Diploma percentage(%)" min="35" max="100" style="width: 350px;" required>
															</label>
															
														</div>
												
														<div class="form-group">
														Target Degree: &nbsp;&nbsp;&nbsp;&nbsp;
																	<label>
																		
																	<input type="text" id="dbranch" name="dbranch" class="form-control" placeholder="ex: BTech/MTech" style="width: 385px;" required>
																	</label>
														</div>

														<div class="form-group">
														Batch (Graduation Year): &nbsp;&nbsp;&nbsp;&nbsp;
																	<label>
																		
																	<input type="text" id="batch" name="batch" class="form-control" placeholder="ex: 2017-2022" style="width: 330px;" required>
																	</label>
														</div>

														<div class="form-group">
														Backlog : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
															<input type="number" name="backlog" class="form-control" placeholder="  Backlog" min="0" style="width: 420px;" required>
															</label>
															
						    								</div>
														<div class="form-group">
														Gap Year : &nbsp;&nbsp;
															<label>
															<input type="number" name="gap-year" class="form-control" placeholder="  Gap Year" min="0" style="width: 420px;" required>
															</label>
															
														</div>
														<div class="form-group">
														Aggregate upto current Semester(%) : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
															<input type="number" name="semester-3" class="form-control" placeholder="Aggregate upto current Semester(%)" value="" style="width: 255px;" min="35" max="100" required>
															</label>
															
														</div>
														<div class="form-group">
														
														Experience: &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
															<input type="number" class="form-control" name="experience" id="experience" placeholder="If you want fresher then place 0" min="0" style="width: 405px;" required >
															</label>		
														</div>

														<div class="form-group">
														Link for Registration : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="url" name="url" class="form-control" placeholder="Link for Registration" style="width: 350px;" required>
															</label>
                                                        </div>

														<!-- <p><h3>*********** Addition Information ***********</h3></p> -->

														<div class="form-group">
														Joining	Location : &nbsp;&nbsp;&nbsp;&nbsp;
																	<label>
																		
																	<input type="text" id="location" name="location" class="form-control" placeholder="About Location" style="width: 370px;" required>
																	</label>
														</div>

														<div class="form-group" >
														CTC Offered(Salary): &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="text" name="ctc" id="ctc" class="form-control" placeholder="ex: 2.4LPA" style="width: 350px;" required>
															</label>
														</div>

														<div class="form-group" >
														Training period Duration: &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="text" name="train" id="train" class="form-control" placeholder="ex: 3 Months " style="width: 330px;" required>
															</label>
														</div>

														<div class="form-group" >
														Interview Location: &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="text" name="inter" id="inter" class="form-control" placeholder="ex: Remotely/Address" style="width: 360px;" required>
															</label>
														</div>

														<div class="form-group" >
														Bond to be Signed: &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="text" name="bond" id="bond" class="form-control" placeholder="ex: 1 Year of Bond" style="width: 360px;" required>
															</label>
														</div>

														<div class="form-group">
														About Company :
														<label><textarea class="form-control" rows="2" cols="30" style="width: 390px;" id="aboutcompany" name="aboutcompany" placeholder="Enter Information About Company..." tabindex="4"></textarea></label><br>
													    </div><br>
						
														<div class="form-group">
														Skill Set Required:
																<label><textarea class="form-control" rows="2" cols="30" style="width: 390px;" id="body" name="body" placeholder="Enter Information About Role..." tabindex="4"></textarea></label><br>
														</div><br>


														<div class="form-group">
																Selection Process :
																<label><textarea class="form-control" rows="2" cols="30" style="width: 380px;" id="pro" name="pro" placeholder="Enter Information About Selection Process..." tabindex="4"></textarea></label><br>
																</div><br>

														<div class="form-group">
														Last Date to Apply : &nbsp;&nbsp;&nbsp;&nbsp;
															<label>
																
															<input type="date" id="appdate" name="appdate" min="<?=date('Y-m-d');?>" style="width: 200px;" class="form-control"  required>
															</label>
														</div>

													<div>	
													<button type="submit" name="submit" style="width: 100px;" class="btn btn-o btn-primary">
														Add
													</button>
													</div>
												</form>
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
			<>
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
