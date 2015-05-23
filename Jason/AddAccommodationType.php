<?php
	/*
	Name: AddAccommodationType.php
	Purpose: Outputs a listbox to AddAccommodation.php form displaying all Accommodation Types on the system
	Author: Jason O'Neill March '15
	*/

	include '../db.inc.php';	//Open connection to database
	
	$sql = "Select TypeName, AccommodationTypeID FROM AccommodationType";		//Query to get Accommodation Types from AccommodationType table
	
	if(!$result = mysql_query($sql,$con))		//Test query on database
	{
		die ( 'Error  in querying the database' . mysql_error() );	//Error in querying the database
	}
	
	echo "<select name='listbox' id='listbox' onclick='getAccIdNum();'>";	//When listbox is clicked, get its corresponding accommodation ID
	
	while($row = mysql_fetch_array($result))
	{
		$AccName = $row['TypeName'];			//Set accommodation name
		$accID = $row['AccommodationTypeID'];	//Set accommodation ID

		echo "<option value ='$accID'>$AccName</option>";		//Print name as option, keep ID as a value
	}
	
	echo "</select>";
	mysql_close($con);
?>