//Author: Daryl Roche C00184621
//Date of Last Edit: 19/03/2015
//Purpose: JavaScript for checking the AddNewClient Page
function checkAddForm(){
	var r = confirm('Are You Sure You Wish To Add Client') ;
	
	if(r == true){
		document.getElementById("AddForm").submit();
		alert('Client Added');
	}
	else{
		document.getElementById("AddForm").reset();
		alert('Client Not Added');
	}
}