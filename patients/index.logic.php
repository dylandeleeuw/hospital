<?php
	
	$db = new mysqli('localhost','root','','hospital');

	$query = "select * from patient";
	$result = $db->query($query);
	
	$patients = $result->fetch_all(MYSQLI_ASSOC);
?>