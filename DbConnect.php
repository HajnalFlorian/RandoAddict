
<?php


include_once("Constantes.php"); 
include_once("DbOperations.php"); 
include_once("Client.php"); 

try
{

	$conn = mysqli_connect($url, $user, $mdp, $db);
	$conn_post = new mysqli($url, $user, $mdp, $db);
}
catch(Exception $e)
{
	var_dump($e->getMessage()); 
}


?>

