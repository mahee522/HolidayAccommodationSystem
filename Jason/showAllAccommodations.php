<?php
/*
	Name: showAllAccommodations.php
	Purpose: Prints a listbox of all acccommodations on the system
	Author: Jason O'Neill March '15
*/
	include '../db.inc.php';	//Open connection to database
	
	//Get all Accommodation details from database
	$sql = "Select * FROM Accommodation
				INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
				INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
				WHERE Accommodation.MarkForDeletion = '0'";
	
	if(!$result = mysql_query($sql,$con))		//Test query on database
	{
		die ( 'Error  in querying the database' . mysql_error() );	//Error in querying the database
	}
	
	echo "<select name='listbox' id='listbox' onclick='populate();'>";	//Create listbox, populate function will fill in form fields
	
	//Save data from Accommodation table in listbox
	while($row = mysql_fetch_array($result))
	{
		$accomID = $row['AccommodationID'];
		$accomType = $row['TypeName'];	//TypeName retrieved from AccommodationType table
		$desc = $row['Description'];
		$adults = $row['NoOfAdults'];
		$children = $row['NoOfChildren'];
		$cond = $row['ConditionOf'];
		$feat = $row['SpecialFeatures'];
		$rental = $row['CategoryName'];	//CategoryName retrieved from RentalCategory name
		$location = $row['Location'];
		$allText = "$accomID; $accomType; $desc; $adults; $children; $cond; $feat; $rental; $location";
		echo "<option value = '$allText'>$accomID $location</option>";	//listbox will store everything but only show accommodation ID and location
	}
	
	echo "</select>";
	mysql_close($con);
?>