<?php
/*
	Name: amendViewAccommodation.php
	Purpose: Stores changes made to an accommodation in the AmendAccommodation.php in the database
	Author: Jason O'Neill March '15
*/

	include '../db.inc.php';	//Connection to database
	
	if('$_POST[rentalCat]' == 'A')
	{
		$rentCat = 1;
	}
	else if('$_POST[rentalCat]' == 'B')
	{
		$rentCat = 2;
	}
	else if('$_POST[rentalCat]' == 'C')
	{
		$rentCat = 3;
	}
	else
	{
		$rentCat = "";
	}

	//Get details from input form and put them into an SQL statement
	$sql = "UPDATE Accommodation SET Description = '$_POST[description]', NoOfAdults = '$_POST[adults]',
		NoOfChildren = '$_POST[children]', ConditionOf = '$_POST[condition]', SpecialFeatures = '$_POST[features]',
		Location = '$_POST[accLocation]', AccTypeID = '$rentCat' WHERE AccommodationID = '$_POST[accId]' ";

	if(! mysql_query($sql,$con))	//Error in SQL query
	{
		echo "Error ".mysql_error();
	}
	else	//Sql statement executed correctly, show confirmation to user
	{
		echo '<p style="color: yellow; text-align: center; font-size: 30px;">Accommodation ID: ' .$_POST['accId'] .'</p>';
	}
	
	mysql_close($con);
?>
<form action = "AmendAccommodation.php" method="POST" background="grey" id="jasonConfirmation">
<link rel="stylesheet" type="text/css" href="../css/holiday.css" />
<br>
<div align="center">
	<h1 id="jasonH1">Accommodation changes have been saved in the database for the above ID.<h1>
	<input type="submit" value="Return to amend page" id="jasonInput" name="jasonInput"/>
</div>
</form>