<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-----------------------------------------------
	session_destroy();
	//-----------------------------------------------
	header("Location: ../");
	exit();