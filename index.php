<?php
session_start();
require_once 'config.php';

if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
 exit;
}

if (isset($_POST['btn-login'])) {
 
 $username = strip_tags($_POST['username']);
 $password = strip_tags($_POST['password']);
 
 $username = $dbcon->real_escape_string($username);
 $password = $dbcon->real_escape_string($password);
 
 $query = $dbcon->query("SELECT user_id, password FROM users WHERE username='$username'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['user_id'];
  header("Location: home.php");
 } else {
  $msg = "<div class='alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $dbcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once ('header.php'); ?>
</head>
<body>

<h1 align="center">Serwis komputerowy</h1>
 <hr /><ol>
    <li><a href="#">Strona główna</a>
      <ul>
        <!--<li><a href="#">link - 1</a></li>
        <li><a href="#">link - 2</a></li>
        <li><a href="#">link - 3</a></li>
        <li><a href="#">link - 4</a></li>
        <li><a href="#">Strona głowna</a></li>-->
      </ul>
    </li>

   <li><a href="#">Kontakt</a>
      <!--<ul>
        <li><a href="#">link - 1</a></li>
        <li><a href="#">link - 2</a></li>
        <li><a href="#">link - 3</a></li>
      </ul>-->
    </li>

    <!--<li><a href="#">dział - 3</a></li>-->

   <!--<li><a href="#">Kontakt</a>
      <ul>
        <li><a href="#">link - 1</a></li>
        <li><a href="#">link - 2</a></li>
        <li><a href="#">link - 3</a></li>
        <li><a href="#">link - 4</a></li>
      </ul>
    </li>-->
  </ol><div id="formularz">
       <form method="post"><center>
       
        <?php
  if(isset($msg)){
   echo $msg;
  }
  ?>
        <p align="center">Logowanie</p>
        <input type="username" class="form-control" placeholder="Username" name="username" required /><br />
        <span id="check-e"></span><br/>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </center><hr />
        <input type="submit" name="btn-login" value="Zaloguj">
        <a id="reg" href="register.php">zarejestruj sie!</a>    
        </form>
	  

    </div>
<ul id="menu"><p align="center">Menu</p>
<p><a id="glowna" href="index.php">Strona główna</a></p>
</ul> 
<?php require 'footer.php'; ?>