
<?php include('server.php') ?>
<?php 
 if (!isset($_SESSION['username1'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username1']);
  	header("location: login.php");
  }
  $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT branch,year,section FROM adminusers WHERE username='$_SESSION[username1]'";
   $query=mysqli_query($database,$get);
   while($data=mysqli_fetch_assoc($query))
   {
	   if($data['year']!=base64_decode($_GET['year'])||$data['section']!=base64_decode($_GET['section'])||$data['branch']!=base64_decode($_GET['branch']))
		   die("<h1>Error 404!!!!!</h1><br/>Page not found.Please try again later.");
   }

?>
<!DOCTYPE html>
<html>

<head><title>Feedback Page</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
 <?php
   $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT name,branch,year,section,semester,photo FROM adminusers WHERE username='$_SESSION[username1]'";
   $query=mysqli_query($database,$get);
   ?>
	
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
        <li><a href='http://localhost/project/otherstudent.php'>Home</a></li>
        
        <li  class="active"><a>Infrastructure Feedback</a></li>
   
 <li> <a href="otherstudent.php?logout='1'">Logout</a> </li>
      </ul>
    </div>
  </div>
</nav>
   
  
   
 
</br></br>
<div class="boxed">
<?php
if(isset($_POST))
{
    
	if(!empty($_POST['Submit'])&&!empty($_POST['feedback']))
	{  
$year=base64_decode($_GET['year']);
$section=base64_decode($_GET['section']);
$branch=base64_decode($_GET['branch']);
		$fb=$_POST['feedback'];
	    $type=$_POST['category'];
		 $database=mysqli_connect('localhost', 'root', '', 'feedback');
        $put="INSERT INTO infrastructure(branch ,year ,	section ,type ,feedback) VALUES ('$branch','$year','$section','$type','$fb')";
		$result=mysqli_query($database,$put);
       if($result)
	   {
		   echo " <p align='center'> Feedback posted successfully</p>";   
	   }
	   else{
		   die("An error occured.Please try again later");
	   }
	}
	else
	{  
		echo "";
    }
}
else
{
  die('An error occured please try again later');
}

?>
</div>
<form action=" " method="POST">
<div  class="form-group">
 <label for="sel1">Select category:</label>
 <select class="form-control" id="sel1" name='category'>
Select the category and enter your feedback :</br></br>
<p align='left'> Category:
<option value="Classrooms">Classrooms</option>
<option value="Laboratories">Laboratories</option>
<option value="College Transport">College Transport</option>
<option value="Library">Library</option>
<option value="Canteen">Canteen</option>
<option value="Others">Others</option>
</select>
</div>
<div class="form-group">
  <label for="comment">Feedback:</label>
  <textarea class="form-control" rows="5" id="comment" name="feedback" ></textarea>
</div>


<p align="center"><input style="background-color: black; color:white;padding: 7px;font-size:15px; border: black; border-radius: 5px 5px 5px 5px;" type="submit" name="Submit" value="Submit"/></p>
</div>
</form>
<div class="footer">
 <p style="font-size:15px;">Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>	

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
form, .content {
	
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #1E1413;
  background: 1px solid gray;
  border-radius: 10px 10px 10px 10px;
}

</style>