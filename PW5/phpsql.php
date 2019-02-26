<?
session_start();

$username = $_GET['username'];
$pwd = $_GET['password'];

if (empty($username) || empty($pwd)){
	header('Location: login.html');
}

$con = mysqli_connect('localhost', 'root','root','test3');
