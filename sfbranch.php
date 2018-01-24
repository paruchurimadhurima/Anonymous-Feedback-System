<?php 
  include('server.php') ;
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
<style>
table {
	background-color:white;
    width: 100%;
    border-collapse: collapse;
}


th {text-align: left;}
</style>
</head>
<body>

<?php
if( intval($_GET['q'])==1){
$q ='s&h';
}
else if(intval($_GET['q'])==2){
$q ='cse';
}
else if(intval($_GET['q'])==3){
$q ='it';
}
else if(intval($_GET['q'])==4){
$q ='ece';
}
else if(intval($_GET['q'])==5){
$q ='eee';
}
else if(intval($_GET['q'])==6){
$q ='mech';
}
else if(intval($_GET['q'])==7){
$q ='civil';
}
$con = mysqli_connect('localhost','root','','logindatabase');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT facultyid,fullname FROM facultydetails WHERE branch='".$q."'";
$result = mysqli_query($con,$sql);
?>
<table class="table table-condensed">
<thead>
<tr>
<th><strong>Faculty ID</strong></th>
<th><strong>Faculty Name</strong></th>
<th><strong>Subject ID</strong></th>
<th><strong>Subject Name</strong></th>
<th><strong>Classes Taken</strong></th>
<th><strong>Add Subjects<strong></th>
</tr>
</thead>
<tbody>
<?php
$fid=array();
$count=1;
while($row = mysqli_fetch_assoc($result)) {
  $fid=$row['facultyid'];
     $name=$row['fullname'];?>
	  <tr><td>
	   <?php echo $row['facultyid']."  ";?></td><td><?php echo $row['fullname'];?></td>
	   <?php 
	   $sq="SELECT subjects.subjectname, subjects.subjectid FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   ?>
	   <td>
	   <?php
	   
	   while($data=mysqli_fetch_assoc($res))
	   {
		   $subjectid=$data['subjectid'];
		   echo $subjectid;
	  ?></br></br> <?php }?>
	   </td>
	   <td>
	   <?php
	   $sq="SELECT subjects.subjectname, subjects.subjectid FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   while($data=mysqli_fetch_assoc($res))
	   {
	   $subjectname=$data['subjectname'];
	   echo $subjectname;
	    ?> </br></br><?php }
	    $sq="SELECT lecturers.id,lecturers.branch,lecturers.year,lecturers.section FROM lecturers INNER JOIN subjects ON subjects.subjectid=lecturers.subjectid WHERE facultyid='$fid' ";
	   $res = mysqli_query($con,$sq);
	   $id=array();
	   $br=array();
	   $year=array();
	   $section=array();
	    ?>
		<td>
	  <?php
       while($row = mysqli_fetch_assoc($res)) {
		   $id=$row['id'];
      $br=$row['branch'];
	  $year=$row['year'];
	  $section=$row['section'];
	   echo $br.$year.$section;?>
	    <a style="  color: black; background: white;" align="center" href="lecturerdelete.php?id=<?php echo $id ?>">x</a>
    

  
</br>
</br>
<?php } ?>
</td>
<td>

<!-- Trigger the modal with a button -->
  <button style="padding:5px" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Insert</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog">
	 <div class="modal-content">
	 </br></br>
    <form method="post" id="addsub" action="server.php">
      <!-- Modal content-->
     
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 align="center" class="modal-title"</h1>
        </div>
        <div class="modal-body">
		<div class="input-group">
	<label>Faculty ID</label>
  	   <input type="text" name="facultyid" value="<?php echo $row['fid']; ?>">
  	</div>

		<div class="input-group">
	<label>Subject ID</label>
  	  <input type="text" name="subjectid" value="<?php echo $row['subjectid']; ?>">
  	</div>
          <div  class="form-group">
 <label for="sel1">Branch</label>
 <select class="form-control" id="branch" name="branch" value="<?php echo $branch ; ?>">


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
 <select class="form-control" id="year" name="year" value="<?php echo $year ; ?>">
<option value="1">I</option>
<option value="2">II</option>
<option value="3">III</option>
<option value="4">IV</option>
</select>
</div>
<div  class="form-group">
 <label for="sel1">Section</label>
 <select class="form-control" id="section" name="section" value="<?php echo $section ; ?>">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select>
</div>
	
        </div>
		
       <div class="modal-footer">
	   <input id="form-submit" type="submit" class="btn btn-primary" name="addsubject" value="Save">
      </div>
      
	 
	  </form></br></br>
	   </div>
    </div>
</div>
<script>
$('#form-submit').on('click', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "server.php",
        data: $('form.addsub').serialize(),
        success: function(response) {
            alert(response['response']);
        },
        error: function() {
            alert('Error');
        }
    });
    return false;
});
});
</script>


</td>
</tr>

 <?php
 $count++;
}
?>

		</div>
</tbody>
</table>
<input style=" background-color: black; color:white;padding: 7px; border: black; border-radius: 2px 2px 2px 2px; " type="button" value="Print this page" onClick="window.print()">
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
</br></br>
</body>
</html>

		


