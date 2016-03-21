<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET"):
		$patient = NULL;
		if (isset($_GET['id'])):
			// Get Patient for id
				$db = new mysqli('localhost','root','','hospital');
				$query = "select * from clients";
				$result = $db->query($query);
				$clients = $result->fetch_all(MYSQLI_ASSOC);

				$db = new mysqli('localhost','root','','hospital');
				$query = "select * from species";
				$result = $db->query($query);
				$species = $result->fetch_all(MYSQLI_ASSOC);

				$db = new mysqli('localhost','root','','hospital');
				$id = $db->escape_string($_GET["id"]);
				$query = "select * from patient where id=$id";
				$result = $db->query($query);
				$patient = $result->fetch_assoc();
		endif;
		if ($patient == NULL):
			// No patient found
			http_response_code(404);
			include("../common/not_found.php");
			exit();
		endif;
	elseif ($_SERVER["REQUEST_METHOD"] == "POST"):
		$db = new mysqli('localhost','root','','hospital');
		
		// Prepare data for update
		$id = $db->escape_string($_POST["id"]);
		$name = $db->escape_string($_POST["name"]);
		$species = $db->escape_string($_POST["species"]);
		$status = $db->escape_string($_POST["status"]);
		$gender = $db->escape_string($_POST["gender"]);
		$client_id = $db->escape_string($_POST["client_id"]);

		var_dump($_POST);
		
		// Prepare query and execute
		$query = "UPDATE `hospital`.`patient` SET `name`='$name', `species_id`='$species', `status`='$status', `gender`='$gender', `client_id`='$client_id' WHERE  `id`='$id'";
		$result = $db->query($query);

		var_dump($result);

	
    // Tell the browser to go back to the index page.
   	header("Location: ./");
    exit();
	endif;
?>