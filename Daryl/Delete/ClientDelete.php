<!-- Author: Daryl Roche C00184621 
	 Date of Last Edit: 19/03/2015
	 Purpose of Page: To Pass Information From The DeleteClient Page to The Database-->
<?php
include "../db.inc.php";
$column = "SELECT * FROM Client ";
$result = mysql_query($con,$column);

$ID = $_REQUEST['GetID'];
$sql = "UPDATE Client
		SET MarkForDeletion = '1'
		WHERE ClientID = $ID";

exec($sql);

$retval = mysql_query( $sql,$con );
if(! $retval )
{
  die('Could not delete client: ' . mysql_error());
}

mysql_close($con);

header("Location: DeleteClient.php"); 

exit;
?>