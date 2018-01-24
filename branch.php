<?php 
  include('server.php') ;
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
<!DOCTYPE html>
<html>
<head>
<style>
table {
	background-color:white;
    width: 100%;
    border-collapse: collapse;
}


th {text-align: left;}
</style>
</head>
<body>

<?php
if( intval($_GET['q'])==1){
$q ='s&h';
}
else if(intval($_GET['q'])==2){
$q ='cse';
}
else if(intval($_GET['q'])==3){
$q ='it';
}
else if(intval($_GET['q'])==4){
$q ='ece';
}
else if(intval($_GET['q'])==5){
$q ='eee';
}
else if(intval($_GET['q'])==6){
$q ='mech';
}
else if(intval($_GET['q'])==7){
$q ='civil';
}

	

$con = mysqli_connect('localhost','root','','logindatabase');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT facultyid,fullname,photo FROM facultydetails WHERE branch='".$q."'";
$result = mysqli_query($con,$sql);
?>
<table class="table table-condensed">
<thead>
<tr>
<th><strong>Faculty ID</strong></th>
<th><strong>Faculty Name</strong></th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($result)) {
  $fid=$row['facultyid'];
     $name=$row['fullname']; ?>
	  <tr><td>
	   <?php echo $row['facultyid']."  ";?></td><td><a style="background-color: transparent;color:black" href="http://localhost/project/facfeedbackview.php? fid=<?php echo $fid;?>&name=<?php echo $name;?>"> <?php echo $row['fullname'];?></a>
	  
</td>
</tr>
 <?php
  }	  
mysqli_close($con);
?>
</br>
</br>
</body>
</html>