<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: Main File Displaying The Current Available Accommodations-->
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
    <link href="../../css/AvailabilityQuery.css" rel="stylesheet" type="text/css">
    <script src="../../frameworks/jquery-2.1.1.js"></script>
    <script src="../../frameworks/blur.js"></script>
    <script src="../../frameworks/jquery-ui.js"></script>
    <script src="../../js/realtimeClock.js"></script>
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
                           <a href="../Book/MakeBooking.php"><li>Make Booking</li></a>
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
							<a href="AvailabilityQuery.php"><li>Availability Report</li></a>
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
                    <a href="../../Ivan/logOut.php"><li><img class="icons" src="../../Icons/logout.png"> Log Out </li></a>
                </ul>
            </div>
        </div>
        <div id="mainSection">
            <div id="header">
                <h2 id="headerText">Holiday Accommodation System</h2>
                <div id="LocationTimeSection">
                    <div id="location">Accommodation Availability</div>
                    <div id="time"></div>
                </div>
            </div>
            <div id="content">
			<div class="query"
            <?php include "QueryAvailability.php";?>    
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