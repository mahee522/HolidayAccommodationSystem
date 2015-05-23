<!--
  Created by Ivan on 28/02/15.
  Student #  - c00185055
  Course: Software Development

  	Purpose: Listbox for Client Arrival and Client Departure screens
-->

<?php
echo '<select name="listbox" id="listbox" onclick="populate()">';

    while($row = mysql_fetch_array($result)){
    $id = $row['ClientID'];
    $fname = $row['FirstName'];
    $sname = $row['LastName'];
    $addr1 = $row['AddressLine1'];
    $addr2 = $row['AddressLine2'];
    $addr3 = $row['AddressLine3'];
    $county = $row['County'];
    $country = $row['Country'];
    $phone = $row['Phone'];
    $bid = $row['BookingID'];
    $acctype = $row['TypeName'];

    if($row['BookingStatus'] == ''){        // if booking status is not set -> client is not arrived yet (Client Arrival)
        $bookingStatus = "Not Arrived";
    }
    else{
        $bookingStatus = $row['BookingStatus']; // else booking status is set -> retrieve it   (Client Departure)
    }
    $accLocation = $row['Location'];
    $duration = $row['Duration'];
    if($row['AmountOwed'] == ''){
     $owed = 0;
    }else{
      $owed = $row['AmountOwed'];
    }
    $specialFeatures = $row['SpecialFeatures'];
    $alltext = "$id*$fname*$sname*$addr1*$addr2*$addr3*$county*$country*$phone*$bid*$acctype*$bookingStatus*$accLocation*$duration*$owed*$specialFeatures";
    echo "<option value = '$alltext'>$fname $sname  </option>";

    }
    echo "</select>";