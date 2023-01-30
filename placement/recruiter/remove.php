
<?php
session_start();
//error_reporting(0);
include('include/config.php');
//include('include/checklogin.php');
$state = $_GET['state'];

$query="DELETE FROM company_criteria where id=$state"; 
$result=mysqli_query($con,$query);
if($result){
	echo "<script>alert(' $state Successfully Deleted')</script>";
}

//check_login();
?>
<script>
	document.location="company-criteria.php"
</script>
<!-- <?php 
include "include/config.php";

//$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($con,$_POST['id']);
}

if($id > 0){

	// Check record exists
	$checkRecord = mysqli_query($con,"SELECT * FROM company_criteria WHERE id=".$id);
	$totalrows = mysqli_num_rows($checkRecord);

	if($totalrows > 0){
		// Delete record
		$query = "DELETE FROM company_criteria WHERE id=".$id;
		mysqli_query($con,$query);
		echo 1;
		exit;
	}else{
        echo 0;
        exit;
    }
}

echo 0;
exit;
?> -->