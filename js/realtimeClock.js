/**
 * Created by Ivan on 13/02/15.
 * Student #  - c00185055
 * Course: Software Development
 *
 * Prints the time
 */
var today = new Date();
function showTime() {
    // Get element by ID and add value of the date object
    document.getElementById("time").innerHTML =  today.getDate()+"/" +  addZero(today.getMonth()+1) + "/" + today.getFullYear() + "   |   " +
    addZero(today.getHours()) + ":" +
    addZero(today.getMinutes()) + ":" +
    addZero(today.getSeconds()) + "";
    today = new Date(); // update "today" object
}
function addZero(time) {
    return ((time < 10) ? '0' + time : time); // if value is less then 10, add 0 as a first digit
}

function startTime(){
    setInterval(showTime, 500); // call "showTime" function every 0.5 sec
}

// call function (startTime) when page is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    startTime();
}, false);