
<!--
  Created by Ivan on 13/03/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Produce table of all bookings that have not been deleted, where expected arrival is greater or equal today
  	date, and booking status is not set

 -->

<?php


include "../db.inc.php";
date_default_timezone_set("Europe/Dublin");
$today = date("Y-m-d");

$sql = "SELECT *  FROM Client
			INNER JOIN Booking ON Client.ClientID = Booking.ClientID
			INNER JOIN Accommodation ON Booking.AccommodationID = Accommodation.AccommodationID
			INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID
			WHERE ExpectedArrival >= '$today' AND Booking.CancelStatus = '0' AND Booking.BookingStatus = ''
			ORDER BY Booking.ClientID";
?>


<table id="bookingsTable">
    <tr>
        <th></th>
        <th>Expected Arrival</th>
        <th >Name</th>
        <th >Phone Number</th>
        <th >Duration (Weeks)</th>
        <th >Accommodation Type</th>
        <th >Accommodation Desc</th>
        <th >Address</th>
        <th >County</th>
        <th >Country</th>
    </tr>
    <tbody class="list">
    <?php
    //  catching possible the sql query error
    if(!$result = mysql_query($sql, $con)){
        die ('Error in querying the database' . mysql_error()); // Loop while the fetched array of SQL database is not empty
    }
    while($rows = mysql_fetch_array($result))
    {
        ?>
        <tr class="row">
            <!-- create array of radio button, array is used in order for them to work consistent -->
            <td><input name="radio[]" type="radio" class="radio" id="radio[]" value="<?php echo $rows['BookingID']; ?>"></td>
            <td class="arrival"><?php echo date("d/m/Y", strtotime($rows['ExpectedArrival'])); ?></td>
            <td class="fullname"><?php echo $rows['FirstName'] . " " . $rows['LastName'];; ?></td>
            <td class="phone"><?php echo $rows['Phone']; ?></td>
            <td class="duration"><?php echo $rows['Duration']; ?></td>
            <td class="acctype"><?php echo $rows['TypeName']; ?></td>
            <td class="accdesc"><?php echo $rows['Description']; ?></td>
            <td class="address"><?php echo $rows['AddressLine1'] . ", " . $rows['AddressLine2'] . ", " . $rows['AddressLine3'] ; ?></td>
            <td class="county"><?php echo $rows['County']; ?></td>
            <td class="county"> <?php echo $rows['Country']; ?></td>

        </tr>
    <?php
    }

    ?>
    </tbody>
</table>