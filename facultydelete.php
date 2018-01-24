
<?php include('server.php') ?>
<?php 
 if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php include('server.php') ;
$slno=$_REQUEST['slno'];
$query="DELETE FROM facultydetails WHERE slno=$slno";
$result=mysqli_query($db,$query) or die(mysqli_error());
header("Location:facultylist.php");
?>