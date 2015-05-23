//Author: Daryl Roche C00184621
//Date of Last Edit: 19/03/2015
//Purpose: JavaScript for checking the MakeBooking Page, for filling in the client values,for filling in the accommodation values and fill in the total cost of the booking
function checkBook(){
	var r = confirm('Are You Sure') ;
	
	getTotal();
	
	if(r == true){
		document.getElementById("MBookingForm").submit();
		alert('Booking Added');
	}
	else{
		document.getElementById("MBookingForm").reset();
		alert('Booking Not Added');
	}
}

function fillIn(){
	var list = document.getElementById("acclist");
    var result;
    result = list.options[list.selectedIndex].value;
    var accDetails  = result.split('*');
	
    document.getElementById("acId").value = accDetails[0];
	document.getElementById("cost").value = accDetails[1];
	document.getElementById("noOfChildren").value = accDetails[2];
	document.getElementById("noOfAdults").value = accDetails[3];
	
}

function populateClient(){
    var box = document.getElementById("list");
    var result;
    result = box.options[box.selectedIndex].value;
    var clientDetails  = result.split('*');
	
    document.getElementById("ClientId").value = clientDetails[0];
    document.getElementById("address1").value = clientDetails[3];
    document.getElementById("address2").value = clientDetails[4];
    document.getElementById("address3").value = clientDetails[5];
    document.getElementById("Country").value = clientDetails[6];
	document.getElementById("phone").value = clientDetails[7];
	document.getElementById("Email").value = clientDetails[8];
	document.getElementById("Mobile").value = clientDetails[9];
}

function getTotal(){
	var standard = document.getElementById("cost").value;
	var duration = document.getElementById("duration").value 
	var ans = standard*duration;
	document.getElementById("TCost").value = ans;
}