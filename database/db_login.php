<?php
$server = 'localhost:8889';
$username = 'root';
$password = '';
$database = 'FILMMA';


try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}

?>