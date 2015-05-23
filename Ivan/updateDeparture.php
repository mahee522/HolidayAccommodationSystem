<!--
  Created by Ivan on 13/03/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: update client booking status to departed, set that accommodation must be maintain, availability update to yes

 -->

<?php session_start();
include "../db.inc.php";// database connection
$id = $_POST['bookingID'];


$sql = "UPDATE Booking
                INNER JOIN Accommodation ON Accommodation.AccommodationID = Booking.AccommodationID

				SET BookingStatus = 'Departed' , Accommodation.Maintenance = '1' , Avialability = '1'

				WHERE BookingID =". $id;
if(!$result = mysql_query($sql, $con)){
        die ('Error in querying the database' . mysql_error());
}
else{
    if($_POST['owed'] > 0){
        $_SESSION['name'] = $_POST['name'] . " " . $_POST['lstName'];
        $_SESSION['owed'] = $_POST['owed'];
    }
    else{
        unset($_SESSION['owed']);
        unset($_SESSION['name']);

    }
    header("Location: ClientDeparture.php");
}


?>