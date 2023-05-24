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

$getElectionID = $conn->prepare("SELECT election_id FROM Candidates WHERE candidate_id = :candidate_id");
$getElectionID->execute([
	"candidate_id" => $_SESSION["user_id"]
	]);

$electionID = $getElectionID->fetchAll()[0]["election_id"];


$query = $conn->prepare("INSERT INTO Votes (election_id, user_id, vote, timestamp) VALUES (:election_id, :user_id, :vote, :timestamp)");
$query->execute([
	"election_id" => $electionID,
	"user_id" => $_SESSION["user_id"],
	"vote" => $_POST["vote"],
	"timestamp" => date("Y-m-d H:i:s")
    ]);

header("location: ../controllers/redirect.php");

?>