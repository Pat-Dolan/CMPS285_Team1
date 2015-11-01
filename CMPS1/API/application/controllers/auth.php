<?php
//verify user is logged in, and if not, redirect to the login page
session_start();
$username=$_SESSION['username'];
if(!$username){
	json_encode(array(type=>"auth"));
}

?>