<?php
/*
	Name: DeleteAnAccommodation.php
	Purpose: Updates database and marks for deletion the accommodation submitted in DeleteAccommodation.php form
	Author: Jason O'Neill March '15
*/
	include '../db.inc.php';	//Connection to database
	
	$sql = "UPDATE Accommodation SET MarkForDeletion = 1
			WHERE AccommodationID = '$_POST[accId]' AND Availability = 1";	//Only accommodation's without a booking can be deleted
	
	if(!mysql_query($sql,$con))		//Run query on database
	{
		die ( 'Error  in SQL Query ' . mysql_error() );	//Error in querying the database
	}
	else	//Sql statement executed correctly, show confirmation to user
	{
		echo '<p style="color: yellow; text-align: center; font-size: 30px;">Accommodation ID: ' .$_POST['accId'] .' has been deleted' .'</p>';
	}
	
	mysql_close($con);
?>
<form action = "DeleteAccommodation.php" method="POST" background="grey" id="jasonConfirmation">
<link rel="stylesheet" type="text/css" href="../css/holiday.css" />
<br>
<div align="center">
	<input type="submit" value="Return to previous page" id="jasonInput" name="jasonInput"/>
</div>
</form>