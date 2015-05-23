<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Fill in the select box to select a accommodation and gather information to fill in the fields on the page -->

<?php
include "../db.inc.php";
echo '<select name="acclist" id="acclist" onclick="fillIn()">';

    while($row = mysql_fetch_array($result)){
		$name = $row['TypeName'];
		$loc = $row['Location'] ;
		$id = $row['AccommodationID'];
		$cost = $row['StandardCost'];
		$child = $row['NoOfChildren'];
		$adult = $row['NoOfAdults'];
	
		$acc = "$id*$cost*$child*$adult";
		echo "<option class='option1' value = '$acc'>$name |  $loc</option>";
    }
    echo "</select>";
?>