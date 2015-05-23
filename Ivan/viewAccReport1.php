
<!--
  Created by Ivan on 13/03/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Produce table of all accommodations that are not deleted in Accommodation Type order

 -->

<?php
include "../db.inc.php";

$sql = "SELECT *  FROM Accommodation
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
			WHERE Accommodation.MarkForDeletion = 0 AND AccommodationType.MarkForDeletion = '0'
			ORDER BY AccommodationType.TypeName, Accommodation.AccommodationID";
?>

<form action="" method="">
    <table id="accTable">
        <tr>
            <th>Type</th>
            <th>Accommodation ID</th>
            <th >Location</th>
            <th >Rental Category</th>
            <th >Cumulative Rentals</th>
            <th >Cost per Week</th>
        </tr>

        <tbody class="list">
        <?php
        //  catching possible the sql query error
        if(!$result = mysql_query($sql, $con)){
            die ('Error in querying the database' . mysql_error());
        }
        while($rows = mysql_fetch_array($result))  // Loop while the fetched array of SQL database is not empty
        {
            ?>
            <tr class="row">
                <td class="type"><?php echo $rows['TypeName']; ?></td>
                <td class="accID"><?php echo $rows['AccommodationID']; ?></td>
                <td class="location"><?php echo $rows['Location']; ?></td>
                <td class="category"><?php echo $rows['CategoryName']; ?></td>
                <td class="cumulativeRentals"><?php echo $rows['CumulativeRental']; ?></td>
                <td class="cost"><?php echo $rows['StandardCost']; ?></td>
            </tr>
        <?php
        }
        mysql_close($con);
        ?>
        </tbody>
    </table>