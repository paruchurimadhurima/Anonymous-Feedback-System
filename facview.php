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
    if($data['facultyid']!=base64_decode($_GET['facultyid'])||$data['fullname']!=base64_decode($_GET['name']))
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
$facultyid=base64_decode($_GET['facultyid']);
$name=base64_decode($_GET['name']);
echo "<p align='center'>Faculty Name : ".$name.'</p>';
$database=mysqli_connect('localhost', 'root', '', 'logindatabase');
$info="SELECT subjectid,year,section,branch FROM lecturers WHERE facultyid='$facultyid'";
$result=mysqli_query($database,$info);
$subid=array();
?>

<?php
while($data=mysqli_fetch_array($result))
{
  $branch=$data['branch'];
  $subid=$data['subjectid'];
  $year=$data['year'];
  $section=$data['section'];
  $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
    $getinfo="SELECT subjectname FROM subjects WHERE subjectid='$subid'";
	$res=mysqli_query($database,$getinfo);
	 
	$subname=array();
	while($row=mysqli_fetch_assoc($res))
	{ $subname=$row['subjectname'];
       
?>
 <?php  echo "<p align='center'>Class Taken : ".$branch." ".$year." ".$section.'</p>';
       echo "<p align='center'>Subject : ".$subname.'</p>';
		?>
	<table class="table table-condensed">
   <thead>
   <tr>
   <th><strong>Quality</strong></th>
   <th><strong>Cummulative Feedback</strong></th>
   </tr>
   </thead>
   <tbody>
   <?php
	$db=mysqli_connect('localhost', 'root', '', 'feedback');
    $getinfo="SELECT count(id) as num,AVG(q1) as q1,AVG(q2) as q2,AVG(q3) as q3,AVG(q4) as q4,AVG(q5) as q5 FROM faculty WHERE branch='$branch' AND section='$section' AND year='$year' AND subjectid='$subid' AND facultyid='$facultyid'";
	$res=mysqli_query($db,$getinfo);
	while($row=mysqli_fetch_array($res))
	{    echo "<p align='center'>No. of Responses : ".$row['num']."</p>";
	?>
	<tr>
      <td >Fair in Awarding Marks</td><td ><?php echo  " ".$row['q1']."/5";?></td></tr>
	  <tr>
		 <td >Punctual</td><td ><?php echo   " ".$row['q2']."/5";?></td></tr>
		 <tr>
		 <td >Knowledge and Understanding</td><td ><?php echo " ".$row['q3']."/5";?></td></tr>
		 <tr>
		 <td >Doubts Clearing</td><td ><?php echo   " ".$row['q4']."/5";?></td></tr>
		 <tr>
		 <td >Voice Clarity</td><td ><?php echo  " ".$row['q5']."/5";?></td></tr>
		 </tbody>
	</table>
	<?php
		 echo "Overall Percentage: ".(($row['q1']+$row['q2']+$row['q3']+$row['q4']+$row['q5'])/25)*100 . "%";
		 
		 ?>
		 </br></br>
	<?php }?>
		 <a href="http://localhost/project/indfeedback.php?subid=<?php echo $subid;?>&branch=<?php echo $branch;?>&fid=<?php echo base64_encode($facultyid);?>&name=<?php echo base64_encode($name);?>&year=<?php echo $year;?>&section=<?php echo $section;?>">Student Rating</a>
		
		 </br>
<?php }}?>
</br>
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
</div>
</br>
<div class="footer">
 <p style="font-size:15px;">Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>	
</br>
</br>	
</body>
</html>

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

p{
font-size:18px;
}

</style>