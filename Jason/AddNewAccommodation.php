<?php
	/*
	Name: AddNewAccommodation.php
	Purpose: Inputs data from AddAccommodation.php form into database
	Author: Jason O'Neill March '15
	*/
	include '../db.inc.php';	//Connection to database
	
	//Get details from input form
	$AccommodationType = $_POST['listbox'];
	$noOfAdults = $_POST['adults'];
	$noOfKids = $_POST['children'];
	$accommodationTypeID = $_POST['accId'];
	$_SESSION['accomId'] = $accommodationTypeID;

	if(!$result = mysql_query("SELECT MAX(AccommodationID) AS maxID FROM Accommodation"))	//maxID stores the highest AccommodationID
	{
		echo "Error in retrieving the Accommodation ID";	//Error in sql query
	}

	$row = mysql_fetch_array($result);
	$lastId = $row['maxID'];	//Last ID entered in table
	$nextId = $lastId + 1;		//Next id to enter
	
	if( ISSET($_POST['patio']) )	//Patio check box ticked
	{
		$accPatio = 1;
	}
	else	//Patio check box not ticked
	{
		$accPatio = 0;
	}
	
	$sql = "Insert into Accommodation (AccommodationID, Availability, NoOfAdults, NoOfChildren, ConditionOf, Description, SpecialFeatures, Location, Patio, AccTypeID) 
		VALUES ($nextId,'1',$noOfAdults,$noOfKids,'$_POST[condition]','$_POST[desc]','$_POST[features]','$_POST[accLocation]', $accPatio, $accommodationTypeID)";
	
	if(!mysql_query($sql,$con))		//Run query on database
	{
		die ( 'Error  in SQL Query ' . mysql_error() );	//Error in querying the database
	}
	
	mysql_close($con);
?>
<form action = "AddAccommodation.php" method="POST" background="grey" id="jasonConfirmation">
<link rel="stylesheet" type="text/css" href="../css/holiday.css" />
<br>
	<h1 align="Center" id="jasonH1">A New Accommodation has been added to the database.<h1>
	<input type="submit" value="Return to insert page" id="jasonInput" name="jasonInput"/>
</form>