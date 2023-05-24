<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


  if (!isset($_SESSION) || $_SESSION["is_admin"] != 0) {
    include_once '../controllers/redirect.php';
  }
?>

<link rel="stylesheet" href="../assets/vote_style.css">
<?php include './head.html' ?>
<title>Insights</title>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <div class="container px-5">
                <a class="navbar-brand" href="../controllers/redirect.php">UM6P-Elections (student dashboard)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../controllers/redirect.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../controllers/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Running candidates</h3>
                        <p>Below are all the elections and their respective candidates.</p>
                        <?php
                          
                        include_once '../models/Queries.php';

                        $electionsJoinCandidates = fetchElections();
                        foreach ($electionsJoinCandidates as $election => $info) {
                            echo "<ul>";
                            echo "<li>" . $info['title'] . "</li><ul>";
                            foreach (fetchCandidatesFromElection($info['election_id']) as $candidate) {
                                if (count($candidate)) {
                                    echo "<li>" . $candidate['name'] . ": " . getVotesCount($candidate["candidate_id"]) . " votes.</li>";
                                }
                            }
                            echo "</ul></ul>";
                        }
                          
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<style>

  * {
    color: white;
  }

  body {
    overflow-y: scroll;
  }

</style>
