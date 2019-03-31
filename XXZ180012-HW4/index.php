<?php

	$servername = "localhost";
  $username = "root";
  $password = "root";  
  $conn = mysqli_connect($servername, $username, $password, 'HW4');

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $addr=$_SERVER['REQUEST_URI'];

  $id = $addr[strlen($addr) - 1];
  if ($id == 's') {
    $sql = "SELECT Title, Price, Category FROM Book";
    $result = mysqli_query($conn,$sql);
    $ans = array();
    while($row = mysqli_fetch_assoc($result)){
      $ans[] = $row;
    }
    echo json_encode($ans);    
  }

  else {
    $sql = "SELECT Author_Name FROM Book_Author, Author WHERE Book_id= '$id' AND Book_Author.`Author_id` = Author.`Author_id`";
    $result = mysqli_query($conn,$sql);
    $ans = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $ans[] = $row;
    }
    $authors = array();
    $i = 0;
    while($ans[$i] != null) {
      $authors[] = $ans[$i]['Author_Name'];
      $i++;
    }

    $sql = "SELECT Title, Year, Price, Category FROM Book WHERE Book_id= '$id'";    
    $queue = mysqli_query($conn, $sql);
    $info =array();
    while($query=mysqli_fetch_assoc($queue)) {
      $info[]=$query;
    }
    $author = join(", ", $authors);
    $info[0]['Authors'] = $author;
    echo json_encode($info);
  }
  mysql_close($conn);
?>