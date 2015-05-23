<?php
/*
	Name: payment.php
	Purpose: Saves payment details from acceptPayment.php in the database
	Author: Jason O'Neill March '15
*/
	include '../db.inc.php';	//Open connection to database
	date_default_timezone_set("Europe/Dublin"); // set timezone
	$todaysDate = date("Y-m-d");	//Today's date in same format as in database
	
	//Get next PaymentID to put into database
	if(!$result = mysql_query("SELECT MAX(PaymentID) AS maxID FROM Payment"))	//maxID stores the highest PaymentID
	{
		echo "Error in retrieving the Payment ID";	//Error in sql query
	}

	$row = mysql_fetch_array($result);
	$payId = $row['maxID'] + 1;		//Next id to enter
	
	//Update Payment table
	$sql = "INSERT into Payment (PaymentID, Amount, TotalCost, Date, PaymentMethod)
			VALUES ($payId, '$_POST[amountPaid]','$_POST[holidayCost]','$todaysDate', '$_POST[paymentMethod]')";
	
	//Update BookingPayment table
	$sql2 = "INSERT into BookingPayment (BookingID, PaymentID, DATE) 
			VALUES ('$_POST[bookingid]', $payId, '$todaysDate')";
	
	if(!$result = mysql_query($sql2,$con))		//Test query 2 on database
	{
		die ( 'Error  in querying the database for BookingPayment table ' . mysql_error() );	//Error in querying the database
	}
	if(!$result = mysql_query($sql,$con))		//Test query 1 on database
	{
		die ( 'Error  in querying the database ' . mysql_error() );	//Error in querying the database
	}
	else	//Print confirmation of payment
	{
		echo '<p style="color: yellow; text-align: center; font-size: 30px;">Payment made!</p>';
	}
	mysql_close($con);
?>
<form action = "acceptPayment.php" method="POST" background="grey" id="jasonConfirmation">
<link rel="stylesheet" type="text/css" href="../css/holiday.css" />
<br>
<div align="center">
	<input type="submit" value="Return to payment page" id="jasonInput" name="jasonInput"/>
</div>
</form>