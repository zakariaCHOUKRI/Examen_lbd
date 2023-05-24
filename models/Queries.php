<?php

if(!isset($_SESSION))
{
    session_start();
}

include_once '../dbconfig.php';

function fetchElections() {
    global $conn;
    $query = $conn->prepare("SELECT * FROM Elections");
    $query->execute([]);
    return $query->fetchAll();
}

function fetchCandidatesFromElection($election_id) {
    global $conn;
    $query = $conn->prepare("SELECT * FROM Candidates WHERE election_id = :election_id");
    $query->execute(['election_id' => $election_id]);
    return $query->fetchAll();
}

function getVotesCount($candidate_id) {
    global $conn;
    $query = $conn->prepare("SELECT COUNT(*) FROM Votes WHERE vote = :candidate_id");
    $query->execute(['candidate_id' => $candidate_id]);
    return $query->fetchAll()[0][0];
}

function checkIfCandidate($user_id) {
    global $conn;
    $query = $conn->prepare("SELECT COUNT(*) FROM Candidates JOIN Elections ON Candidates.election_id = Elections.election_id WHERE Candidates.user_id = :user_id ");
    $query->execute(['user_id' => $user_id]);
    return $query->fetchAll()[0][0];
}

?>