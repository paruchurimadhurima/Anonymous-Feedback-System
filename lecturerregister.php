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



<!DOCTYPE html>
<html>
<head>
  <title>LecturersDB</title>
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
<div class="container">
   
    <form method="post" action="lecturerregister.php" enctype="multipart/form-data">
  <?php include('errors.php'); ?>
    
  	    <label>CSV file</label>
		</br>
  	  <input type="file" name="file" value="<?php echo $csv; ?>">
	  <div class="input-group">
  	  <button type="submit" class="btn" name="lecturerupload" value="Upload" >Upload</button>
	  
  	</div>
	</form>
</br>	
	 <h3 align="center"> OR Fill the below Fields </h3>
 

  <div class="header">
  	<h5>Lecturer Register</h5>
  </div>
	
  <form method="post" action="lecturerregister.php">
  
  	<?php include('errors.php'); ?>
	
    
  	    <div class="input-group">
	<label>Subject ID</label>
  	  <input type="text" name="subjectid" value="<?php echo $subjectid; ?>">
  	</div>
		<div class="input-group">
	<label>Faculty ID</label>
  	  <input type="text" name="facultyid" value="<?php echo $facultyid; ?>">
  	</div>
		
	<div  class="form-group">
 <label for="sel1">Branch</label>
 <select class="form-control" id="sel1" name="branch" value="<?php echo $branch ; ?>">


<option value="cse">CSE</option>
<option value="it">IT</option>
<option value="ece">ECE</option>
<option value="eee">EEE</option>
<option value="mech">MECH</option>
<option value="civil">CIVIL</option>
</select>
</div>


<div  class="form-group">
 <label for="sel1">Year</label>
 <select class="form-control" id="sel1" name="year" value="<?php echo $year ; ?>">
<option value="1">I</option>
<option value="2">II</option>
<option value="3">III</option>
<option value="4">IV</option>
</select>
</div>

	
	<div  class="form-group">
 <label for="sel1">Section</label>
 <select class="form-control" id="sel1" name="section" value="<?php echo $section ; ?>">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select>
</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_lecturer" >Register</button>
	  
  	</div>
	
</div>

  </form>
  </br>
  </br>
  
</div>
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
</style>