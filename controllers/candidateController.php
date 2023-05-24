<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


  if (!isset($_SESSION) || $_SESSION["is_admin"] != 0) {
    include_once '../controllers/redirect.php';
  }

?>

<?php

include_once '../dbconfig.php';

$query = $conn->prepare("INSERT INTO Candidates (candidate_id, election_id, name, photo) VALUES (:candidate_id, :election_id, :name, :photo)");
$query->execute([
    "candidate_id" => $_SESSION["user_id"],
    "election_id" => $_POST['election_id'],
    "name" => $_POST['name'],
    "photo" => $_POST['photo']
    ]);

header("location: ../controllers/redirect.php");

?>