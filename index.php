<?php
	$title = "Proiect pentru Proiectare WEB";
	$authors = ["Ovidiu", "Ionut", "Tiberiu"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proiectare WEB</title>
</head>
<body>
	<h1><?php echo $title ?></h1>
	<ul>
		<?php
			foreach($authors as $author) {
				echo "<li> {$author} </li>";
			}
		?>
	</ul>
</body>
</html>
