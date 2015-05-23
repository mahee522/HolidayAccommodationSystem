<?php
/*
	Name: accomToday.php
	Purpose: Produces report for AccommodationReadyToday.php on the accommodations which need to be ready for today
	Author: Jason O'Neill March '15
*/
	include '../db.inc.php';	//Open connection to database		

	date_default_timezone_set("Europe/Dublin"); // set timezone
	$todaysDate = date("Y-m-d");	//Today's date in the same format as in database

	//Select all accommodation's from booking table that match todays date
	$sql = "Select * FROM Booking
			INNER JOIN Accommodation ON Booking.AccommodationID = Accommodation.AccommodationID
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			INNER JOIN Client ON Booking.ClientID = Client.ClientID
			WHERE ExpectedArrival = '$todaysDate'";		
			
	if(!$result = mysql_query($sql,$con))		//Test query on database
	{
		die ( 'Error  in querying the database ' . mysql_error() );	//Error in querying the database
	}

	$result = mysql_query($sql);

	echo "<table id='accommodationTable'>
			<tr><th>Type</th><th>Accommodation ID</th><th>Location</th><th>Client Name(booked)</th></tr>";	//Table headers
	
	while($row = mysql_fetch_array($result))	//Fill table rows with accommodation's from database
		{
			//Fill table with data
			echo "<tr align='center'>
			<td>".$row['TypeName']."</td>
			<td>".$row['AccommodationID']."</td>
			<td>".$row['Location']."</td>
			<td>".$row['FirstName']. " " . $row['LastName'] ."</td></tr>";
		}
		echo "</table>";
	mysql_close($con);
?>
</table>
</form>