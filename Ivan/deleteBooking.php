<!--
  Created by Ivan on 13/03/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Delete selected booking

 -->

<?php session_start();
include "../db.inc.php";// database connection

// Array of radio buttons will only consist of 1 element, therefore to access the value of this element position is always 0

$bookingID = $_POST['radio'][0];

$sql = "UPDATE Booking
        SET CancelStatus = 1
        WHERE BookingID ='$bookingID'";
//  catching possible the sql query error
if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}
// redirect back to previous screen
header("Location: CancelBooking.php");