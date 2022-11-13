<?PHP
	include "../controller/postC.php";

	$postC = new PostC();

	
	if (isset($_POST["id"])){
		$postC->supprimerPost($_POST["id"]);
		header('Location:PostView.php');
	}

?>