<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
$state = $_GET['state'];
$query="select * from company_criteria where id='$state'"; 
$result=mysql_query($query);

check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student | Information About Company</title>
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
		<style>
			button{
    width: 100px;
    height: 40px;
    border-radius:40px;
	align-items: center;
    
    color: white;
    font-size: 20px;
    transform: translate(350%,1400%);
  }
			</style>
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
									<h1 class="mainTitle">Student | Information About Company</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Student</span>
									</li>
									<li class="active">
										<span>Information About Company</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">

								<p style="color:red;"></p>	
								<table class="table table-hover" id="sample-table-1">
										<thead>
										<?php while($rows=mysql_fetch_assoc($result)) 
										{ 
										?> 
										<tr><th><h4>About The Company:</h4></th>
										<td><h5><?php echo $rows['aboutcompany']; ?></h5></td></tr>
										
										<tr><th><h4>Target Degree and Branch:</h4></th>
										<td><h5><?php echo $rows['dbranch']; ?></h5></td></tr>

										<tr><th><h4>Batch (Graduation Year):</h4></th>
										<td><h5><?php echo $rows['batch']; ?></h5></td></tr>

										<tr><th><h4>CTC Offered(Salary):</h4></th>
										<td><h5><?php echo $rows['ctc']; ?></h5></td></tr>

										<tr><th><h4>Training period Duration:</h4></th>
										<td><h5><?php echo $rows['train']; ?></h5></td></tr>
										
										<tr><th><h4>Job Description(Skills):</h4></th>
										<td><h5><?php echo $rows['jobrole']; ?></h5></td></tr>

										<tr><th><h4>Joining Location:</h4></th>
										<td><h5><?php echo $rows['location']; ?></h5></td></tr>

										<tr><th><h4>Interview Location:</h4></th>
										<td><h5><?php echo $rows['inter']; ?></h5></td></tr>
										
										<tr><th><h4>Academic % Cut-off (10th, 12th, Graduation):</h4></th>
										<td><h5><?php echo $rows['10th']; ?> % Throughout</h5></td></tr>

										<tr><th><h4>Selection Process:</h4></th>
										<td><h5><?php echo $rows['pro']; ?></h5></td></tr>

										<tr><th><h4>Bond to be Signed:</h4></th>
										<td><h5><?php echo $rows['bond']; ?></h5></td></tr>

										<button type="button"><a href="<?php echo $rows['url']; ?>">APPLY</a></button>	 		  
										
										<?php 
									
											} 
										?> 	
										
										</thead>
									</table>
									
									<!-- <p style="color:red;"></p>	
									<?php
									$sql="select a.company_name,c.appdate,c.jobrole,c.url from company as a inner join recruiter as b inner join company_criteria as c on a.company_id=b.company_id and b.emailid=c.recruiter_id;";
													
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

														while($row = $result->fetch_array())
														{
																echo "<tr>";
																echo "<td><h4>".$row['company_name']."</h4></td>";
																echo "<td><h4>".$row['jobrole']."</h4></td>";
																echo "<td><h4>".$row['appdate']."</h4></td>";
																echo "<td><button style='color:blue'><a href='apply.php'>Apply</a>
																</button></td>";
																echo "</tr>";
																$check=true;
														}//while	
														if($check)														
																echo "<p class='text-center' style='color:blue'> Congrats Your are eligible for below companies</p>";					
													}else{
															echo "<p class='text-center' style='color:red'> Not Eligible for any company</p>";									
														}
														?> -->
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
