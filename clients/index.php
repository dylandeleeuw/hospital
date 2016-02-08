<?php
	require_once "index.logic.php";
	include "../common/header.php";

	$sql = "SELECT id FROM clients LEFT JOIN patient IN client.id = patient.id;"
?>
	<h1>Clients</h1>
	<p class="options"><a href="create.php">create</a></p>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>id</th>
			</tr>
		</thead>
		</tbody>
<?php
	foreach($clients as $client):
?>
			<tr>
				<td><?=$client['name']?></td>
				<td><?=$client['id']?></td>
				<td class="center"><a href="edit.php?id=<?=$client['id']?>">edit</a></td>
				<td class="center"><a href="delete.php?id=<?=$client['id']?>">delete</a></td>
			</tr>

<?php
	endforeach;
?>
		</tbody>
	</table>
	
<?php
	include "../common/footer.php";
?>