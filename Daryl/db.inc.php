<?php
$hostname = "holiday.candept.com";
$username = "AdminDB";
$password = "itcarlow";

$dbname = "Holiday";

$con = mysql_connect($hostname, $username, $password);

if (!$con){
    die('Could not connect: ' . mysql_error());
}

// database selection

if(! mysql_select_db($dbname, $con)){
    die ('Error in selecting the database');
}