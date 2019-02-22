<?php
  // start the session
  session_start();
  $name = $email = $password = "";
  // function used to trim the data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST")
    // check if the input is valid or not
  {    
    if (empty($_POST["username"]))
    {
        // if not, go back to login page
        header('Location: login.html');
        exit();
    } 
    else 
    {
      $name = test_input($_POST["username"]);
    }

    if (empty($_POST["email"]))
    {
      header('Location: login.html');
      exit();
    } 
    else 
    {
      $email = test_input($_POST["email"]);
      if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
      {
        header('Location: login.html');
        exit();
      }
    }

    if (empty($_POST["password"]))
    {
      header('Location: login.html');
      exit();
    } 
    else 
    {
      $password = test_input($_POST["password"]);
      if ((strlen($password) < 6)) 
      {
        header('Location: login.html');
        exit();
      }
    }
  }
  // otherwise, set the session variable and go to welcome page
  if ($_SESSION["username"] != $name){
    $_SESSION["username"] = $name;
    $_SESSION["password"] = $password;
    $_SESSION["email"] = $email;
    $_SESSION["visited"] = 0; 
    $_SESSION["login"] = true;   
  }

  header('Location: welcome.php');
?>
<html>
<body>

</body>
</html>