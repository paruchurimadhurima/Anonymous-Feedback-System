<?php
session_start();
// variable declaration
$id="";
$name = "";
$username = "";
$rollno = "";
$branch = "";
$year = "";
$section = "";
$profession="";
$semester="";
$email    = "";
$photo = "";
$errors = array(); 
$_SESSION['success'] = "";
$facultyid="";
$subjectid="";
$fullname="";
$slno="";
$subjectname="";
$fid="";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'logindatabase');



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
 /*if(@getimagesize($_FILES['photo']['tmp_name'])==FALSE)
 {
	 echo "Please select a jpg image.";
 }
 else{
	 $photo=addslashes($_FILES['photo']['tmp_name']);
	 $iphoto=addslashes($_FILES['photo']['name']);
	 $photo=file_get_contents($photo);
	 $photo=base64_encode($photo);
 }*/
 $photo = mysqli_real_escape_string($db, $_POST['photo']);
 $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
$branch = mysqli_real_escape_string($db, $_POST['branch']);
$year = mysqli_real_escape_string($db, $_POST['year']);
$section = mysqli_real_escape_string($db, $_POST['section']);
$semester = mysqli_real_escape_string($db, $_POST['semester']);
 $profession = mysqli_real_escape_string($db, $_POST['profession']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  if (empty($photo)) { array_push($errors, "Photo is required"); }
   if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
 if (empty($rollno)) { array_push($errors, "Rollno is required"); }
 if (empty($branch)) { array_push($errors, "Branch is required"); }
 if (empty($year)) { array_push($errors, "Year is required"); }
 if (empty($section)) { array_push($errors, "Section is required"); }
 if (empty($semester)) { array_push($errors, "Semester is required"); }
 if (empty($profession)) { array_push($errors, "Profession is required"); }
 if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO adminusers ( photo, name, username, rollno, branch, year, section, semester, profession, email, password) 
  			  VALUES( '$photo', '$name', '$username', '$rollno', '$branch', '$year', '$section', '$semester', '$profession', '$email', '$password')";
  	mysqli_query($db, $query);
  
  	header('location: register.php');
	 //echo "User Succesfully Registered";
  }

}




if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  
  if (count($errors) == 0  ) {
  	$password = md5($password);
  	$query = "SELECT * FROM adminusers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username1'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: otherstudent.php');

 
	  
  	}else {
  	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: adminhome.php');
  	}
else{

$query = "SELECT * FROM facultydetails WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username2'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: facultyhome.php');
	}
	
}
  }}
}






// REGISTER USER
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  
  if (empty($username)) { array_push($errors, "Username is required"); }
 if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO admin ( username, email, password) 
  			  VALUES(  '$username',  '$email', '$password')";
  	mysqli_query($db, $query);
  
  	header('location: adminregister.php');
	 //echo "User Succesfully Registered";
  }
}



if (isset($_POST['reg_faculty'])) {
  // receive all input values from the form
  $photo = mysqli_real_escape_string($db, $_POST['photo']);
 /* if(@getimagesize($_FILES['photo']['tmp_name'])==FALSE)
 {
	 echo "Please select a jpg image.";
 }
 else{
	 $photo=addslashes($_FILES['photo']['tmp_name']);
	 $iphoto=addslashes($_FILES['photo']['name']);
	 $photo=file_get_contents($photo);
	 $photo=base64_encode($photo);
 }
 */
 $facultyid = mysqli_real_escape_string($db, $_POST['facultyid']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
$branch = mysqli_real_escape_string($db, $_POST['branch']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
   

  // form validation: ensure that the form is correctly filled
  if (empty($photo)) { array_push($errors, "Photo is required"); }
   if (empty($facultyid)) { array_push($errors, "Faculty ID is required"); }
  if (empty( $fullname)) { array_push($errors, "Faculty Fullname is required"); }
 
 if (empty($branch)) { array_push($errors, "Branch is required"); }
 
 if (empty($email)) { array_push($errors, "Email is required"); }
 if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match"); 
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO facultydetails ( photo, facultyid, fullname,  branch,  email,username,password) 
  			  VALUES( '$photo', '$facultyid', '$fullname', '$branch',  '$email','$username','$password')";
  	mysqli_query($db, $query);
  
  	header('location: facultyregister.php');
	 //echo "User Succesfully Registered";
  }


}

if (isset($_POST['reg_lecturer'])) {
  // receive all input values from the form
  $subjectid = mysqli_real_escape_string($db, $_POST['subjectid']);
 $facultyid = mysqli_real_escape_string($db, $_POST['facultyid']);
$branch = mysqli_real_escape_string($db, $_POST['branch']);
$year = mysqli_real_escape_string($db, $_POST['year']);
$section = mysqli_real_escape_string($db, $_POST['section']);

  // form validation: ensure that the form is correctly filled
  if (empty($subjectid)) { array_push($errors, "Subject ID is required"); }
   if (empty($facultyid)) { array_push($errors, "Faculty ID is required"); }
  
 if (empty($branch)) { array_push($errors, "Branch is required"); }
 if (empty($year)) { array_push($errors, "Year is required"); }
 if (empty($section)) { array_push($errors, "Section is required"); }
 
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO lecturers ( subjectid, facultyid,  branch, year, section) 
  			  VALUES( '$subjectid', '$facultyid',  '$branch', '$year', '$section')";
  	mysqli_query($db, $query);
  
  	header('location: lecturerregister.php');
	 //echo "User Succesfully Registered";
  }
}

if (isset($_POST['reg_subject'])) {
  // receive all input values from the form
  $subjectid = mysqli_real_escape_string($db, $_POST['subjectid']);
 $subjectname = mysqli_real_escape_string($db, $_POST['subjectname']);
$branch = mysqli_real_escape_string($db, $_POST['branch']);
$year = mysqli_real_escape_string($db, $_POST['year']);
$semester = mysqli_real_escape_string($db, $_POST['semester']);

  // form validation: ensure that the form is correctly filled
  if (empty($subjectid)) { array_push($errors, "Subject ID is required"); }
   if (empty($subjectname)) { array_push($errors, "Subject Name is required"); }
  
 if (empty($branch)) { array_push($errors, "Branch is required"); }
 if (empty($year)) { array_push($errors, "Year is required"); }
 if (empty($semester)) { array_push($errors, "Semester is required"); }
 
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO subjects ( subjectid, subjectname,  branch, year, semester) 
  			  VALUES( '$subjectid', ' $subjectname',  '$branch', '$year', '$semester')";
  	mysqli_query($db, $query);
  
  	header('location: subjectregister.php');
	 //echo "User Succesfully Registered";
  }
}

if (isset($_POST['addsubject'])) {
  // receive all input values from the form
  $facultyid = mysqli_real_escape_string($db, $_POST['facultyid']);
  $subjectid = mysqli_real_escape_string($db, $_POST['subjectid']);
  $branch = mysqli_real_escape_string($db, $_POST['branch']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $section = mysqli_real_escape_string($db, $_POST['section']);

  // form validation: ensure that the form is correctly filled
  
  if (empty($facultyid)) { array_push($errors, "Facultyid is required");header('location: lecturerlist.php'); }
 if (empty($subjectid)) { array_push($errors, "Subjectid is required");header('location: lecturerlist.php'); }
  if (empty($branch)) { array_push($errors, "Branch is required"); header('location: lecturerlist.php');}
   if (empty($year)) { array_push($errors, "Year is required"); header('location: lecturerlist.php');}
    if (empty($section)) { array_push($errors, "Section is required"); header('location: lecturerlist.php');}
 
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO lecturers(subjectid,facultyid,branch,year,section) VALUES ('$_POST[subjectid]','$_POST[facultyid]','$_POST[branch]','$_POST[year]','$_POST[section]')";
     
  	mysqli_query($db, $query);
  
  	header('location: lecturerlist.php');
	 //echo "User Succesfully Registered";
  }
}


if(isset($_POST['Upload']))
{   
    $mimes=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	$filename=$_FILES["file"]["name"];
	if(in_array($_FILES["file"]["type"],$mimes))
	{ 
	  $file=fopen($filename,"r");
	  $i=0;
	 
	  while(($data=fgetcsv($file,100000,","))!==FALSE)
	  { if($i>0)
		  {$query="INSERT INTO adminusers VALUES ('','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".md5($data[9])."','".$data[10]."','".$data[11]."')";
		  $result=mysqli_query($db,$query);
		  if(!isset($result))
		  {
			  echo "<script type=\"text/javascript\">
			  alert(\"Invalid File:Please upload CSV file.\");
			  window.location=\"register.php\"
			  </script>";
		  }
		  else{

			  $referer=$_SERVER['HTTP_REFERER'];
			  header("Location:$referer");
			 
		  }
	  }
	  $i++;
	 } 
	 fclose($file);
	 			  echo "<script type=\"text/javascript\">
			  alert(\"CSV File has been successfully imported.\");
			  window.location=\"register.php\"
			   </script>";
	}

   else
	{
		echo "File type not supported.Please upload a csv file.";
	}
}
if(isset($_POST['adminupload']))
{   
    $mimes=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	$filename=$_FILES["file"]["name"];
	if(in_array($_FILES["file"]["type"],$mimes))
	{ 
	  $file=fopen($filename,"r");
	  $i=0;
	  while(($data=fgetcsv($file,100000000000,","))!==FALSE)
	  { if($i>0)
		  {$query="INSERT INTO admin VALUES ('','".$data[1]."','".$data[2]."','".md5($data[3])."')";
		  $result=mysqli_query($db,$query);
		  if(!isset($result))
		  {
			  echo "<script type=\"text/javascript\">
			  alert(\"Invalid File:Please upload CSV file.\");
			  window.location=\"adminregister.php\"
			  </script>";
		  }
		  else{

			  $referer=$_SERVER['HTTP_REFERER'];
			  header("Location:$referer");
			 
		  }
	  }
	  $i++;
	 } 
	 fclose($file);
	 			  echo "<script type=\"text/javascript\">
			  alert(\"CSV File has been successfully imported.\");
			  window.location=\"adminregister.php\"
			   </script>";
	}

   else
	{
		echo "File type not supported.Please upload a csv file.";
	}
}

if(isset($_POST['facultyupload']))
{   
    $mimes=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	$filename=$_FILES["file"]["name"];
	if(in_array($_FILES["file"]["type"],$mimes))
	{ 
	  $file=fopen($filename,"r");
	  $i=0;
	  while(($data=fgetcsv($file,100000,","))!==FALSE)
	  { if($i>0)
		  {$query="INSERT INTO facultydetails VALUES ('','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".md5($data[7])."')";
		  $result=mysqli_query($db,$query);
		  if(!isset($result))
		  {
			  echo "<script type=\"text/javascript\">
			  alert(\"Invalid File:Please upload CSV file.\");
			  window.location=\"facultyregister.php\"
			  </script>";
		  }
		  else{

			  $referer=$_SERVER['HTTP_REFERER'];
			  header("Location:$referer");
			 
		  }
	  }
	  $i++;
	 } 
	 fclose($file);
	 			  echo "<script type=\"text/javascript\">
			  alert(\"CSV File has been successfully imported.\");
			  window.location=\"facultyregister.php\"
			   </script>";
	}

   else
	{
		echo "File type not supported.Please upload a csv file.";
	}
}

if(isset($_POST['lecturerupload']))
{   
    $mimes=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	$filename=$_FILES["file"]["name"];
	if(in_array($_FILES["file"]["type"],$mimes))
	{ 
	  $file=fopen($filename,"r");
	  $i=0;
	  while(($data=fgetcsv($file,100000,","))!==FALSE)
	  { if($i>0)
		  {$query="INSERT INTO lecturers VALUES ('','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."')";
		  $result=mysqli_query($db,$query);
		  if(!isset($result))
		  {
			  echo "<script type=\"text/javascript\">
			  alert(\"Invalid File:Please upload CSV file.\");
			  window.location=\"lecturerregister.php\"
			  </script>";
		  }
		  else{

			  $referer=$_SERVER['HTTP_REFERER'];
			  header("Location:$referer");
			 
		  }
	  }
	  $i++;
	 } 
	 fclose($file);
	 			  echo "<script type=\"text/javascript\">
			  alert(\"CSV File has been successfully imported.\");
			  window.location=\"lecturerregister.php\"
			   </script>";
	}

   else
	{
		echo "File type not supported.Please upload a csv file.";
	}
}
if(isset($_POST['subjectupload']))
{   
    $mimes=array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	$filename=$_FILES["file"]["name"];
	if(in_array($_FILES["file"]["type"],$mimes))
	{ 
	  $file=fopen($filename,"r");
	  $i=0;
	  while(($data=fgetcsv($file,100000,","))!==FALSE)
	  { if($i>0)
		  {$query="INSERT INTO subjects VALUES ('','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."')";
		  $result=mysqli_query($db,$query);
		  if(!isset($result))
		  {
			  echo "<script type=\"text/javascript\">
			  alert(\"Invalid File:Please upload CSV file.\");
			  window.location=\"subjectregister.php\"
			  </script>";
		  }
		  else{

			  $referer=$_SERVER['HTTP_REFERER'];
			  header("Location:$referer");
			 
		  }
	  }
	  $i++;
	 } 
	 fclose($file);
	 			  echo "<script type=\"text/javascript\">
			  alert(\"CSV File has been successfully imported.\");
			  window.location=\"subjectregister.php\"
			   </script>";
	}

   else
	{
		echo "File type not supported.Please upload a csv file.";
	}
}
?>
