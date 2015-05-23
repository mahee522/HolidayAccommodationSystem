<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Gather And Pass Information From The MakeBooking Page to The Database-->
<?php
include "../db.inc.php";
 
$column = "SELECT BookingID FROM Booking" ;
$result = mysql_query($column);

$var = array(); 
while ($row = mysql_fetch_array($result)) {
  $var[] = $row['BookingID'];
}
 $id = (MAX($var) + 1);
 $date = $_REQUEST['arrivalDate'];
 $duration = $_REQUEST['duration'];
 $CID = $_REQUEST['ClientId'];
 $accID = $_REQUEST['list'];
 $empID = $_REQUEST['emp'];
 $cost =  $_REQUEST['TCost'];
 $amount = "SELECT AmountOwed FROM Client WHERE ClientID = $CID" ;
 $owed = mysql_query($amount);
 $total = $owed+$cost;
 
$sql ="INSERT INTO `Booking`(`BookingID`, `ExpectedArrival`, `Duration`, `ClientID`, `AccommodationID`, `EmployeeID`, `Cost`) VALUES ('$id', '$date', '$duration', '$CID', '$accID', '$empID', '$cost')";

$retval = mysql_query( $sql,$con );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$cli ="UPDATE Client
		SET AmountOwed = $total
		WHERE ClientID = $CID";
$retval = mysql_query( $cli,$con );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($con);
header("Location: MakeBooking.php"); 

exit;
?>