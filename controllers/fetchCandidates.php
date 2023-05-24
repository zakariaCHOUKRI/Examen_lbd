<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
?>

<?php

include_once '../dbconfig.php';

$query = $conn->prepare("SELECT * FROM Candidates");
$query->execute([]);
$fetchedCandidates = $query->fetchAll();

?>