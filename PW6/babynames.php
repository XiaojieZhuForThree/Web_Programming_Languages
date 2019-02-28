<?php
$servername = "localhost";
$username = "root";
$password = "root";


$year = $_GET['year'];
$gender = $_GET['gender'];

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$result = mysqli_query($conn,"SELECT * FROM babynames WHERE gender='gender' AND year = 'year'");
while($row = mysqli_fetch_array($result))
	{
		echo $row['name'] . " " . $row['ranking'];
		echo "<br>";
	}
?>

<!-- <?php
// $con=mysqli_connect("example.com","peter","abc123","my_db");
// // Check connection
// if (mysqli_connect_errno())
// 	{
// 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	}
// 	$result = mysqli_query($con,"SELECT * FROM Persons WHERE FirstName='Peter'");
// 	while($row = mysqli_fetch_array($result))
// 		{
// 			echo $row['FirstName'] . " " . $row['LastName'];
// 			echo "<br>";
// 		}
?>  -->
