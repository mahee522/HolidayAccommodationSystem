<?php session_start();
    if(!isset($_SESSION['login'])){
        header("Location: ../../login.php");
    }
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="../../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../../css/holiday.css" rel="stylesheet" type="text/css">
    <link href="../../css/MakeBooking.css" rel="stylesheet" type="text/css">
    <script src="../../frameworks/jquery-2.1.1.js"></script>
    <script src="../../frameworks/blur.js"></script>
    <script src="../../frameworks/jquery-ui.js"></script>
    <script src="../../js/realtimeClock.js"></script>
	<script src="MakeBooking.js"></script>
    <title>Holiday Accommodation System</title>
</head>
<body onload="startTime()">
<div id="wrapper">
    <div id="site">
        <div id="menuSection">
            <div id="logoSection">
                <a href="../../index.html"><img id="logo" src="../../images/earth54.png"></a>
            </div>
            <div id="menuList">
                <ul id="menu">
                    <a href="../../Ivan/ClientArrival.php"><li><img class="icons" src="../../Icons/arrival.png"> Client Arrival</li></a>
                    <a href="../../Ivan/ClientDeparture.php"><li><img class="icons" src="../../Icons/departure.png"> Client Departure </li></a>
                    <a href="../../acceptPayment.php"><li><img class="icons" src="../../Icons/payment.png"> Accept Payment</li></a>
                    <li>
                        <img class="icons" src="../../Icons/booking.png"> Bookings
                        <ul>
                           <a href="MakeBooking.php"><li>Make Booking</li></a>
                            <a href="../../Ivan/CancelBooking.php"><li>Cancel Booking</li></a>
                            <a href="../../AmendBooking.php"><li>Amend/View Booking</li></a>
                        </ul>
                    </li>
                    <li>
                        <img class="icons" src="../../Icons/employee.png"> Employee
                        <ul>
                            <a href="../../AllocateEmployeeDuties.php"><li>Allocate Employee Duties</li></a>
                            <a href="../../SignOffEmployeeDuties.php"><li>Sign Off Employee Duties</li></a>
                            <a href="../../AddNewEmployee.php"><li>Add New Employee</li></a>
                            <a href="../../DeleteEmployee.php"><li>Delete Employee</li></a>
                            <a href="../../AmendEmployee.php"><li>Amend/View Employee</li></a>
                        </ul>
                    </li>
                    <li>
                        <img class="icons" src="../../Icons/maintanence.png"> File Maintenance
                        <ul>
                            <a href="../Add/AddNewClient.php"><li>Add New Client</li></a>
                            <a href="../Delete/DeleteClient.php"><li>Delete Client</li></a>
                            <a href="../Amend/AmendClient.php"><li>Amend/View Client</li></a>
                            <a href="../../Jason/AddAccommodation.php"><li>Add New Accommodation</li></a>
                            <a href="../../Jason/DeleteAccommodation.php"><li>Delete Accommodation</li></a>
                            <a href="../../Jason/AmendAccommodation.php"><li>Amend/View Accommodation</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../../Icons/reports.png"> Reports
                        <ul>
                            <a href="../../ClientReport.php"><li>Client Report</li></a>
                            <a href="../../Ivan/AccommodationTypeReport.php"><li>Accommodation Type Report</li></a>
                            <a href="../../Ivan/RentalReport.php"><li>Rental Report</li></a>
                            <a href="../../Jason/AccommodationReadyReport.php"><li>Accommodation To Be Ready Today Report</li></a>
							<a href="../Query/AvailabilityQuery.php"><li>Availability Report</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../../Icons/setup.png"> Set Up
                        <ul>
                            <a href="../../Jason/AddAccommodationType.php"><li>Add Accommodation Type</li></a>
                           <a href="../../DeleteAccommodationType.php"><li>Delete Accommodation Type</li></a>
                            <a href="../../AddRentalCategory.php"><li>Add New Rental Category</li></a>
                            <a href="../../DeleteRentalCategory.php"><li>Delete Rental Category</li></a>
                            <a href="../../AmendRentalCategory.php"><li>Amend/View Rental Category</li></a>
                        </ul>
                    </li>
					<a href="#"><li><img class="icons" src="../../Icons/info.png"> Info </li></a>
                    <a href="#"><li><img class="icons" src="../../Icons/logout.png"> Log Out </li></a>
                </ul>
            </div>
        </div>
        <div id="mainSection">
            <div id="header">
                <h2 id="headerText">Holiday Accommodation System</h2>
                <div id="LocationTimeSection">
                    <div id="location">Make Booking</div>
                    <div id="time"></div>
                </div>
            </div>
            <div id="content">
                 <form id="MBookingForm" name="MBookingForm" action="BookingMake.php">
                    <div id="inputs">

                        <div id="leftSide">
                            <label>Select Client:</Label>
							<?php include "ClientList.php" ?><br><br>
							<input type="number" style="display:none" name="ClientId" id="ClientId"><br>
                            <label>Address Line 1:</label>
                            <input type="text" name="address1" id="address1" disabled>
                            <br><br>
                            <label>Address Line 2:</label>
                            <input type="text" name="address2" id="address2" disabled>
                            <br><br>
                            <label>Address Line 3:</label>
                            <input type="text" name="address3" id="address3" disabled>
                            <br><br>
							<label>Country:</label>
                            <input type="text" name="Country" id="Country" disabled>							
                        </div>
                        <div id="middle">
                             <label>Phone Number:</label>
                            <input type="text" name="phone" id="phone" disabled>
                            <br><br>
                            <label>Mobile:</label>
                            <input type="text" name="Mobile" id="Mobile" disabled>
                            <br><br>
                            <label>Email:</label>
							<input type="email" name="Email" id="Email" disabled>
							<br><br>
							<input type="text" name="emp" style="display:none" id="emp" value="<?php echo $_SESSION['ID']; ?>">
							<label>Accommodation</label><br>
							<?php include "AccommTypeList.php"; ?>
							<input type="number" style="display:none" id="acId" name="acId"><br>
							<label>Standard Cost</label>
							<input class="input1" type="number" name="cost" id="cost" disabled>
                        </div>
						<div id="rightSide">
						<br/>
							<label>Arrival Date</label>
							<input class="input4" type="date" name="arrivalDate" id="arrivalDate" pattern="\d{1,2}/\d{1,2}/\d{4}" required>
							<br><br>
							<label>Duration of Stay(weeks)</label>
							<input class="input3" type="number" name="duration" id="duration" pattern="[1-9]" required>
							<br><br>
							<label>No. of Children</label>
							<input class="input3" type="number" name="noOfChildren" id="noOfChildren" disabled>
							<br><br>
							<label>No. of Adults</label>
							<input class="input3" type="number" name="noOfAdults" id="noOfAdults" disabled>
							<input class="input1" style="display:none" type="number" name="TCost" id="TCost">
						</div>
                    </div>
                    <div id="buttons">                                              
                        <button type="reset" class="clear" onclick="startTime()">Clear</button>
						<button type="button" class="submit" onclick="checkBook()">Confirm</button> 
                    </div>
                </form>
            </div>

        </div>
        <div id="clear"></div>
        <div id="footer">
            <h3>All Rights Reserved © || Jason / Daryl / Ivan</h3>
        </div>

    </div>
</div>
    <script>
        $('#site').blurjs({
            source: 'body',
            radius: 40,                             //Blur Radius
            overlay: 'rgba(0, 0, 0, .2)' 	//Overlay Color, follow CSS3's rgba() syntax
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-59764083-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>