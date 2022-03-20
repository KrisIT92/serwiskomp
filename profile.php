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
<title>Edycja profilu - <?php echo $userRow['username']; ?></title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<h1 align="center">Serwis komputerowy</h1>
 <hr />
          <div id="formularz">
           <form method="post">
				<input type="<?php echo $userRow['name']; ?>" class="form-control" placeholder="<?php echo $userRow['name']; ?>" name="username" required /><br />
        <span id="check-e"></span><br/>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </center><hr />
        <input type="submit" name="btn-login" value="Zaloguj">
		   
		   </form>
        </div>      
   

<ul id="menu"><p align="center">Menu</p>
<p><a id="glowna" href="index.php">Strona główna</a></p>
</ul>

<?php require 'footer.php'; ?>