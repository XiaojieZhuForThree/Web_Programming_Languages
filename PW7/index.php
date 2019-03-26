<?php

	$servername = "localhost";
  $username = "root";
  $password = "root";  
  $conn = mysqli_connect($servername, $username, $password, 'PW7');

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM Book";
	$result = mysqli_query($conn,$sql);
	$ans = array();
	while($row = mysqli_fetch_assoc($result)){
		$ans[] = $row;
	}

	echo json_encode($ans);	
  mysql_close($conn);
?>