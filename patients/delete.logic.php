<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET"):
		$patient = NULL;
		if (isset($_GET['id'])):
			// Get Patient for id
			$db = new mysqli('localhost','root','','hospital');
			$id = $db->escape_string($_GET["id"]);
			
			$query = "SELECT patient.name, patient.id, species.species FROM patient
						INNER JOIN species
						ON patient.species_id = species.id where patient.id=$id";
			$result = $db->query($query);
		
			$patient = $result->fetch_assoc();		
		endif;
		var_dump($patient);
		if ($patient == NULL):
			// No patient found
			http_response_code(404);
			include("../common/not_found.php");
			exit();
		endif;
	elseif ($_SERVER["REQUEST_METHOD"] == "POST"):
		if (isset($_POST['confirmed'])):
			$db = new mysqli('localhost','root','','hospital');
		
			// Prepare data for delete
			$id = $db->escape_string($_POST["id"]);
	
			// Prepare query and execute
			$query = "delete from patient where id=$id";
			$result = $db->query($query);
		endif;
		
		// Tell the browser to go back to the index page.
		header("Location: ./");
		exit();
	endif;
//SELECT patient.name, species.species, clients.name AS clients_name FROM patient INNER JOIN species ON patient.species_id = species.id INNER JOIN clients ON patient.client_id = client.id WHERE id=$id
?>