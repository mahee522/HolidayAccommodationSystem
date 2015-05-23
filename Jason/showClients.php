<?php
/*
	Name: showClients.php
	Purpose: Outputs a list of all clients in the database to the acceptPayment.php file
	Author: Jason O'Neill March '15
*/
	include '../db.inc.php';	//Open connection to database
	
	$sql = "Select * FROM Client
			INNER JOIN Booking ON Client.ClientID = Booking.ClientID";
			
	if(!$result = mysql_query($sql,$con))		//Test query on database
	{
		die ( 'Error  in querying the database ' . mysql_error() );	//Error in querying the database
	}
	
	echo "<select name='listbox' id='listbox' onclick='populate();'>";;
	
	while($row = mysql_fetch_array($result))
	{		
		$Name = $row['FirstName'] . " " . $row['LastName'];			//Set Client name
		$address = $row['AddressLine1'] . ", " . $row['County'] . ", " . $row['Country'];
		$date = $row['ExpectedArrival'];
		$duration = $row['Duration'];
		$cost = $row['Cost'];
		$bookingId = $row['BookingID'];		//BookingID retrieved from Booking table
		$allText = "$Name; $address; $date; $duration; $cost; $bookingId";
		echo "<option value = '$allText'>$Name</option>";		//Print name as option, keep ID as a value
	}
	
	echo "</select>";
	mysql_close($con);
?>