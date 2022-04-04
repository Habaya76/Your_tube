<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['idusers']);
	unset($_SESSION['role']);
	header('location:index.php');

	?>
