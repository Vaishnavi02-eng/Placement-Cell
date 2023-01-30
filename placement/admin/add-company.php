<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

$company_name 					=$_POST["company_name"];
$company_head_quarter 			=$_POST["company_head_quarter"];
$company_website				=$_POST["company_website"];
$company_nature_of_business 	=$_POST["company_nature_of_business"];
$company_name_of_ceo			=$_POST["company_name_of_ceo"];
$company_no_of_employees		=$_POST["company_no_of_employees"];
//$company_no_of_branches 		=$_POST["company_no_of_branches"];

    $sql1="select * from company where(company_name='$company_name');";
	$res=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($res) > 0) {
	
		$row = mysqli_fetch_assoc($res);
		if($company_name==isset($row['company_name']))
		{
				echo "<script>alert('Your Company is already exists');</script>";
		}
	}
	else{

		$sql="INSERT INTO company(company_name,company_head_quarter,company_website,company_nature_of_business,company_name_of_ceo,company_no_of_employees) VALUES ('$company_name','$company_head_quarter','$company_website','$company_nature_of_business','$company_name_of_ceo','$company_no_of_employees')";
		$query=$conn->query($sql);
		if($query)
			{
				echo "<script>alert('Successfully Company Added');</script>";
			}
			else{
				echo "<script>alert('Try Again.');</script>";
			}

		}
	
	
}

// if(isset($_GET['del']))
// {
// 	mysqli_query($con,"delete from doctorSpecilization where id = '".$_GET['id']."'");
// 	$_SESSION['msg']="data deleted !!";
// }
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
								<h1 class="mainTitle">Admin | Add Company</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Add Company</span>
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
												<h5 class="panel-title">Company Details</h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
												<?php echo htmlentities($_SESSION['msg']="");?></p>	
												<form role="form" name="dcotorspcl" method="post" >
													<div class="form-group">
														<label for="exampleInputEmail1">
															 Name of Company : 
														</label>
														<input type="text" name="company_name" class="form-control"  placeholder="Enter Name of Company" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">
															 Head Quarter :
														</label>
														<input type="text" name="company_head_quarter" class="form-control"  placeholder="Enter Head Quarter of Company" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">
															 Website :
														</label>
														<input type="url" name="company_website" class="form-control"  placeholder="Enter Website of Company" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">
															 Nature of Business :
														</label>
														<input type="text" name="company_nature_of_business" class="form-control"  placeholder="Enter Nature of business" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">
															Name Of CEO :
														</label>
														<input type="text" name="company_name_of_ceo" class="form-control"  placeholder="Enter Name of Company" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">
															No of Employees :
														</label>
														<input type="number" name="company_no_of_employees" class="form-control"  placeholder="Number of Employee" required>
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
