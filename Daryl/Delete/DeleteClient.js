//Author: Daryl Roche C00184621
//Date of Last Edit: 19/03/2015
//Purpose: To Fill in the Client Information and check the delete client page
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
function checkDel() {
	var a = confirm('Are You Sure') ;
	
	if(a == true && document.getElementById("owed").value == 0){
		document.getElementById("DelForm").submit();
		alert('Client Deleted');
	}
	else if(document.getElementById("owed").value != 0){
		document.getElementById("DelForm").reset();
		alert('Client Not Deleted: Money Owed');
	}
	else{
		document.getElementById("DelForm").reset();
		alert('Client Not Deleted');
	}
}