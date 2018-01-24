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

<html>
<title>FeedbackDB</title>
<meta charset="utf-8">

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

<body>

<?php
$branch=$_GET['branch'];
$year=$_GET['year'];
$section=$_GET['section'];
    $fname=$_GET['name'];
    $subid=$_GET['subid'];
    $fid=$_GET['fid'];
   
	$db=mysqli_connect('localhost', 'root', '', 'feedback');
    $getinfo="SELECT q1,q2,q3,q4,q5,extra FROM faculty WHERE branch='$branch' AND section='$section' AND year='$year' AND subjectid='$subid' AND facultyid='$fid'";
	$res=mysqli_query($db,$getinfo);
	echo "<p align='center' >Faculty Name : ".$fname."</p>";
	echo "<p align='center' >Faculty ID : ".$fid."</p>";
	echo "<p align='center' >Class : ".$branch.$year.$section."</p>";
	while($row=mysqli_fetch_array($res))
	{ 
 ?>
 
 
<table class="table table-bordered" align="center">
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
	
	<td><?php	echo $row['q1'];?></td><td><?php echo $row['q2']?></td><td><?php echo $row['q3'];?></td><td><?php echo $row['q4'];?></td><td><?php echo $row['q5'];?></td></tr></tbody></table><table class="table table-condensed"><tr><th>Reviews </th><td><?php echo $row['extra'];?></td><td></td>

	</table>
	
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
</div>
</br>
	</body>
	<html>
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

h1{ 
  	font-family:arial;
background-color:  #1E1413;
   font-size:25px;
    color: white;
	
}
th{
	font-size:13px;
}
tr{
	font-size:13px;
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