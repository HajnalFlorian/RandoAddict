
<?php


include_once("Constantes.php"); 
include_once("DbConnect.php"); 
include_once("Client.php"); 
require_once('DbConnect.php');

$method = $_SERVER['REQUEST_METHOD'];


if($method == "POST" && $_POST['METHOD'] == "create")
{
	$ncli = $_POST['NCLI'];
	$nom = $_POST['NOM'];
	$prenom = $_POST['PRENOM'];
	$age = $_POST['AGE'];
	$numero = $_POST['NUMERO'];

	$sql = "INSERT INTO marcheur VALUES ('".$ncli."','".$nom."','".$prenom."','".$age."','".$numero."')";


	$idprogram = $_POST['ID_Program'];

	$sql2 = "INSERT INTO reservation VALUES ('" . $ncli . "','" . $idprogram."')";

	if($conn_post->query($sql) === true)
	{

	}
	else
	{
		var_dump("error" . mysqli_error($conn));
	}

	if($conn_post->query($sql2) === true)
	{

	}
	else
	{
		var_dump("error" . mysqli_error($conn));
	}

    $texte = file_get_contents('journal.txt');

    $horaire = date('Y-m-d H:i:s');

    $texte .= "\n" . $horaire . " : insertion marcheur " . $ncli;

    $texte .= "\n" . $horaire . " : insertion reservation " . $idprogram;
            
    file_put_contents('journal.txt', $texte);

	$conn_post->close();
}

?>