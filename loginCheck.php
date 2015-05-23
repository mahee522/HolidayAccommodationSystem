<!--
  Created by Ivan on 5/03/15.
  Student #  - c00185055
  Course: Software Development

    Purpose: Check login name and password entered by user with employee table in database
 -->
<?php
session_start();

include "db.inc.php";


$sql = "Select EmployeeID, FirstName, LastName,LoginName, Password From Employee WHERE Password =  '$_POST[password]' and LoginName = '$_POST[username]'";

if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database: ' . mysql_error());
}

// if query match record in employee table -> initialize session variables that stores Employee fullname and ID
while($row = mysql_fetch_array($result)) {

	$id = $row['EmployeeID'];
	$employee = $row['FirstName'];
	$employee1 = $row['LastName'];

    $_SESSION['login'] = $employee . $employee1;			//
    $_SESSION['ID'] = $id;
}

// if Session variable are set  -> redirect to first page
if(isset($_SESSION['login'])){
    echo $_SESSION['login'] . "<br>";
	header("Location: ../index.php");
}
// else print error message with option to try again
elseif (!isset($_SESSION['login'])){
    echo "You have entered wrong name or password<br>";
}
?>
<form action="login.php">
    <button type="submit">Try again?</button>
</form>


