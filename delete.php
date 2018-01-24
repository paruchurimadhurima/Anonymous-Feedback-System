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
$id=$_REQUEST['id'];
$query="DELETE FROM adminusers WHERE id=$id";
$result=mysqli_query($db,$query) or die(mysqli_error());
header("Location:userlist.php");
?>
