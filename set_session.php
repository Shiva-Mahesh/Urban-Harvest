<?php
session_start();
$_SESSION['user_id'] = 'test@gmail.com';
$_SESSION['username'] = 'test@gmail.com';
$_SESSION['fname'] = 'test';
echo "Session set!";
echo "session id: ".session_id();
phpinfo();
?>

