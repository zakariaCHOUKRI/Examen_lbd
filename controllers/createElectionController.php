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

$query = $conn->prepare("INSERT INTO Elections (title, description, start_date, end_date) VALUES (:title, :description, :start_date, :end_date)");
$query->execute([
    "title" => $_POST['title'],
    "description" => $_POST['description'],
    "start_date" => $_POST['start_date'],
    "end_date" => $_POST['end_date']
    ]);

header("location: ../controllers/redirect.php");

?>