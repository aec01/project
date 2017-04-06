<?php 
	// Create connection
	$conn = mysql_connect('localhost', 'root', 'password','db_bloodletting') OR die ('error:'.mysql_error());
	$db= mysql_select_db('db_bloodletting');

?>