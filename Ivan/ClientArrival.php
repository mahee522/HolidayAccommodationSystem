<!--
  Created by Ivan on 13/02/15.
  Student #  - c00185055
  Course: Software Development


  Purpose: The main page that appears when in arrivals screen.
			 Displays a listbox of clients for today only.
			 By choosing a client from the list and clicking "confirm" -> booking status is changing
 -->

<?php session_start();
    if(!isset($_SESSION['login'])){
        header("Location: ../login.php");
    }
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/holiday.css" rel="stylesheet" type="text/css">
    <link href="../css/ClientArrival.css" rel="stylesheet" type="text/css">
    <script src="../frameworks/jquery-2.1.1.js"></script>  <!-- http://jquery.com -->
    <script src="../frameworks/blur.js"></script>          <!-- http://blurjs.com-->
    <script src="../frameworks/jquery-ui.js"></script>       <!-- http://jquery.com-->
    <script src="../js/realtimeClock.js"></script>
    <script src="../js/IvanFile.js"></script>
    <title>Holiday Accommodation System</title>
</head>
<body onload="amountOwedRedirect()">
<div id="wrapper">
    <div id="site" >
        <div id="menuSection">
            <div id="logoSection">
                <a href="../index.php"><img id="logo" src="../images/earth54.png"></a>
            </div>
            <div id="menuList">
                <ul id="menu">

                    <a href="ClientArrival.php"><li><img class="icons" src="../Icons/arrival.png"> Client Arrival</li></a>
                    <a href="ClientDeparture.php"><li><img class="icons" src="../Icons/departure.png"> Client Departure </li></a>
                    <a href="../Jason/acceptPayment.php"><li><img class="icons" src="../Icons/payment.png"> Accept Payment</li></a>
                    <li>
                        <img class="icons" src="../Icons/booking.png"> Bookings
                        <ul>
                            <a href="../Daryl/Book/MakeBooking.php""><li>Make Booking</li></a>
                            <a href="CancelBooking.php"><li>Cancel Booking</li></a>
                            <a href="AmendBooking.html" onclick="return notWorkingMenuSection()"><li>Amend/View Booking</li></a>
                        </ul>
                    </li>
                    <li>
                        <img class="icons" src="../Icons/employee.png"> Employee
                        <ul>
                            <a href="AllocateEmployeeDuties.html" onclick="return notWorkingMenuSection()"><li>Allocate Employee Duties</li></a>
                            <a href="SignOffEmployeeDuties.html" onclick="return notWorkingMenuSection()"><li>Sign Off Employee Duties</li></a>
                            <a href="AddNewEmployee.html" onclick="return notWorkingMenuSection()"><li>Add New Employee</li></a>
                            <a href="DeleteEmployee.html" onclick="return notWorkingMenuSection()"><li>Delete Employee</li></a>
                            <a href="AmendEmployee.html" onclick="return notWorkingMenuSection()"><li>Amend/View Employee</li></a>
                        </ul>
                    </li>
                    <li>
                        <img class="icons" src="../Icons/maintanence.png"> File Maintenance
                        <ul>
                            <a href="../Daryl/Add/AddNewClient.php"><li>Add New Client</li></a>
                            <a href="../Daryl/Delete/DeleteClient.php"><li>Delete Client</li></a>
                            <a href="../Daryl/Amend/AmendClient.php"><li>Amend/View Client</li></a>
                            <a href="../Jason\AddAccommodation.php"><li>Add New Accommodation</li></a>
                            <a href="../Jason\DeleteAccommodation.php"><li>Delete Accommodation</li></a>
                            <a href="../Jason/AmendAccommodation.php"><li>Amend/View Accommodation</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../Icons/reports.png"> Reports
                        <ul>
                            <a href="ClientReport.html" onclick="return notWorkingMenuSection()"><li>Client Report</li></a>
                            <a href="AccommodationTypeReport.php"><li>Accommodation Type Report</li></a>
                            <a href="RentalReport.php"><li>Rental Report</li></a>
                            <a href="../Jason/AccommodationsReadyToday.php"><li>Accommodation To Be Ready Today Report</li></a>
                            <a href="../Daryl/Query/AvailabilityQuery.php"><li>Availability Report</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../Icons/setup.png"> Set Up
                        <ul>
                            <a href="AddAccommodationType.html" onclick="return notWorkingMenuSection()"><li>Add Accommodation Type</li></a>
                            <a href="DeleteAccommodationType.html" onclick="return notWorkingMenuSection()"><li>Delete Accommodation Type</li></a>
                            <a href="AddRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Add New Rental Category</li></a>
                            <a href="DeleteRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Delete Rental Category</li></a>
                            <a href="AmendRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Amend/View Rental Category</li></a>
                        </ul>
                    </li>
                    <a href="#" onclick="return notWorkingMenuSection()"><li><img class="icons" src="../Icons/info.png"> Info </li></a>
                    <a href="logOut.php" onclick="return conformationFunction()"><li><img class="icons" src="../Icons/logout.png"> Log Out </li></a>
                </ul>
            </div>
        </div>
        <div id="mainSection">
            <div id="header">
                <h2 id="headerText">Holiday Accommodation System</h2>
                <div id="LocationTimeSection">
                    <div id="location">Client Arrival</div>
                    <div id="time"></div>
                </div>
            </div>
            <div id="content">
                 <form action="updateArrival.php" method="post">
                    <div id="inputs">
                        <div id="listBoxSection">
                            <label>Todays Arrival</label><br>
                            <?php include "arrivalQuery.php";?>
                            <br><br>
                            <label>Booking ID</label>
                            <input type="text" name="bookingID" id="bookingID" disabled>
                            <br>
                            <label>Booking Status</label><br>
                            <input type="text" name="bookingStatus" id="bookingStatus" disabled>
                        </div>
                        <div id="leftSide">
                            <label>Client ID</label>
                            <input type="text" name="clientID" id="clientID" disabled>
                            <br><br>
                            <label>First Name</label>
                            <input type="text" name="name" id="name" disabled>
                            <br><br>
                            <label>Last Name</label>
                            <input type="text" name="lstName" id="lstName" disabled>
                            <br><br>
                            <label>Phone Number</label>
                            <input type="tel" name="phone" id="phone" disabled>
                            <br><br>
                            <label>Full Address</label><br>
                            <textarea id="address" disabled> </textarea>
                        </div>
                        <div id="rightSided">
                            <label>Amount Owed</label>
                            <input type="text" name="owed" id="owed" disabled>
                            <br><br>
                            <label>Duration (Weeks) </label>
                            <input type="text" name="duration" id="duration" disabled>
                            <br><br>
                            <label>Acc Type </label>
                            <input type="text" name="accType" id="accType" disabled>
                            <br><br>
                            <label>Acc Location </label>
                            <input type="text" name="accLocation" id="accLocation" disabled>
                            <br><br>
                            <label>Special Features</label><br>
                            <textarea id="specialFeatures" disabled> </textarea>
                         </div>
                        <br><br><br>
                    </div>

                    <div id="buttons">
                        <button type="reset" class="clear">Clear</button>
                        <button type="submit" class="submit" onclick="return conformationBookingStatus()">Confirm Arrival</button>
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
    <script> // this script is used by BlurJS plugin for JQuery - > purpose is to blur the background on chosen element
        $('#site').blurjs({
            source: 'body',
            radius: 40,                             //Blur Radius
        });
    </script>
    <script>  // Google Analytics script -> using to keep track of all visits
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-59764083-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- 2 input fields that are used to keep client name and money owes in order to ask user
    if they want to pay now-->
    <input type="hidden" id="debtorName" value="<?php
    if(isset($_SESSION['owed'])){
        echo ($_SESSION['name']);
        unset($_SESSION['name']);
    }
    ?>">
    <input type="hidden" id="amountOwed" value="<?php
    if(isset($_SESSION['owed'])){
        echo ($_SESSION['owed']);
        unset($_SESSION['owed']);
    }
    ?>">
</body>
</html>