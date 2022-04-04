<?php
session_start();
unset($_SESSION['sess_user']);
session_destroy();
header("location: https://road-freight-transport.000webhostapp.com/index.php");
?>

