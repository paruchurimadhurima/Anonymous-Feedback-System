<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Annonymous Feedback System using PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="header">
  	<h5>Feedback Portal Login</h5>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="form-group">
      <label for="usr">Username:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>

  </form>
</body>
<div>
 <p>Developed by M. Sai Sirisha & Madhurima Paruchuri</p>
</div>
</html>


<style>
p {
	vertical-align: bottom;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
	font-size:15px;
    text-align: center;
}
h5{
	font-size:20px;
}
</style>