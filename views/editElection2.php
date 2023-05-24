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
<title>Edit existing election</title>

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
                        <h3>Edit an existing election</h3>
                        <p>Edit election information.</p>
                        <form action="../controllers/editElectionController2.php" method="POST">
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="title" placeholder="Election Title" value="<?php echo $_SESSION['election'][0]['title'] ?>" required>
                            </div><br>
                            
                            <label for="start_date">Start Date</label>
                            <div class="col-md-12">
                               <input class="form-control" type="date" name="start_date" placeholder="Start Date" value="<?php echo $_SESSION['election'][0]['start_date'] ?>" required>
                            </div><br>
                            
                            <label for="end_date">End Date</label>
                            <div class="col-md-12">
                               <input class="form-control" type="date" name="end_date" placeholder="End Date" value="<?php echo $_SESSION['election'][0]['end_date'] ?>" required>
                            </div><br><br>
                            
                            <div class="col-md-12">
                               <textarea class="form-control" name="description" placeholder="Election Description" value="<?php echo $_SESSION['election'][0]['description'] ?>" required></textarea>
                            </div>
                            
                            

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
