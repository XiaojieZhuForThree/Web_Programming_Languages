<?php
session_start();
if (isset($_SESSION["username"])){
	$_SESSION["visited"] += 1;
	echo "Welcome, " . $_SESSION["username"] . "!<br>";
	echo "You have visited this page for " . $_SESSION["visited"] . " times."  . "<br><br>";
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