<?php
	@session_start();
	session_destroy();
	
	echo"<script>alert('Você Saiu!');</script>";
	header("Location:login.html");
?>