<?php
//connect.php
//Used to connect to the database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'thesentinels';
if(!mysql_connect($server, $username, $password)){
	exit('Error: could not establish database connection.  connect.php:8');
}
if(!mysql_select_db($database)){
	exit('Error: could not select the database. connect.php:11');
}
?>