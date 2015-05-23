<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Gather And Pass Information From The AmendClient Page to The Database-->
<?php
include "../db.inc.php";
$column = "SELECT * FROM Client ";
$result = mysql_query($con,$column);

 $name = $_REQUEST['name'];
 $lname = $_REQUEST['lastName'];
 $address1 = $_REQUEST['address1'];
 $address2 = $_REQUEST['address2'];
 $address3 = $_REQUEST['address3'];
 $county = $_REQUEST['County'];
 $country = $_REQUEST['Country'];
 $phone = $_REQUEST['phone'];
 $email = $_REQUEST['Email'];
 $mobile = $_REQUEST['Mobile'];
 $amount = $_REQUEST['owed'];
 $ID = $_REQUEST['GetID'];
 
$sql = "UPDATE Client
		SET FirstName = '$name' ,LastName = '$lname' ,AddressLine1 = '$address1' 
		,AddressLine2 = '$address2' ,AddressLine3 = '$address3' ,County = '$county' 
		,Country = '$country' ,Phone = '$phone' ,Email = '$email' ,Mobile = '$mobile' 
		,AmountOwed = '$amount'
		WHERE ClientID = $ID";

$retval = mysql_query( $sql,$con );
if(! $retval )
{
  die('Could not Amend client: ' . mysql_error());
}

mysql_close($con);

header("Location: AmendClient.php"); 

exit;
?>