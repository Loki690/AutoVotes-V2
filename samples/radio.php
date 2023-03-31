<!DOCTYPE html>
<html>
<head>
	<title>Checkbox Form</title>
</head>
<body>
	<?php
		$selections = array(
			"Selection 1",
			"Selection 2",
			"Selection 3",
			"Selection 4",
			"Selection 5"
		);
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$selectedCount = 0;
			foreach ($selections as $selection) {
				if (!empty($_POST[$selection])) {
					$selectedCount++;
				}
			}
			if ($selectedCount >= 3) {
				echo "Form submitted successfully!";
				exit;
			}
			else {
				echo "Please select at least 3 selections.";
			}
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php foreach ($selections as $selection) { ?>
			<label><input type="checkbox" name="<?php echo $selection;?>" value="<?php echo $selection;?>"><?php echo $selection;?></label><br>
		<?php } ?>
		<input type="submit" value="Submit">
	</form>
</body>
</html>