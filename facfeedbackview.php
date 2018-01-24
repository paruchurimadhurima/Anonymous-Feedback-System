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

<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<title>FeedbackDB</title>
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
 <div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a class="navbar-brand" href='http://localhost/project/adminhome.php' style="color: white; background-color:transparent;">FEEDBACK PORTAL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">User DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/register.php'  style="color: black; background-color: white; ">Add new user</a>
            <li><a href='http://localhost/project/userlist.php' style="color: black; background-color: white; ">User List</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admins DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href='http://localhost/project/adminregister.php' style="color: black; background-color: white; ">Add new Admin</a></li>
            <li><a  href='http://localhost/project/adminlist.php' style="color: black; background-color: white; ">Admin List</a>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/facultyregister.php' style="color: black; background-color: white; ">Add Faculty</a></li>
            <li><a href='http://localhost/project/facultylist.php' style="color: black; background-color: white; ">Faculty List</a></li>
 
  
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sub-Fac DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/lecturerregister.php' style="color: black; background-color: white; ">Add Sub-Fac</a></li>
            <li><a href='http://localhost/project/lecturerlist.php' style="color: black; background-color: white; ">Sub-Fac List</a></li>

          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Subjects DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href='http://localhost/project/subjectregister.php' style="color: black; background-color: white; ">Add Subjects</a></li>
           <li><a href='http://localhost/project/subjectlist.php' style="color: black; background-color: white; ">Subjects List</a></li>
  
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Feedback<span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href='http://localhost/project/ajaxfeedback.php' style="color: black; background-color: white; ">Branchwise Feedback</a></li>
     
    	<li><a href='http://localhost/project/facfeedbacklist.php' style="color: black; background-color: white; ">Feedback DB</a></li>
  
  
          </ul>
        </li>
        
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Complaints<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <?php
$class='Classrooms';
$lab='Laboratories';
$transport='College Transport';
$lib='Library';
$canteen='Canteen';
$other='Others';
?>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $class;?>' style="color: black; background-color: white; ">Classrooms</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $lab;?>' style="color: black; background-color: white; ">Laboratories</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $transport;?>' style="color: black; background-color: white; ">College Transport</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $lib;?>' style="color: black; background-color: white; ">Library</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $canteen;?>' style="color: black; background-color: white; ">Canteen</a></li>
<li><a href='http://localhost/project/complaints.php?category=<?php echo $other;?>' style="color: black; background-color: white; ">Others</a></li>

          </ul>
        </li>
		
		
		
		<li> <a href="adminhome.php?logout='1'">Logout</a> </li>
     
      
        
      </ul>
    </div>
  </div>
</nav>

<font color="black" size="4px">

<?php
$fid=$_GET['fid'];
$fname=$_GET['name'];
echo "<p align='center' >Faculty Name : ".$fname."</p>";
$database=mysqli_connect('localhost', 'root', '', 'logindatabase');
$info="SELECT subjectid,year,section,branch FROM lecturers WHERE facultyid='$fid'";
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

 <?php  echo "<p align='center'>Class taken :".$branch." ".$year." ".$section."</p>";?>

 <?php
       echo "<p align='center' >Subject :".$subname."</p>";
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
    $getinfo="SELECT count(id) as num,AVG(q1) as q1,AVG(q2) as q2,AVG(q3) as q3,AVG(q4) as q4,AVG(q5) as q5 FROM faculty WHERE branch='$branch' AND section='$section' AND year='$year' AND subjectid='$subid' AND facultyid='$fid'";
	$res=mysqli_query($db,$getinfo);
	while($row=mysqli_fetch_array($res))
	{  echo "<p align='center'>No. of Responses :".$row['num']."</p>";
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
		
		 
		<a style="background-color:black;color:white ; font-size:20px" href="http://localhost/project/individualfeedback.php?subid=<?php echo $subid;?>&branch=<?php echo $branch;?>&fid=<?php echo $fid;?>&name=<?php echo $fname;?>&year=<?php echo $year;?>&section=<?php echo $section;?>">Student Rating</a></li>

		 </br>
		 <br/>
<?php }}?>
<input style="background-color: black;font-size:13px; color:white; padding:7px; border: black; border-radius: 2px 2px 2px 2px;" type="button" value="Print this page" onClick="window.print()">
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
		 </body>
</html>
<style>
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
p{
	font-size:18px;
}
th{
	font-size:13px;
}
tr{
	font-size:13px;
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