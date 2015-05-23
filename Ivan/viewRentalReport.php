<!--
  Created by Ivan on 13/02/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Produce Rental Report in reverse chronological order

 -->

<?php

date_default_timezone_set("Europe/Dublin");
include "../db.inc.php";

// Select all bookings that have not been deleted
$sql = "SELECT ExpectedArrival, FirstName, LastName, BookingStatus, TypeName, Duration, StandardCost  FROM Booking
			INNER JOIN Client ON Booking.ClientID = Client.ClientID
			INNER JOIN Accommodation ON Booking.AccommodationID = Accommodation.AccommodationID
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
			WHERE BookingStatus = 'Departed'
			ORDER BY ExpectedArrival DESC";
?>

<form action="" method="">
    <table id="accTable">
        <!-- Table Header -->
        <tr>
            <th>Date of Arrival</th>
            <th>Client Name</th>
            <th >Accommodation Type</th>
            <th >Duration of Stay</th>
            <th >Cost of Stay</th>
        </tr>
        <!-- Table body -->
        <tbody class="list">
        <?php
        if(!$result = mysql_query($sql, $con)){
            die ('Error in querying the database' . mysql_error());
        }
        while($rows = mysql_fetch_array($result)) // While array stores record information
        {
            ?>
            <tr class="row">
                <td class="date"><?php echo date("d/m/Y", strtotime($rows['ExpectedArrival'])); ?></td>
                <td class="name"><?php echo $rows['FirstName'] . ' ' . $rows['LastName']; ?></td>
                <td class="type"><?php echo $rows['TypeName']; ?></td>
                <td class="duration"><?php echo $rows['Duration']; ?></td>
                <td class="cost"><?php echo $rows['StandardCost'] * $rows['Duration']; ?></td>
            </tr>
        <?php
        }

        ?>
        </tbody>
    </table>