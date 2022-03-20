<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
}
require_once 'config.php';

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['username']);
 $name = strip_tags($_POST['name']);
 $surname = strip_tags($_POST['surname']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 
 $uname = $dbcon->real_escape_string($uname);
 $name = $dbcon->real_escape_string($name);
 $surname = $dbcon->real_escape_string($surname);
 $email = $dbcon->real_escape_string($email);
 $upass = $dbcon->real_escape_string($upass);
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $dbcon->query("SELECT email FROM users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 

 
 if ($count==0) {
  
  $query = "INSERT INTO users(username,name,surname,email,password) VALUES('$uname','$name','$surname','$email','$hashed_password')";

  if ($dbcon->query($query)) {
   $msg = "<div class='alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Rejestracja udana !
     </div>";
  }else {
   $msg = "<div class='alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Błąd przy rejestracji !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Taka nazwa juz istnieje !
    </div>";
   
 }
 
 $dbcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
<h1 align="center">Rejestracja</h1>
<div class="signin-form">
 <div class="container">
       <form class="form-signin" method="post" id="register-form">
       <?php
  if (isset($msg)) {
   echo $msg;
  }
  ?>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required  /><br />
		<input type="text" class="form-control" placeholder="Name" name="name" required  /><br />
		<input type="text" class="form-control" placeholder="Surname" name="surname" required  /><br />
		</div>

        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required  /><br />
		<input type="email" class="form-control" placeholder="Repeat address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required  /><br />
		<input type="password" class="form-control" placeholder="Repeat Password" name="password" required  />
        </div>
        
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
   </button> 
            <a href="index.php" id="log" style="float:left;">Log In Here</a>
        </div> 
      
      </form>

    </div>
    
</div>

</body>
</html>