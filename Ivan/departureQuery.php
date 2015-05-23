<!--
  Created by Ivan on 11/02/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Sets the SQL query for Client Departure to fetch all client that are
 -->

<?php
include "../db.inc.php";

// Query that selects all records from client, booking, accommodation, accommodation type table
// where booking status is "arrived"
$sql = "SELECT *  FROM Client
			INNER JOIN Booking ON Client.ClientID = Booking.ClientID
			INNER JOIN Accommodation ON Booking.AccommodationID = Accommodation.AccommodationID
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			WHERE Booking.BookingStatus = 'Arrived'
			ORDER BY Client.ClientID";
// if query is invalid -> die -> prints the error description
if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}

include "listBoxClientArrival&Departure.php";
mysql_close($con);