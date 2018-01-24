
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
?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Student Home</title>

   <?php
   $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT name,branch,year,section,semester,photo FROM adminusers WHERE username='$_SESSION[username1]'";
   $query=mysqli_query($database,$get);
    while($row=mysqli_fetch_assoc($query)){   
   
   
    $branch=$row['branch'];
	 $year=$row['year'];
	  $section=$row['section'];
	  $semester=$row['semester'];
	  
      }?>
	</tr>
   </tbody>
   </table>
   </div>
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
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty Feedback<span class="caret"></span></a>
          <ul class="dropdown-menu">
             <?php
   $r="SELECT subjectid,subjectname FROM subjects WHERE branch='$branch' AND semester='$semester' AND year='$year'";
   $sel_query=mysqli_query($database,$r);
   while($row=mysqli_fetch_array($sel_query))
   {
	 $subjectid=$row['subjectid'];
	?>
	<li><a  href='http://localhost/project/mainpage.php?&section=<?php echo base64_encode($section);?>&year=<?php echo base64_encode($year);?>&branch=<?php echo base64_encode($branch);?>&subjectid=<?php echo base64_encode($subjectid);?> ' style="color: black; background-color: white; "><?php echo $subjectid." ".$subjectname=$row['subjectname'];?></a></li>
   <?php
   }?>
          </ul>
        </li>
        
        <li><a href='http://localhost/project/feedback.php?&section=<?php echo base64_encode($section);?>&year=<?php echo base64_encode($year);?>&branch=<?php echo base64_encode($branch);?>' >Infrastructure Feedback</a></li>
    <li> <a href="otherstudent.php?logout='1'">Logout</a> </li>
      </ul>
    </div>
  </div>
</nav>
   
  
 <form>
   
  
   <?php
   $database=mysqli_connect('localhost', 'root', '', 'logindatabase');
   $get="SELECT name,branch,year,rollno,section,semester,photo FROM adminusers WHERE username='$_SESSION[username1]'";
   $query=mysqli_query($database,$get);
    while($row=mysqli_fetch_assoc($query)){   
   ?>
   <div align="center" class="form-group">
   <label><?php echo '<img src='.$row['photo'].' height="100" width="100" class="img-thumnail">';//'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="100" width="100" class="img-thumnail" />  ';?>
 </div>
   <div align="center" class="form-group">
   <label>Name :<?php echo " ".$name=$row['name'];?></label>
   </div>
   <div align="center" class="form-group">
   <label>Roll no :<?php echo " ".$rollno=$row['rollno'];?></label>
   </div>
   <div align="center" class="form-group">
   <label>Class :<?php echo " ".$branch=$row['branch']; echo $year=$row['year']; echo $section=$row['section'];?></label>
   </div>
   <div align="center" class="form-group">
   <label>Semester :<?php echo " ".$semester=$row['semester'];?></label>
   </div>
     <?php }?>
	
   </form>
  	
	</body>
	
<div>
 <p style="font-size:15px;">Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>	

</html>




<style>
p{
	vertical-align: bottom;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
<style>
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
table{
position:absolute;
bottom:0px;	
background-color: white;
color:black;
}
label{
	font-size:20px;
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