<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Gather And Pass Information From The AddNewClient Page to The Database-->
<?php
include "../db.inc.php";
 
$column = "SELECT ClientID FROM Client";
$result = mysql_query($column);

$var = array(); 
while ($row = mysql_fetch_array($result)) {
  $var[] = $row['ClientID'];
}
 $id = (MAX($var) + 1);
 $name = $_POST['firstName'];
 $lname = $_POST['lastName'];
 $address1 = $_POST['address1'];
 $address2 = $_POST['address2'];
 $address3 = $_POST['address3'];
 $county = $_POST['County'];
 $country = $_POST['Country'];
 $phone = $_POST['phone'];
 $email = $_POST['Email'];
 $mobile = $_POST['Mobile'];
 
 
$sql ="INSERT INTO `Client`(`ClientID`, `FirstName`, `LastName`, `AddressLine1`, `AddressLine2`, `AddressLine3`, `County`, `Country`, `Phone`, `MarkForDeletion`, `Email`, `Mobile`, `AmountOwed`) VALUES ('$id', '$name', '$lname', '$address1', '$address2', '$address3', '$county', '$country', '$phone', 'Null', '$email', '$mobile', 'Null')";

$retval = mysql_query( $sql,$con );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($con);
header("Location: AddNewClient.php"); 

exit;
?>