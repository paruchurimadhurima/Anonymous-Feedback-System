<?php 
  session_start(); 
 if (!isset($_SESSION['username2'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username2']);
  	header("location: login.php");
  }
  $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT facultyid,fullname FROM facultydetails WHERE username='$_SESSION[username2]'";
   $query=mysqli_query($database,$get);
   while($data=mysqli_fetch_assoc($query))
   {
    if($data['facultyid']!=base64_decode($_GET['fid'])||$data['fullname']!=base64_decode($_GET['name']))
		die("<h1>Error 404!!!!!</h1><br/>Page not found.Please try again later.");
   }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>FACULTY HOME</title>
<link rel="stylesheet" type="text/css" href="style.css">

	
	 
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="color: white; background-color:transparent;">FEEDBACK PORTAL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="http://localhost/project/facultyhome.php">Home</a></li>
        <li class="active" ><a >View your Feedback</a></li>
       <li><a href="facultyhome.php?logout='1'">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 <div class="container"> 
<?php
$branch=$_GET['branch'];
$year=$_GET['year'];
$section=$_GET['section'];
    $fname=base64_decode($_GET['name']);
    $subid=$_GET['subid'];
    $fid=base64_decode($_GET['fid']);
   
	$db=mysqli_connect('localhost', 'root', '', 'feedback');
    $getinfo="SELECT q1,q2,q3,q4,q5,extra FROM faculty WHERE branch='$branch' AND section='$section' AND year='$year' AND subjectid='$subid' AND facultyid='$fid'";
	$res=mysqli_query($db,$getinfo);
	echo "<p align='center'>Faculty Name : ".$fname.'</p>';
	echo "<p align='center'>Faculty ID : ".$fid.'</p>';
	echo "<p align='center'>Class : ".$branch.$year.$section.'</p>';
	while($row=mysqli_fetch_assoc($res))
	{ 
 ?>
     <table class="table table-bordered">
   <thead>
   <tr>
   
   <th><strong>Fair in Awarding Marks</strong></th>
   <th><strong>Punctual</strong></th>
   <th><strong>Knowledge and Understanding</strong></th>
   <th><strong>Doubts Clearing</strong></th>
   <th><strong>Voice</strong></th>
 
   </tr>
   </thead>
   <tbody>
	<tr>
	
	<td><?php	echo $row['q1'];?></td><td><?php echo $row['q2']?></td><td><?php echo $row['q3'];?></td><td><?php echo $row['q4'];?></td><td><?php echo $row['q5'];?></td></tr></tbody></table>
	<table class="table table-condensed"><tr><th><strong>Reviews:</strong></th><td align="left"><?php echo $row['extra'];?></td></tr></table>
	</br>
	<?php
	}
	?>
<input style="background-color: black; color:white;padding: 7px; border: black; border-radius: 2px 2px 2px 2px;" type="button" value="Print this page" onClick="window.print()">
<script type="text/javascript">
function printlayout() {     
       var DocumentContainer = document.getElementById('printlayout');
var WindowObject = window.open('', "TrackHistoryData", 
                              "width=740,height=325,top=200,left=250,toolbars=no,scrollbars=yes,status=no,resizable=no");           
 WindowObject.document.writeln(DocumentContainer.innerHTML);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();
}
</script>
</br>
</br>
</br>
</div>
</br>
<div class="footer">
 <p style="font-size:15px;">Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>	
	</body>
	<html>

<style>
.footer{
	vertical-align: bottom;
    left: 0;
    bottom: 0;
	position:fixed;
    width: 100%;
    background-color: black;
    color: white;
	font-size:13px;
    text-align: center;
}
table{
	
background-color: white;
color:black;
}

a {
	
  padding: 5px;
  font-size: 15px;
  color: white;
  background: #1E1413;
  border: none;
  border-radius: 5px;
}

h1{ 
  	font-family:arial;
background-color:  #1E1413;
   font-size:25px;
    color: white;
	
}

body,
html{
	min-height:100%;
}
body {
  font-size: 120%;
  background-image:url(http://localhost/project/pizap.jpg);
  background-repeat:no-repeat;
  background-size:cover;
  background-position: sticky;
}
</style>