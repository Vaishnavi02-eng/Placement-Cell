<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student | Search Companies</title>
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

			<!-- end: TOP NAVBAR -->
			<div class="main-content" >
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Student | Search Companies</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Student </span>
								</li>
								<li class="active">
									<span>Search Companies</span>
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
													<h5 class="panel-title">Search Companies</h5>
												</div>
												<div class="panel-body">
													<?php
														
													
													$sqlStudent="select * from student where email='".$_SESSION['login']."'";
													$result=mysqli_query($conn,$sqlStudent);
													$rowStudent 	= 	$result->fetch_array();
													
													$student10th				=	$rowStudent["10th"];
													$student12th				=	$rowStudent["12th"];
													
													$studentbacklog				=	$rowStudent["backlog"];
													$studentgapyear				=	$rowStudent["gap_year"];
													$studentexperience			=	$rowStudent["experience"];
													$studentsemester3			=	$rowStudent["semester_3"];
													
								                    if($studentexperience==0){
														$sql="select a.company_name,c.appdate,c.jobrole,c.url,c.id from company as a inner join recruiter as b inner join company_criteria as c on a.company_id=b.company_id and b.emailid=c.recruiter_id where c.10th<='".$student10th."' and c.12th<='".$student12th."' and c.semester_3<='".$studentsemester3."' and c.backlog>='".$studentbacklog."' and c.gap_year>='".$studentgapyear."' and c.experience=0;";
													//and experience='".$studentexperience."'
													$check=false;
													if($result=mysqli_query($conn,$sql)) 
													{ 
														echo '<table class="table table-striped" width="100%">';
														echo "<tr>";
														echo "<th>Company</th>";
														echo "<th>Job Role</th>";
														echo "<th>Last Apply Date</th>";
														echo "<th>Apply Button</th>";
														echo "</tr>";

														while($row=mysqli_fetch_array($result))
														{
																echo "<tr>";
																echo "<td><h4>".$row['company_name']."</h4></td>";
																echo "<td><h4>".$row['jobrole']."</h4></td>";
																echo "<td><h4>".$row['appdate']."</h4></td>";
																echo "<td><button style='color:blue'><a href='apply.php?state=".$row['id']."'>Apply</a>
																</button></td>";
																echo "</tr>";
																$check=true;
														}//while	
														if($check)														
																echo "<p class='text-center' style='color:blue'> Congrats Your are eligible for below companies</p>";					
													}else{
															echo "<p class='text-center' style='color:red'> Not Eligible for any company</p>";									
														}

													}else{
													
													$sql="select a.company_name,c.appdate,c.jobrole,c.url,c.id from company as a inner join recruiter as b inner join company_criteria as c on a.company_id=b.company_id and b.emailid=c.recruiter_id where c.10th<='".$student10th."' and c.12th<='".$student12th."' and c.semester_3<='".$studentsemester3."' and c.backlog>='".$studentbacklog."' and c.gap_year>='".$studentgapyear."' and c.experience<'".$studentexperience."' and c.experience>0;";
													//and experience='".$studentexperience."'
													$check=false;
													if($result=mysqli_query($conn,$sql)) 
													{ 
														echo '<table class="table table-striped" width="100%">';
														echo "<tr>";
														echo "<th>Company</th>";
														echo "<th>Job Role</th>";
														echo "<th>Last Apply Date</th>";
														echo "<th>Apply Button</th>";
														echo "</tr>";

														while($row=mysqli_fetch_array($result))
														{
																echo "<tr>";
																echo "<td><h4>".$row['company_name']."</h4></td>";
																echo "<td><h4>".$row['jobrole']."</h4></td>";
																echo "<td><h4>".$row['appdate']."</h4></td>";
																echo "<td><button style='color:blue'><a href='apply.php?state=".$row['id']."'>Apply</a>
																</button></td>";
																echo "</tr>";
																$check=true;
														}//while	
														if($check)														
																echo "<p class='text-center' style='color:blue'> Congrats Your are eligible for below companies</p>";					
													}else{
															echo "<p class='text-center' style='color:red'> Not Eligible for any company</p>";									
														}
													}
														?>
														
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
