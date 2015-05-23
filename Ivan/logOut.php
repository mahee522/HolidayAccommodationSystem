<!--
  Created by Ivan on 1/03/15.
  Student #  - c00185055
  Course: Software Development


  Purpose: to unset session variable that corresponds to successful login -> redirect to login screen
 -->


<?php session_start();

unset($_SESSION['login']);
header("Location: ../login.php");
