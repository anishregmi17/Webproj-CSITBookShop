
<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the signin.php inside pages folder with a logout message
header("Location: pages/signin.php?logout=1");
exit();
?>
