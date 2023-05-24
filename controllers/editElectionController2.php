<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


  if (!isset($_SESSION) || $_SESSION["is_admin"] != 1) {
    include_once '../controllers/redirect.php';
  }
?>

<?php

include_once '../dbconfig.php';

$query = $conn->prepare("UPDATE Elections SET title = :title, description = :description, start_date = :start_date, end_date = :end_date WHERE election_id = :election_id");
$query->execute([
"title" => $_POST['title'],
"description" => $_POST['description'],
"start_date" => $_POST['start_date'],
"end_date" => $_POST['end_date'],
"election_id" => $_SESSION['election_id']
]);


header("location: ../controllers/redirect.php");

?>