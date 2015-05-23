<!--
  Created by Ivan on 11/02/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Update bookings status of client to "arrived"
 -->

<?php session_start();
include "../db.inc.php";// database connection

$id = $_POST['bookingID'];

// Query that updates booking status and availability fields for chosen client
$sql = " UPDATE Booking INNER JOIN Accommodation on Booking.AccommodationId = Accommodation.AccommodationID

				SET BookingStatus = 'Arrived' , Availability = '0'

				WHERE BookingID =". $id;

// if query is invalid -> die -> prints the error description
if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}
// else if client is owes money -> set session variable with client name and amount owed.
else{
    if($_POST['owed'] > 0){
        $_SESSION['name'] = $_POST['name'] . " " . $_POST['lstName'];
        $_SESSION['owed'] = $_POST['owed'];
    }
    else{
        unset($_SESSION['owed']);
        unset($_SESSION['name']);

    }
    header("Location: ClientArrival.php");
}

mysql_close($con);
?>