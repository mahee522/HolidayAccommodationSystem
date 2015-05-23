<!--
	Name: acceptPayment.php
	Purpose: Page for user to input payments made by customers
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
    <link href="../css/acceptPayment.css" rel="stylesheet" type="text/css">
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
                    <li><img class="icons" src="../Icons/payment.png"><a href="acceptPayment.php">Accept Payment</li></a>
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
                            <a href="Ivan/AccommodationTypeReport.php"><li>Accommodation Type Report</li></a>
                            <a href="Ivan/RentalReport.php"><li>Rental Report</li></a>
                            <a href="Jason/AccommodationsReadyToday.php"><li>Accommodation To Be Ready Today Report</li></a>
                            <a href="Daryl/Query/AvailabilityQuery.php"><li>Availability Report</li></a>
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
                    <div id="location">Accept Customer Payment</div>	<!--Page heading-->
                    <div id="time"></div>	<!--Section used to hold clock-->
                </div>
            </div>
            <div id="content">
                 <form action="payment.php" onsubmit="return confirmCheck()" method="Post">
                    <div id="inputs">
					<br><br><br>
						<div id="fields">
							<div id="choose">
								<label id="chooseLabel"><u>Choose Client</u></label><br><br>
								<?php include "showClients.php";?><br><br>		<!--Adds list box of all client's from database-->
							</div><br>
							<h1>Details: </h1><br><br>
							<label>Name: </label>
							<input type="text" name="clientName" id="clientName" disabled /><br><br><br>
							<label>Address: </label>
							<input type="text" name="clientAddress" id="clientAddress" disabled /><br><br><br>
							<label>Date of Holiday: </label>
							<input type="text" name="holidayDate" id="holidayDate" disabled /><br><br><br>
							<label>Duration: </label>
							<input type="text" name="holidayDuration" id="holidayDuration" disabled /><br><br><br>
							<label>Total Cost: </label>
							<input type="text" name="holidayCost" id="holidayCost" disabled /><br><br><br>
							<input type="text" name="bookingid" id="bookingid" hidden />
						</div>
						<div id="payments">
							<h1><u>Payment</u></h1><br><br><br>
							<label>Amount: </label>
							<input type="text" name="amountPaid" id="amountPaid" />&emsp;&emsp;
							<label>Method: </label>
							<input type="text" name="paymentMethod" id="paymentMethod" />
						</div>
						<div id="buttons">
								<input type="reset" value="Clear" id="resetButton" />&emsp;&emsp;
								<input type="submit" value="Submit" id="submitButton"/>
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
		function confirmCheck()
		{
			var response;
			response = confirm('Are you sure you want to make this payment?');
			if(response)
			{	
				//Disable fields needed for database entry
				document.getElementById("holidayDate").disabled = false;
				document.getElementById("holidayCost").disabled = false;
				document.getElementById("holidayDuration").disabled = false;
				return true;	//Submit form
			}
			else
			{
				populate();
				return false;
			}
		}
		function populate()
		{	
			var sel = document.getElementById("listbox");	//Get all listbox values
			var result;
			result = sel.options[sel.selectedIndex].value;	//Get values of the selected index
			var accomDetails = result.split(';');	//Split values by ';'
			document.getElementById("clientName").value = accomDetails[0];
			document.getElementById("clientAddress").value = accomDetails[1];
			document.getElementById("holidayDate").value = accomDetails[2];
			document.getElementById("holidayDuration").value = accomDetails[3];
			document.getElementById("holidayCost").value = accomDetails[4];
			document.getElementById("bookingid").value = accomDetails[5];		//Store booking id in a hidden field in form
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