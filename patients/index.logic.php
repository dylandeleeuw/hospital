<?php
	
	$db = new mysqli('localhost','root','','hospital');

	$query = "SELECT patient.name, patient.id, species.species AS species_species, patient.status, patient.gender, clients.name AS client_name FROM patient
				INNER JOIN clients
				ON patient.client_id = clients.id
				INNER JOIN species
				ON patient.species_id = species.id";
	$result = $db->query($query);
	
	$patients = $result->fetch_all(MYSQLI_ASSOC);
?>