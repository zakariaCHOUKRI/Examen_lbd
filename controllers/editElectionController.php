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

$election_idQuery = "SELECT * FROM Elections WHERE election_id = :election_id";
$election_idStatement = $conn->prepare($election_idQuery);
$election_idStatement->execute(['election_id' => $_POST['election_id']]);

if ($election_idStatement->rowCount() == 0) {
    header("location: ../views/editElection.php?state=1");
} else {
    $_SESSION["election_id"] = $_POST['election_id'];
    $_SESSION["election"] = $election_idStatement->fetchAll();
    header("location: ../views/editElection2.php");
}
?>