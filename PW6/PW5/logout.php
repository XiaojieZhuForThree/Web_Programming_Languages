<?php
// destroy the session, and go back to login page
session_start();
session_destroy();
header('Location: login.html');
exit();
?>

<html>
<body>

</body>
</html>