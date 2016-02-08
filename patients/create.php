<?php
	require_once "create.logic.php";
	include "../common/header.php";

	$db = new mysqli('localhost','root','','hospital');
	$query = "select * from clients";
	$result = $db->query($query);
	$clients = $result->fetch_all(MYSQLI_ASSOC);
?>
	<h1>New patiënt</h1>
	<form method="post">
		<div>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name">
		</div>
		<div>
			<label for="name">Species:</label>
			<input type="text" id="species" name="species">
		</div>
		<div>
			<label for="name">Status:</label>
			<textarea id="status" name="status"></textarea>
		</div>
		<div>
			<label for="name">Gender:</label>
			<input type="radio" name="gender" value="male"> Male
  			<input type="radio" name="gender" value="female"> Female
		</div>
		<div>
			<label for="name">Client:</label>
			<select name="id">
			 	<?php foreach ($clients as $client):?> 
			 		<option value="<?php echo $client['id'] ?>"><?php echo $client['name'];?></option>
			 	<?php
			 		endforeach;
			 	?>
			</select>	
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>
<?php
	include "../common/footer.php";
?>