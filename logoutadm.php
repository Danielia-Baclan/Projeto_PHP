<?php session_start();
unset($_SESSION['id_usuario']);
unset($_SESSION['nome']);
unset($_SESSION['senha']);
unset($_SESSION['email']);
session_destroy();
header('location:loginadm.php'); 
?>