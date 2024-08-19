
<?php
session_start();

// session variable unset garne
$_SESSION = array();

// session destroy garne
session_destroy();

// logout msg sangai signin page ma pathaune
header("Location: pages/signin.php?logout=1");
exit();
?>
