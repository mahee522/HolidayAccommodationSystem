/**
 * Created by Ivan on 13/02/15.
 * Student #  - c00185055
 * Course: Software Development
 */

// function is used in client arrival and client departure screens
// populate input fields with information that is retrieved from database
function populate(){
    var sel = document.getElementById("listbox");
    var result;
    var newLine = "\n";
    result = sel.options[sel.selectedIndex].value;
    var personalDetails  = result.split('*');
    document.getElementById("clientID").value = personalDetails[0];
    document.getElementById("name").value = personalDetails[1];
    document.getElementById("lstName").value = personalDetails[2];
    document.getElementById("address").value = personalDetails[3];
    document.getElementById("address").value += newLine + personalDetails[4];
    document.getElementById("address").value += newLine + personalDetails[5];
    document.getElementById("address").value += newLine + personalDetails[6];
    document.getElementById("address").value += newLine + personalDetails[7];
    document.getElementById("phone").value = personalDetails[8];
    document.getElementById("bookingID").value = personalDetails[9];
    document.getElementById("accType").value = personalDetails[10];
    document.getElementById("bookingStatus").value = personalDetails[11];
    document.getElementById("accLocation").value = personalDetails[12];
    document.getElementById("duration").value = personalDetails[13];
    document.getElementById("owed").value = personalDetails[14];
    document.getElementById("specialFeatures").value = personalDetails[15];

    amountOwedChecker();    // function call

}
// function is used to check whether customer is owes money or not if yes -> highlight amount owed
function amountOwedChecker() {
    // if client is owed money -> change color to red / else set back to black
    if (document.getElementById("owed").value > 0){
        document.getElementById("owed").style.color = "darkred";
        return true;
    }
    else{ // if no change color back to black
        document.getElementById("owed").style.color = "black";
        return false;
    }

}

// function is used to check whether is value in hidden input fields is set or not
// if yes -> customer is owes money -> retrieve this information -> ask user does this client wants to pay now or not
function amountOwedRedirect(){
    if(document.getElementById("amountOwed").value > 0){
        if(confirm(document.getElementById("debtorName").value + " owes: " + document.getElementById("amountOwed").value + "\nPay now?!")){
            window.location.replace("../acceptPayment.php");
        }
    }

}


// function for LogOut
function conformationFunction() {
    if (confirm("Are you sure you want to log out from the system?!")) {
        return true;
    } else {
        return false;
    }
}


// if condition is true -> disable input field
// else  -> enable input field
function toggleLock(condition){
    if(condition){
        document.getElementById("bookingID").disabled = true;
        document.getElementById("name").disabled = true;
        document.getElementById("lstName").disabled = true;
        document.getElementById("owed").disabled = true;
    }
    else{
        document.getElementById("bookingID").disabled = false;
        document.getElementById("name").disabled = false;
        document.getElementById("lstName").disabled = false;
        document.getElementById("owed").disabled = false;
    }
}


function conformationBookingStatus(){
    toggleLock(false);
    if(document.getElementById('bookingID').value != ""){   // if bookingID is set -> ask user if he/she is sure
        if (!confirm("Are you sure you want to change Booking Status")) {
            toggleLock(true);       // function call
            return false;

        } else {
            return true;
        }
    }
    else{                                                   // if bookingID is not set
        alert("Client is not selected");                    // inform user that Client is not selected
        toggleLock(true);           // function call
        return false;
    }
}

// function used in order to prevent user to access to the unfinished sections
function notWorkingMenuSection(){
    alert("Sorry, this menu section is currently under construction! \n" +
    "Please come back later!");
    return false;
}


// function is used in Cancel Booking screen
// checks whether radio button is selected -> if yes -> ask user does he/she really wants to delete selected client
// else return false
function bookingDeletionFoo(){
    for (var i = 0; i < document.getElementsByName('radio[]').length; i ++) {
        if (document.getElementsByName('radio[]')[i].checked) {
            if(confirm('Are you sure you want to cancel the selected booking?')) {
                return true;
            }
            else {
                document.getElementsByName('radio[]')[i].checked = false; // change selected status to false
                return false;
            }
        }
    }
    alert("Booking is not selected");
    return false;

}



