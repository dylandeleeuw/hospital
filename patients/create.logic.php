<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"):
		$db = new mysqli('localhost','root','','hospital');
		
		// Prepare data for insertion
		$name = $db->escape_string($_POST["name"]);
		$status = $db->escape_string($_POST["status"]);
		$gender = $db->escape_string($_POST["gender"]);
		$client_id = $db->escape_string($_POST["cl_id"]);
		$species_id = $db->escape_string($_POST["sp_id"]);
		// Prepare query and execute
		$query = "INSERT INTO `hospital`.`patient` (`name`, `species_id`, `status`, `gender`, `client_id`) VALUES ('$name', $species_id, '$status', '$gender', $client_id)";
		$result = $db->query($query);
		var_dump($_POST);
		var_dump($result);
	
    // Tell the browser to go back to the index page.
    header("Location: ./");
    exit();
	endif;

?>