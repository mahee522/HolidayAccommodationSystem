<!--
	Name: AddAccommodation.php
	Purpose: Form where user can input details about a new Accommodation and save to database
	Author: Jason O'Neill March '15
-->
<?php session_start();		//Used for logging into system
    if(!isset($_SESSION['login'])){
        header("Location: ../login.php");
    }
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="../css/reset.css" rel="stylesheet" type="text/css">
    <link href="../css/holiday.css" rel="stylesheet" type="text/css">
    <link href="../css/AddAccommodation.css" rel="stylesheet" type="text/css">
    <script src="../frameworks/jquery-2.1.1.js"></script>
    <script src="../frameworks/blur.js"></script>
    <script src="../frameworks/jquery-ui.js"></script>
    <script src="../js/realtimeClock.js"></script>
	<script src="../js/IvanFile.js"></script>	<!--File used to deal with broken/empty links-->
    <title></title>
</head>
<body>
<div id="wrapper">
    <div id="site">
        <div id="menuSection">
            <div id="logoSection">
                <a href="../index.php"><img id="logo" src="../images/earth54.png"></a>	<!--Logo on top-left of screen-->
            </div>
            <div id="menuList">
                <ul id="menu">	<!--Side Menu for site-->
                    <a href="../Ivan/ClientArrival.php"><li><img class="icons" src="../Icons/arrival.png">Client Arrival</li></a>
                    <a href="../Ivan/ClientDeparture.php"><li><img class="icons" src="../Icons/departure.png"> Client Departure </li></a>
                    <li><img class="icons" src="../Icons/payment.png"> <a href="acceptPayment.php">Accept Payment</li></a>
                    <li>
                        <img class="icons" src="../Icons/booking.png"> Bookings
                        <ul>
                            <a href="../Daryl/Book/MakeBooking.php"><li>Make Booking</li></a>
                            <a href="../Ivan/CancelBooking.php"><li>Cancel Booking</li></a>
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
                            <a href="AddAccommodation.php"><li>Add New Accommodation</li></a>
                            <a href="DeleteAccommodation.php"><li>Delete Accommodation</li></a>
                            <a href="AmendAccommodation.php"><li>Amend/View Accommodation</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../Icons/reports.png"> Reports
                        <ul>
                            <a href="ClientReport.html"><li>Client Report</li></a>
                            <a href="../Ivan/AccommodationTypeReport.php"><li>Accommodation Type Report</li></a>
                            <a href="../Ivan/RentalReport.php"><li>Rental Report</li></a>
                            <a href="AccommodationsReadyToday.php"><li>Accommodation To Be Ready Today Report</li></a>
                            <a href="../Daryl/Query/AvailabilityQuery.php"><li>Availability Report</li></a>
                        </ul>
                    </li>
                    <li><img class="icons" src="../Icons/setup.png"> Set Up
                        <ul>
                            <a href="AddAccommodationType.php" onclick="return notWorkingMenuSection()"><li>Add Accommodation Type</li></a>
                            <a href="DeleteAccommodationType.html" onclick="return notWorkingMenuSection()"><li>Delete Accommodation Type</li></a>
                            <a href="AddRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Add New Rental Category</li></a>
                            <a href="DeleteRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Delete Rental Category</li></a>
                            <a href="AmendRentalCategory.html" onclick="return notWorkingMenuSection()"><li>Amend/View Rental Category</li></a>
                        </ul>
                    </li>
                    <a href="#" onclick="return notWorkingMenuSection()"><li><img class="icons" src="../Icons/info.png"> Info </li></a>
                    <a href="Ivan/logOut.php" onclick="return conformationFunction()"><li><img class="icons" src="../Icons/logout.png"> Log Out </li></a>
                </ul>
            </div>
        </div>
        <div id="mainSection">
            <div id="header">
                <h2 id="headerText">Holiday Accommodation System</h2>	<!--Main heading for website-->
                <div id="LocationTimeSection">
                    <div id="location">Add New Accommodation</div>	<!--Page heading-->
                    <div id="time"></div>	<!--Section used to hold clock-->
                </div>
            </div>
            <div id="content">
                 <form action="AddNewAccommodation.php" onsubmit="return confirmCheck()" method="Post">	<!--AddNewAccommodation.php adds fields to database-->
                    <div id="inputs">
                        <br><br><br>
						<div id="type">
							<label>Choose Accommodation Type</label><br><br>
							<?php include "AddAccommodationType.php";?><br><br>		<!--Adds list box of accommodation types-->
							<label>ID:</label>
							<input type="text" name="accId" id="accId" value="1" disabled />	<!--Adds a hidden field displaying matching Accommodation ID-->
							<br>
						</div>
						<div id="fields">
						<h2 id="fieldHeader"><u>Enter Details</u></h2><br><br><br>
							<p>Description:</p>
							<textarea rows="5" name="desc" id="desc" cols="40" placeholder="Add accommodation description..."></textarea><br><br><br>
							<label>No. of Adults:</label>
                            <input type="text" name="adults" id="adults" min="1" required pattern="[0-9]+" title="Must be a number"/><br><br><br>
							<label>No. of Children:</label>
                            <input type="text" name="children" id="children" min="0" required pattern="[0-9]+" title="Must be a number"/><br><br><br>
							<label>Condition: </label>
							<input type="text" name="condition" id="condition" required pattern="[a-zA-Z .,]+" title="Only letters allowed"/><br><br><br>
							<label>Special Features: </label>
							<input type="text" name="features" id="features" pattern="[a-zA-Z .,]+" title="Only letters allowed"/><br><br><br>
							<label>Location: </label>
							<input type="text" name="accLocation" id="accLocation" required pattern="[a-zA-Z0-9 .,]+"/><br><br><br>
							<label>Patio: </label>
							<input type="checkbox" name="patio" id="patio" /><br><br><br><br>
							<div id="buttons">
								<input type="reset" value="Clear" id="resetButton" />&emsp;&emsp;
								<input type="submit" value="Submit" id="submitButton" onclick="toggleLock(true)"/>	<!--When clicked, unlock accID field-->
							</div>
						</div>
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
		function getAccIdNum()	//function used to changed ID in the disabled accID field
		{
			var idNum = document.getElementById("listbox").value;	//Get ID
			document.getElementById("accId").value = idNum;			//Store the ID in accID field
		}
		function confirmCheck()	//Confirmation to user, also unlocks AccommodationType ID field so it can be stored in database
		{
			var response;
			
			response = confirm("Are you sure you want to add this new Accommodation?");
			
			if(response)	//User clicks submit
			{
				return true;
				toggleLock(true);	//Disables accId field so AddAccommodationType.php file can access value
			}
			else
			{
				return false;
				toggleLock(false);
			}
		}
		
		function toggleLock(condition)
		{
			if(true)
			{
				document.getElementById("accId").disabled = false;	//Disable accId field so AddAccommodationType.php file can access value
			}
			else
			{
				document.getElementById("accId").disabled = true;
			}
		}
	</script>
    <script>	<!--Blur background image to make screen easier to read-->
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