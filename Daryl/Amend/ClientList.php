<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Gather Clients for the Form Fields in the Amend Page-->
<?php
include "../db.inc.php";

$sql = "SELECT *  
		FROM Client 
		WHERE MarkForDeletion = '0' ";

if(!$result = mysql_query($sql, $con)){
    die ('Error in querying the database' . mysql_error());
}

include "ClientListBox.php";
mysql_close();
?>