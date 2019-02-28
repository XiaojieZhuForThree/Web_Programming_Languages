<?
session_start();

$username = $_GET['username'];
$pwd = $_GET['password'];

if (empty($username) || empty($pwd)){
	header('Location: login.html');
}

$con = mysqli_connect('localhost', 'root', 'root', 'test3');

if ($con) {
	$sql = 'SELECT * FROM users WHERE username = "$username" AND password = "$pwd"';

	echo $sql;

	$result = mysqli_query($con, $sql);
	$user = mysqli_fetch_array($result);
	if(mysqli_num_rows($result) != 0) {
		$_SESSION['usr'] = $username;
		echo 'User has been signed in.';
		
	}
}
