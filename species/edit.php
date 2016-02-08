<?php
	require_once "edit.logic.php";
	include "../common/header.php";
?>
	<h1>Edit Species</h1>
	<form method="post">
		<div>
			<input type="hidden" name="id" value="<?=$species['id']?>">
			<label for="name">Species:</label>
			<input type="text" id="species" name="species" value="<?=$species['species']?>">
		</div>
		<div>
			<label></label>
			<input type="submit" value="Save">
		</div>
	</form>
	<p><a href="index.php">Back to species</a></p>
<?php
	include "../common/footer.php";
?>