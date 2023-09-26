<?php
session_start();
unset($_SESSION['user_mail']);
unset($_SESSION['user']);
unset($_SESSION);

session_destroy();

header('Location: index.php');

exit();
?>