<?php
session_start();
// check if the user has logged in 
// if yes, welcome the user, else, go back to login page
if ($_SESSION["login"] == true){
	$_SESSION["visited"] += 1;
	echo "Welcome, " . $_SESSION["username"] . "!<br>";
	echo "You have visited this page for " . $_SESSION["visited"] . " time(s)."  . "<br><br>";
	echo('<a href ="?php echo $_SERVER["REQUEST_URI"">Click here to reload the page</a>' . "<br><br>");
	echo('<a href ="logout.php">Click here to log-out</a>');
}
else
	header('Location: login.html');
	exit();
?>
<html>
<body>
</body>
</html>