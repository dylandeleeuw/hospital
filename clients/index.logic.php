<?php
	
	$db = new mysqli('localhost','root','','hospital');

	$query = "select * from clients";
	$result = $db->query($query);
	
	$clients = $result->fetch_all(MYSQLI_ASSOC);
?>