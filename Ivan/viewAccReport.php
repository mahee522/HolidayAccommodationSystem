
<!--
  Created by Ivan on 18/03/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Produce table of all accommodations that are not deleted in Accommodation Type order by default but
  	by clicking on the Popular Accommodation button present details in descending order of Cumulative Rentals

 -->
<?php
include '../db.inc.php';
?>

    <form action = "" method = "post" name = "reportForm" >
        <input type = "hidden" name = "choice">
    </form>

    <script>
        function accOrder(){
            document.reportForm.choice.value = "POP";
            document.reportForm.submit();
        }

        function cumulativeOrder(){
            document.reportForm.choice.value = "TYPE";
            document.reportForm.submit();
        }
    </script>

<?php

$choice = "TYPE";

if(isset($_POST['choice'])){
    $choice = $_POST['choice'];
}

if($choice == "POP"){
    ?>
    <script>
        document.getElementById("accOrderBtn").style.display = "inline";
        document.getElementById("popAccBtn").style.display = "none";

    </script>
<?php
    $sql = "SELECT *  FROM Accommodation
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
			WHERE Accommodation.MarkForDeletion = 0 AND AccommodationType.MarkForDeletion = '0'
			ORDER BY CumulativeRental DESC ";

produceReport($sql);

}
else{

?>
    <script>
        document.getElementById("accOrderBtn").style.display = "none";
        document.getElementById("popAccBtn").style.display = "inline";
    </script>
    <?php
    $sql = "SELECT *  FROM Accommodation
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
			WHERE Accommodation.MarkForDeletion = 0 AND AccommodationType.MarkForDeletion = '0'
			ORDER BY AccommodationType.TypeName, Accommodation.AccommodationID";
    produceReport($sql);
};

function produceReport($sql){
    $result = mysql_query($sql);

    echo "<div class='reportSection'>
	<table id='accTable'>
	<tr><th>Type</th><th>Accommodation ID</th><th >Location</th><th >Rental Category</th><th >Cumulative Rentals</th>
	<th >Cost per Week</th></tr><tbody class='list'>";

    while ($row = mysql_fetch_array($result)){
        echo "<tr class='row'>
		<td class='type'>" .$row['TypeName']."</td>
		<td class='accID'>" .$row['AccommodationID']."</td>
		<td class='location'>" .$row['Location'] . "</td>
		<td class='category'>" .$row['CategoryName'] . "</td>
		<td class='cumulativeRentals'>" .$row['CumulativeRental'] . "</td>
		<td class='cost'>" .$row['StandardCost'] . "</td>";
    }
    echo "</tbody></table></div>";


}

mysql_close($con);
?>