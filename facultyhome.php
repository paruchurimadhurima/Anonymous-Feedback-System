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
<?php
$database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT facultyid,fullname FROM facultydetails WHERE username='$_SESSION[username2]'";
   $query=mysqli_query($database,$get);
   while($row=mysqli_fetch_assoc($query))
   {
    $facultyid=$row['facultyid'];
	$name=$row['fullname'];
   }
   
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
	  <li class="active"><a href="#">Home</a></li>
        <li><a href="http://localhost/project/facview.php?facultyid=<?php echo base64_encode($facultyid);?>&name=<?php echo base64_encode($name);?>">View your Feedback</a></li>
       <li><a href="facultyhome.php?logout='1'">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
   <form>
  
   <?php
    $get="SELECT facultyid,fullname,branch,photo,email FROM facultydetails WHERE username='$_SESSION[username2]'";
   $query=mysqli_query($database,$get);
   $query=mysqli_query($database,$get);
    while($row=mysqli_fetch_assoc($query)){   
   ?>
   <div align="center" class="form-group">
   <?php echo '<img src='.$row['photo'].' height="100" width="100" class="img-thumnail">';//'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="100" width="100" class="img-thumnail" />  ';?>
 </div>
   <div align="center" class="form-group">
   <label>Faculty ID :<?php echo " ".$facultyid=$row['facultyid'];?></label>
   </div>
   <div align="center" class="form-group">
    <label>Faculty Name :<?php echo " ".$name=$row['fullname'];?></label>
	</div>
   <div align="center" class="form-group">
   <label>Branch :<?php echo " ".$branch=$row['branch'];?></label>
   </div>
   <div align="center" class="form-group">
	 <label>Email :<?php echo " ".$email=$row['email'];?></label>
	 </div>
	
	  
     <?php }?>
   </form>
</body>
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

form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #1E1413;
  background: 10px solid gray;
  border-radius: 10px 10px 10px 10px;
}
p{
font-size:20px;	
}
label{
	font-size:20px;
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