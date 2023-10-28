<?php
include_once('db_con.php');

$db_connection = new DB_mgmt('localhost', 'root', '', 'editorial');
$db_connection->get_users();
$user_data = $db_connection->get_user_data('tdascal');

$title = "Proiect pentru Proiectare WEB";
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
            if($user_data != 0) {
                foreach($user_data as $key => $value) {
                    echo "<li>{$key} => {$value}</li>";
                }
            } else {
                echo "User not found";
            }
?>
	</ul>
</body>
</html>
