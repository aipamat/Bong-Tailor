<?php 

    include '../head/session.php';

    session_destroy();
	header("Location: ../login.php");

?>