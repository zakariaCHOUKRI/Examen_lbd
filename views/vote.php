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
<title>Vote</title>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <h3>Vote Today</h3>
                        <p>Fill in the data below.</p>
                        <form action="../controllers/voteController.php" method="POST">

                            <div class="col-md-12">
                               <input class="form-control" type="number" name="student_id" placeholder="Student ID" required>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Username" required>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" required>
                                      <option selected disabled value="">Choose who to vote for</option>
                                      <option value="0">Zakaria CHOUKRI</option>
                                      <option value="1">CHOUKRI Zakaria</option>
                                      <option value="2">Ziko CH</option>
                               </select>
                           </div>


                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                           </div><br>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                        </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
