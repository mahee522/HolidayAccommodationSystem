<!--
  Created by Ivan on 13/02/15.
  Student #  - c00185055
  Course: Software Development


  Purpose: makes query to mysql database in order to retrieve all information about clients where booking is not canceled
  is today, booking status is not set
 -->

<?php
include "../db.inc.php";
date_default_timezone_set("Europe/Dublin"); // set timezone
$today = date("Y-m-d");



$sql = "SELECT *  FROM Client
			INNER JOIN Booking ON Client.ClientID = Booking.ClientID
			INNER JOIN Accommodation ON Booking.AccommodationID = Accommodation.AccommodationID
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			WHERE ExpectedArrival = '$today' AND Booking.CancelStatus = '0' AND Booking.BookingStatus = ''
			ORDER BY Booking.ClientID";

//  catching possible the sql query error
if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}

include "listBoxClientArrival&Departure.php";
mysql_close();