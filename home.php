<?php
session_start();
include_once 'config.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$query = $dbcon->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$dbcon->close();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Serwis komputerowy</title><?php #echo $userRow['username']; ?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<h1 align="center">Serwis komputerowy</h1>
 <hr />
          <div id="formularz">
           <!--Edycja profilu--> <p align="center">Konto</p>
		   <a href="profile.php"><span class="glyphicon glyphicon-user"></span>
		   Witaj,  <?php echo $userRow['name']; ?></a>
          <a href="logout.php?logout"><br /><span class="glyphicon glyphicon-log-out">
		  </span>Wyloguj się!</a>
          
        </div>      
   

<ul id="menu"><p align="center">Menu</p>
<p><a id="glowna" href="index.php">Strona główna</a></p>
</ul>

<?php require 'footer.php'; ?>