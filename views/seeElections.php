<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


  if (!isset($_SESSION) || $_SESSION["is_admin"] != 1) {
    include_once '../controllers/redirect.php';
  }
?>


<link rel="stylesheet" href="../assets/vote_style.css">
<?php include './head.html' ?>
<title>See existing election</title>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <div class="container px-5">
                <a class="navbar-brand" href="../controllers/redirect.php">UM6P-Elections (admin dashboard)</a>
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
                        <h3>Existing elections</h3>
                        <p>Below are all the active elections.</p>
                        <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">Election ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Start Date</th>
                              <th scope="col">End Date</th>
                            </tr>
                        </thead>
                        <?php
                          
                        include_once '../controllers/fetchElections.php';

                          
                        foreach ($fetchedElections as $election => $info) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<th scope='row'>" . $info['election_id'] . "</th>";
                            echo "<td>" . $info['title'] . "</td>";
                            echo "<td>" . $info['description'] . "</td>";
                            echo "<td>" . $info['start_date'] . "</td>";
                            echo "<td>" . $info['end_date'] . "</td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                          
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<style>

  * {
    color: white;
  }

</style>

