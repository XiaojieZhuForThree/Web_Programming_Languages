<form action="#" method="post">
    <select name = "year">
      <option value="" >Select...</option>

      <option value='2011' 
         <?php if(isset($_POST['year']) && $_POST['year'] == '2011') 
         echo 'selected= "selected"';
          ?>
      >2011</option>

      <option value='2012' 
         <?php if(isset($_POST['year']) && $_POST['year'] == '2012') 
         echo 'selected= "selected"';
          ?>
      >2012</option>

      <option value='2013' 
         <?php if(isset($_POST['year']) && $_POST['year'] == '2013') 
         echo 'selected= "selected"';
          ?>
      >2013</option>

      <option value='2014' 
         <?php if(isset($_POST['year']) && $_POST['year'] == '2014') 
         echo 'selected= "selected"';
          ?>
      >2014</option>

      <option value='2015' 
         <?php if(isset($_POST['year']) && $_POST['year'] == '2015') 
         echo 'selected= "selected"';
          ?>
      >2015</option>

    </select> 

    <select name="gender">

      <option value="">Select...</option>

      <option value="m" 
         <?php if(isset($_POST['gender']) && $_POST['gender'] == 'm') 
         echo 'selected= "selected"';
          ?>
      >Male</option>

      <option value = 'f'
         <?php if(isset($_POST['gender']) && $_POST['gender'] == 'f') 
         echo 'selected= "selected"';
          ?>
      >Female</option>
      
    </select>
    <input type="submit" name="submit" value="Select name and gender"/>
</form>   

<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";  
  $year = "";
  $gender = "";

if (isset($_POST['submit'])){
  $year = $_POST['year'];
  $gender = $_POST['gender'];
  $conn = mysqli_connect($servername, $username, $password, 'hm3');

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  if ($year != '' && $gender != '') {
    $result = mysqli_query($conn, "SELECT * FROM babynames WHERE year = '$year' AND gender = '$gender' ORDER BY year, ranking");
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Ranking</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['ranking'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
  }

  else {
      $result1 = mysqli_query($conn, "SELECT * FROM babynames WHERE gender = 'm' ORDER BY year, ranking");
      $result2 = mysqli_query($conn, "SELECT * FROM babynames WHERE gender = 'f' ORDER BY year, ranking");
      echo "<br>";
      echo 'Male babies: ';
      echo "<br>";
      echo "<table border='1'>
      <tr>
      <th>Name</th>
      <th>Ranking</th>
      </tr>";

      while($row = mysqli_fetch_array($result1))
      {
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['ranking'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";

      echo "<br>";
      echo 'Female babies: ';
      echo "<br>"; 
      echo "<table border='1'>
      <tr>
      <th>Name</th>
      <th>Ranking</th>
      </tr>";

      while($row = mysqli_fetch_array($result2))
      {
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['ranking'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";
      mysqli_close($conn);      
  }
  
}
?>
