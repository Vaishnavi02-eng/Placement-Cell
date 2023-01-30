<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
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
// $semester_4=$_POST['semester-4'];
// $semester_5=$_POST['semester-5'];
// $semester_6=$_POST['semester-6'];

	$sql=mysqli_query($conn,"Update student set fullName='$fname',address='$address',city='$city',gender='$gender',10th='$tenth',12th='$twelveth',backlog='$backlog',gap_year='$year_gap',semester_3='$semester_3' where id='".$_SESSION['id']."'");
	if($sql)
	{
		$msg="Your Profile updated Successfully";


	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student | Edit Profile</title>
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
			function valid(){
				let x=document.forms["edit"]["full_name"].value;
				let y=document.forms["edit"]["address"].value;
				let z=document.forms["edit"]["city"].value;
			
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
								<h1 class="mainTitle">Student | Edit Profile</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Student </span>
								</li>
								<li class="active">
									<span>Edit Profile</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 style="color: green; font-size:18px; ">
									<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Profile</h5>
												</div>
												<div class="panel-body">
													<?php 
													$sql=mysqli_query($conn,"select * from student where id='".$_SESSION['id']."'");
													while($data=mysqli_fetch_array($sql))
													{
														?>
														<form role="form" name="edit" method="post" onsubmit="return valid()">
															<fieldset>
														<legend>
															Update Details
														</legend>
														<p>
															Enter your personal details below:
														</p>
														<div class="form-group">
															<input type="text" class="form-control" name="full_name" value="<?php echo $data['fullName'];?>" placeholder="Full Name" pattern="[a-zA-Z'-'\s]*" required>
														</div>
														<div class="form-group">
															<input type="text" class="form-control" name="address" value="<?php echo $data['address'];?>" placeholder="Address" pattern="[A-Za-z0-9'\.\-\s\,]" required>
														</div>
														<div class="form-group">
															<input type="text" class="form-control" name="city" value="<?php echo $data['city'];?>" placeholder="City" pattern="[a-zA-Z'-'\s]*" required>
														</div>
														<div class="form-group">
															<label class="block">
																Gender
															</label>
																<?php if($data['gender']=="female"){?>
															<div class="clip-radio radio-primary">
																<input type="radio" id="rg-female" name="gender" value="female" checked>
																<label for="rg-female">
																	Female
																</label>
																<input type="radio" id="rg-male" name="gender" value="male">
																<label for="rg-male">
																	Male
																</label>
															</div>
														<?php }else{ ?>
																<div class="clip-radio radio-primary">
																<input type="radio" id="rg-female" name="gender" value="female" >
																<label for="rg-female">
																	Female
																</label>
																<input type="radio" id="rg-male" name="gender" value="male" checked>
																<label for="rg-male">
																	Male
																</label>
															</div>
														
														<?php } ?>
														</div>
														<p>
															10th Percentage:
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="number" class="form-control" value="<?php echo $data['10th'];?>" name="10th" id="10th" placeholder="10th Percent(%) " min="35" max="100" required>
																<i class="fa fa-plus"></i> </span>
														</div>
														<p>
															12th Percentage:
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="number" class="form-control" value="<?php echo $data['12th'];?>" name="12th" id="12th" placeholder="Enter your 12th/Diploma percentage" min="35"  max="100" required>
																<i class="fa fa-plus"></i> </span>
														</div>


														<p>
															Your Current Course(1=BTech,2=MTech):
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="text" class="form-control" value="<?php echo $data['course'];?>" name="course" id="course" placeholder="Enter your Course" min="35"  max="100" required>
																<i class="fa fa-plus"></i> </span>
														</div>

														<p>
															Your Current Specialization:
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="text" class="form-control" value="<?php echo $data['branch'];?>" name="branch" id="branch" placeholder="Enter your Current Specialization" min="35"  max="100" required>
																<i class="fa fa-plus"></i> </span>
														</div>

														<p>
															Enter Aggregate upto current Semester(%) :
														</p>
														<div class="form-group">
															<span class="input-icon">
																<input type="number" class="form-control" value="<?php echo $data['semester_3'];?>" name="semester-3" id="semester-3" placeholder="Aggregate upto current Semester" min="35" max="100"  required>
																<i class="fa fa-plus"></i> </span>
														</div>

														<div class="form-group">
														<span class="input-icon">
															<label>No of backlog:</label>
															<input type="number" class="form-control"  value="<?php echo $data['backlog'];?>" name="backlog" id="backlog" placeholder="No of on going backlog" min="0" required >
																
														</div>
														<div class="form-group">
														<span class="input-icon">
															<label>No of Gap Year:</label>
															<input type="number" class="form-control"  value="<?php echo $data['gap_year'];?>" name="year-gap" id="year-gap" placeholder="No of Gap Year" min="0" required >
																
														</div>
														<div class="form-group">
														<span class="input-icon">
															<label>Your Age:</label>
															<input type="number" class="form-control"  value="<?php echo $data['age'];?>" name="age" id="age" placeholder="Your age" min="20" required >
																
														</div>
														<div class="form-group">
														<span class="input-icon">
															<label>Your Experience:</label>
															<input type="number" class="form-control"  value="<?php echo $data['experience'];?>" name="experience" id="experience" placeholder="Your Experience" min="0" required >
																
														</div>
														
													</fieldset>
															<button type="submit" name="submit" class="btn btn-o btn-primary">
																Update
															</button>
														</form>
													<?php } ?>
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
