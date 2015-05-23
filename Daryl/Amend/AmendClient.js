//Author: Daryl Roche C00184621
//Date of Last Edit: 19/03/2015
//Purpose: JavaScript for checking the AmendClient Page, Changing Editing of fields from disabled to enabled and for filling in the client values
function checkAmend(){
	var c = confirm('Are You Sure You Wish to Make Changes');
	
	if(c == true){
		document.getElementById("amendForm").submit();
		alert('Client Amended');
	}
	else{
		document.getElementById("amendForm").reset();
		alert('Client Not Amended');
	}
}

function change(){
if(document.getElementById("name").disabled == true){
		document.getElementById("name").disabled = false;
		document.getElementById("lastName").disabled = false;
		document.getElementById("address1").disabled = false;
		document.getElementById("address2").disabled = false;
		document.getElementById("address3").disabled = false;
		document.getElementById("County").disabled = false;
		document.getElementById("Country").disabled = false;
		document.getElementById("phone").disabled = false;
		document.getElementById("Email").disabled = false;
		document.getElementById("Mobile").disabled = false;
		document.getElementById("owed").disabled = false;
	}
	else{
		document.getElementById("name").disabled = true;
		document.getElementById("lastName").disabled = true;
		document.getElementById("address1").disabled = true;
		document.getElementById("address2").disabled = true;
		document.getElementById("address3").disabled = true;
		document.getElementById("County").disabled = true;
		document.getElementById("Country").disabled = true;
		document.getElementById("phone").disabled = true;
		document.getElementById("Email").disabled = true;
		document.getElementById("Mobile").disabled = true;
		document.getElementById("owed").disabled = true;
	}
}

function populateClient(){
    var box = document.getElementById("list");
    var result;
    result = box.options[box.selectedIndex].value;
    var clientDetails  = result.split('*');
	document.getElementById("GetID").value = clientDetails[0];
    document.getElementById("ClientId").value = clientDetails[0];
	document.getElementById("name").value = clientDetails[1];
	document.getElementById("lastName").value = clientDetails[2];
    document.getElementById("address1").value = clientDetails[3];
    document.getElementById("address2").value = clientDetails[4];
    document.getElementById("address3").value = clientDetails[5];
	document.getElementById("County").value = clientDetails[6];
    document.getElementById("Country").value = clientDetails[7];
	document.getElementById("phone").value = clientDetails[8];
	document.getElementById("Email").value = clientDetails[9];
	document.getElementById("Mobile").value = clientDetails[10];
	document.getElementById("owed").value = clientDetails[11];
	
}