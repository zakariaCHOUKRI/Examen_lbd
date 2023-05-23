<?php
	if(!isset($_SESSION))
	{
		session_start();
	}

    if (isset($_SESSION['is_admin'])) {
        if ($_SESSION['is_admin'] == 1) {
            header('Location: ../views/AdminPage.php');
        } else if ($_SESSION['is_admin'] == 0) {
            header('Location: ../views/StudentPage.php');
        }
    } else {
        header('Location: ../views/login_page.php');
    }

?>