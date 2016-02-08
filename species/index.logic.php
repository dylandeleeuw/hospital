<?php
	
	$db = new mysqli('localhost','root','','hospital');

	$query = "select * from species";
	$result = $db->query($query);
	
	$species = $result->fetch_all(MYSQLI_ASSOC);
?>