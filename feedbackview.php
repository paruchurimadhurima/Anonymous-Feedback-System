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
<title>FacultyDB</title>
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">SUB-FAC DB<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href='http://localhost/project/lecturerregister.php' style="color: black; background-color: white; ">Add SUB-FAC</a></li>
            <li><a href='http://localhost/project/lecturerlist.php' style="color: black; background-color: white; ">SUB-FAC List</a></li>

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
<div class="container">
<table class="table table-condensed">
<thead>
<tr>
<th><strong>Faculty ID</strong></th>
<th><strong>Faculty Name</strong></th>
</tr>
</thead>
<tbody>
<?php
  $branch=$_GET['branch'];
  $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
  $info="SELECT facultyid,fullname,photo FROM facultydetails WHERE branch='$branch'";
  $query=mysqli_query($database,$info);
  while($row=mysqli_fetch_assoc($query))
  {  
 $fid=$row['facultyid'];
     $name=$row['fullname'];
	  ?>
	  <tr><td>
	   <?php echo $row['facultyid']."  ";?></td><td><a style="background-color: transparent;color:black" href="http://localhost/project/facfeedbackview.php? fid=<?php echo $fid;?>&name=<?php echo $name;?>"> <?php echo $row['fullname'];?></a>
	  
</td>
</tr>
 <?php
  }	  
  ?>
 </tbody>
 </table>
 <a><input style="background-color: black; color:white;padding: 7px; border: black; border-radius: 2px 2px 2px 2px;" type="button" value="Print this page" onClick="window.print()"></a>
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
td{
	font-size:20px;
}
th{
	background-color:  #1E1413 ;
	color: white;
	font-size:20px;
}


</style>