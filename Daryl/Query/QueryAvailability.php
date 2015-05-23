<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Get the information from the database and create a table with the information-->
<?php
include "../db.inc.php";

$sql = "SELECT * FROM Accommodation
		INNER JOIN AccommodationType ON Accommodation.AccTypeID = AccommodationType.AccommodationTypeID 
		INNER JOIN RentalCategory ON AccommodationType.RentalCategoryID = RentalCategory.RentalCategoryID
		WHERE Accommodation.Availability = '1' AND Accommodation.MarkForDeletion = '0' 
		ORDER BY Accommodation.AccommodationID";

?>

<form action="" method="">
    <table id="availTable">
        <tr class="head">
            <th> Acc ID </th>
            <th> No. Of Adults </th>
            <th> No. Of Children </th>
            <th> Condition </th>
            <th> Description </th>
            <th> Special Features </th>
			<th> Location </th>
			<th> Patio</th>
			<th> Price</th>
			<th> Type </th>
        </tr>

        <tbody class="list">
        <?php
        if(!$result = mysql_query($sql, $con)){
            die ('Could not query database' . mysql_error());
        }
        while($rows = mysql_fetch_array($result))
        {
            ?>
            <tr class="row">
                <td class="num"><?php echo $rows['AccommodationID']; ?></td>
				<td class="num"><?php echo $rows['NoOfAdults']; ?></td>
				<td class="num"><?php echo $rows['NoOfChildren']; ?></td>
                <td class="text"><?php echo $rows['ConditionOf']; ?></td>
                <td class="text"><?php echo $rows['Description']; ?></td>
                <td class="text"><?php echo $rows['SpecialFeatures']; ?></td>
                <td class="text"><?php echo $rows['Location']; ?></td>
				<td class="num"><?php echo $rows['Patio']; ?></td>
				<td class="num"><?php echo $rows['StandardCost']; ?></td>
				<td class="text"><?php echo $rows['TypeName']; ?></td>
            </tr>
        <?php
        }

        ?>
        </tbody>
    </table>