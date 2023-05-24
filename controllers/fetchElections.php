<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
?>

<?php

include_once '../dbconfig.php';

$query = $conn->prepare("SELECT * FROM Elections");
$query->execute([]);
$fetchedElections = $query->fetchAll();

?>