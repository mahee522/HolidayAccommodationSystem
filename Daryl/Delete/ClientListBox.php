<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Fill in the select box to select a client and gather information to fill in the fields on the page -->

<?php
include "../db.inc.php";
echo '<select name="list" id="list" onclick="populateClient()">';

    while($row = mysql_fetch_array($result)){
		$id = $row['ClientID'];
		$name = $row['FirstName'];
		$lname = $row['LastName'];
		$address1 = $row['AddressLine1'];
		$address2 = $row['AddressLine2'];
		$address3 = $row['AddressLine3'];
		$county = $row['County'];
		$country = $row['Country'];
		$phone = $row['Phone'];
		$mobile = $row['Mobile'];
		$email = $row['Email'];
		$owed = $row['AmountOwed'];
	
		$alltext = "$id*$name*$lname*$address1*$address2*$address3*$county*$country*$phone*$email*$mobile*$owed";
		echo "<option class='option1' value ='$alltext'>$name $lname</option>";
    }
    echo "</select>";
	?>