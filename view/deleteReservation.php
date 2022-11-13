<?PHP
	include '../model/reservation.php';
    include_once '../controller/ReservationC.php';

	$ReservationC = new ReservationtC();

	
	if (isset($_POST["id"])){
		$ReservationC->supprimerReservation($_POST["id"]);
		header('Location:ReservationView.php');
	}

?>