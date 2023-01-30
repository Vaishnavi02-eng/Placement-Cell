<?php
include_once('include/config.php');
session_start();
if(isset($_POST['submit']))
{
	$id=$_SESSION['id'];

	

	$folder_path = 'upload/';

	$filename = basename($_FILES['resumefile']['name']);
	$newname = $folder_path . $filename;

	if ($_FILES['resumefile']['type'] == "application/pdf")
	{
		if (move_uploaded_file($_FILES['resumefile']['tmp_name'], $newname))
		{

			$sql = "update student set resume='$newname' where id='$id';";
			$query=$conn->query($sql);
			if($query)
			{
				echo "<script>alert('Resume Uploaded Successfully');</script>";
                
			}else{
				echo "<script>alert('Try Again.');</script>";
			}

		}
		else
		{

			echo "<p>Upload Failed.</p>";
		}

		if (isset($fileresult))
		{
			echo 'Success';
		} else
		{
			echo 'fail';
		}
	}
	else
	{
		echo "<script>alert('Resume must be uploaded in PDF format.');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student  | Dashboard</title>
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
								<h1 class="mainTitle">Student | Resume</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Student</span>
								</li>
								<li class="active">
									<span>Resume</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<form name="registration" id="registration"  method="post" enctype="multipart/form-data">
							<label>Upload Your Resume(Only PDF)</label><br>
							<span > 
								Browse: <input name="resumefile" type="file">
							</span>
							<br/><br/>
							<input type="submit" name="submit" class="btn-success" value="submit">
							
							<?php $pdfSql="select resume from student where id=".$_SESSION['id'];
							
							$result=$conn->query($pdfSql);	
							$num=mysqli_fetch_array($result);

							if($num>0){
								$row=mysqli_fetch_array($result);
								$url=$row['resume'];
									//echo "<script>alert('Resume already uploaded')</script>;";
								?>	
								<div id="pdfBox">
									<div class="modal-body">
										<iframe frameborder="0" src="<?php echo $url; ?>"  height="1000em" width="100%"></iframe>
									</div>
								</div>   
							<?php } ?>
						</form>
					</div>

					
					


					
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
