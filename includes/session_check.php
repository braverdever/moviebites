<?php
if(!empty(@$_SESSION['admin_name']))
{
	session_destroy();
	header( "location:index.php");
	exit;	 
}	
?>