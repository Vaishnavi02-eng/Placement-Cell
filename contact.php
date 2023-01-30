<?php
include('connect.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	
	
	$query = "INSERT INTO contact (name, email, subject, body) VALUES ('$name', '$email', '$subject', '$body')";
	$result = mysqli_query($connection, $query);
	if($result)
	{
	echo "<script>alert('We will reach you soon...');</script>";
	$mail = new PHPMailer; 
	$mail->isSMTP();                      // Set mailer to use SMTP 
	$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers   
	$mail->SMTPAuth = true;               // Enable SMTP authentication 
	$mail->Username = 'vaishnavihale2000@gmail.com';   // SMTP username 
	$mail->Password = 'hkdqypwyxutitjwc';   // SMTP password 
	$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
	$mail->Port = 587;                    // TCP port to connect to 

	// Sender info 
	$mail->setFrom($email, 'Placement Cell'); 
	$mail->isHTML(true); 
	$mail->Subject = 'Placement Cell'; 
	// Mail body content 
	$bodyContent = '<h1>Greetings From Placement Cell Department</h1>'; 
	$bodyContent .= '<p>Email From Users:<br>Name : '.$name.'<br>Email :'.$email.'<br>Subject :'.$subject.'<br>Message :'.$body.'</p>';
	$mail->Body    = $bodyContent; 
	$mail->addAddress('vaishnavihale2000@gmail.com'); 
	$mail->send();
	}else{
	echo "<script>alert('Try Again.');</script>";
	}

	
}
 
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Placement | Contact us</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" style="font-size: 30px;">Placement Cell</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="index.html">Home</a></li>
					
						<li class="active"><a href="contact.php">contact</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					
      			<div class="company_address">
				  <h2 class="b2">Contact-Info :</h2>
						<p>Address: India</p>
						<p>Email: <span>vaishnavihale2000@gmail.com</span></p>
				   		<p>Phone:(91) 999 99 99 999</p>
				   		<p>Time: Mon - Fri 8:00 AM to 5:00 PM
				   	
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="POST">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" id="name" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" id="email" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>SUBJECT</label></span>
						    	<span><input type="text" id="subject" name="subject" value=""></span>
						    </div>
						    <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea id="body" name="body"> </textarea></span>
						    </div>
						   <div>
						   
						    <span><input type="submit" id="submit" name="submit" value="Submit"></span> 
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.html">Home</a></li>
						
						<li><a href="contact.php">contact</a></li>
					</ul>
		   	</div>
		  
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

