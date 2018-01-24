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

<?php 
$db1=mysqli_connect('localhost', 'root', '','feedback');
$id=$_REQUEST['id'];
$query="DELETE FROM  faculty WHERE id=$id";
$result=mysqli_query($db1,$query) or die(mysqli_error());
header("Location:facfeedbacklist.php");
?>