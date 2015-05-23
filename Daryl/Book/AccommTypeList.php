<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Gather Accommodation for the Form Fields in the MakeBooking Page-->
<?php
include "../db.inc.php";

$sql = "SELECT *  
		FROM Accommodation 
		INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
		INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
		WHERE Accommodation.Availability = '1'";
		
if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}

include "AccommBox.php";
mysql_close();
?>