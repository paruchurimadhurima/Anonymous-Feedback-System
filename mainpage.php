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
<!DOCTYPE HTML>
<html>
 
<head><title>Feedback Page</title></head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css">
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
      <?php  $year=$_GET['year'];
$section=$_GET['section'];
$branch=$_GET['branch'];
?>
        
        <li><a href='http://localhost/project/feedback.php?&section=<?php echo $section;?>&year=<?php echo $year;?>&branch=<?php echo $branch;?>'>Infrastructure Feedback</a></li>
   
 <li> <a href="otherstudent.php?logout='1'">Logout</a> </li>
      </ul>
    </div>
  </div>
</nav>
  
   

<font color="black" size="4px">

<?php
  
   $db = mysqli_connect('localhost', 'root', '', 'logindatabase');
   $section=base64_decode($_GET['section']);
   $year=base64_decode($_GET['year']);
   $branch=base64_decode($_GET['branch']);
   $subjectid=base64_decode($_GET['subjectid']);
   $info="SELECT facultydetails.fullname,facultydetails.facultyid,facultydetails.photo FROM facultydetails,lecturers WHERE lecturers.subjectid='$subjectid'  AND lecturers.section='$section' AND lecturers.year='$year' AND lecturers.facultyid=facultydetails.facultyid AND lecturers.branch='$branch'";
   $sel=mysqli_query($db,$info);
   $row=mysqli_fetch_assoc($sel);
    echo '<p align="center">'.'<img src='.$row['photo'].' height="110" width="110" class="img-thumnail">'.'</p>';
   //'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="100" width="100" class="img-thumnail" />  ';
   
 
	   echo  "<p align='center'>Faculty Name: ".$row['fullname']."</p>";
	  
	    $facultyid=$row['facultyid'];
		
	   
   ?>
 
 </table>

<?php

if(isset($_POST))
{
    
	if(!empty($_POST['Submit'])&&!empty($_POST['q1'])&&!empty($_POST['q2'])&&!empty($_POST['q3'])&&!empty($_POST['q4'])&&!empty($_POST['q5']))
	{  
		$text=$_POST['feedback'];
		 $q1= $_POST['q1'];
		 $q2=$_POST['q2'];
		 $q3= $_POST['q3'];
		 $q4=$_POST['q4'];
		 $q5= $_POST['q5'];
		 $db=mysqli_connect('localhost', 'root', '', 'feedback');
		 $sql_query="INSERT INTO faculty(branch,section,year,subjectid,facultyid,q1,q2,q3,q4,q5,extra) VALUES ('$branch','$section','$year','$subjectid','$facultyid','$q1','$q2','$q3','$q4','$q5','$text')";
		 $res=mysqli_query($db,$sql_query);
		 if($res)
		 {
			
			 header("Location:otherstudent.php");
			  echo " <p align='center'>Feedback posted successfully</p>";
		 }
		 else{
			 echo "An error occured.Please try again later";
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
<form method="POST" id="user" action="">
<div class="boxed">
<table class="table table-condensed">
<tr><th>1.Is the teacher impartial while awarding marks?</th>

 <td align="right">
 <input type='radio' name='q1' value='1'><strong> Poor</strong>
 <input type='radio' name='q1' value='2'><strong> Below Average</strong>
 <input type='radio' name='q1' value='3'><strong> Average</strong>
 <input type='radio' name='q1' value='4'><strong> Good</strong>
 <input type='radio' name='q1' value='5'><strong> Excellent</strong></td>
 
 </tr>


<tr><th>2.Is the teacher on time to class?</th>
 
 <td align="right">
 <input type='radio' name='q2' value='1'><strong> Poor</strong>
 <input type='radio' name='q2' value='2'><strong> Below Average</strong>
 <input type='radio' name='q2' value='3'><strong> Average</strong>
 <input type='radio' name='q2' value='4'><strong> Good</strong>
 <input type='radio' name='q2' value='5'><strong> Excellent</strong></td>
 
 </tr>

<tr><th>3.Does the teacher have sound knowledge and understanding of the subject?</th>
 
 <td align="right">
 <input type='radio' name='q3' value='1'><strong> Poor</strong>
 <input type='radio' name='q3' value='2'><strong> Below Average</strong>
 <input type='radio' name='q3' value='3'><strong> Average</strong>
 <input type='radio' name='q3' value='4'><strong> Good</strong>
 <input type='radio' name='q3' value='5'><strong> Excellent</strong></td>
 
 </tr>
<tr><th> 4.Is the teacher clearing doubts in class?</th>
 
 <td align="right">
 <input type='radio' name='q4' value='1'><strong> Poor</strong>
 <input type='radio' name='q4' value='2'><strong> Below Average</strong>
 <input type='radio' name='q4' value='3'><strong> Average</strong>
 <input type='radio' name='q4' value='4'><strong> Good</strong>
 <input type='radio' name='q4' value='5'><strong> Excellent</strong></td>
 
 </tr>

<tr><th>5.Is the teacher audible in the class and controls the class?</th>
 
 <td align="right">
 <input type='radio' name='q5' value='1'><strong> Poor</strong>
 <input type='radio' name='q5' value='2'><strong> Below Average</strong>
 <input type='radio' name='q5' value='3'><strong> Average</strong>
 <input type='radio' name='q5' value='4'><strong> Good</strong>
 <input type='radio' name='q5' value='5'><strong> Excellent</strong></td>
 
 </tr>

</table> 
<div class="form-group">
  <label for="comment">Feedback:</label>
  <textarea class="form-control" rows="5" id="comment" name="feedback" ></textarea>
</div>
<div align="center">
<input type="submit" name="Submit" value="Submit"/>
</div>
</div>
</form>
</br>
<div class="footer">
 <p style="font-size:15px;">Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>	

</html>

<style>
.footer{
	vertical-align: bottom;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
	font-size:13px;
    text-align: center;
}

input{
	padding: 10px;
  font-size: 15px;
  color: white;
  background: #1E1413;
  border: none;
  border-radius: 5px;
}


table{
	
background-color: transparent;
color:black;
}
label{
	font-size:17px;
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
p{
	font-size:18px;
}
th{
	font-size:15px;
}
tr{
	font-size:15px;
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
}
label{
	font-family:arial;
font-size:20px;
}
form, .content {
  width: 90%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #1E1413;
  border-radius: 10px 10px 10px 10px;
}
img.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: white;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid grey;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: grey;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

</style>