<?php
session_start();

include '../model/reservation.php';
include_once '../controller/ReservationC.php';
$error = "";

$Reservation1 = null;

$ReservationC = new ReservationC();





if(
    
    isset($_POST["nb_place"])&&
    isset($_POST["date"])&&
    isset($_POST["nom_resto"])&&
    isset($_POST["nom"])&&
    isset($_POST["prenom"])&&
    isset($_POST["mail"])




    )
    {
        if(
           
            !empty($_POST["nb_place"])&&
            !empty($_POST["date"])&&
            !empty($_POST["nom_resto"])&&
            !empty($_POST["nom"])&&
            !empty($_POST["prenom"])&&
            !empty($_POST["mail"])
            ){
        $Reservation1 = new Reservation(
           
            
            $_POST["nb_place"], 
            $_POST["date"],
            $_POST["nom_resto"],
            $_POST["nom"], 
            $_POST["prenom"],
            $_POST["mail"],
        );
        $ReservationtC->ajouterReservation($Reservation);
        header('Location:ReservationView.php');
    }
    else{
        $error= "missing info";
    }
}
?>

<!DOCTYPE html>
<html>

	
<body>		
	<main class="main" role="main">
		<div class="wrap clearfix">
			
		
			<div class="row">
				<header class="s-title">
					<h1>Add a new reservation</h1>
				</header>
					
				<form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nb_place">Nombre de place:
                    </label>
                </td>
                <td><input type="text" name="nb_place" id="nb_place" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">Nom client:
                    </label>
                </td>
                <td>
                    <input type="text" name="nom" id="nom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prenom client:
                    </label>
                </td>
                <td>
                    <input type="text" name="prenom" id="prenom">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail">Mail:
                    </label>
                </td>
                <td>
                    <input type="text" name="mail" id="mail">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date:
                    </label>
                </td>
                <td>
                    <input type="date" name="date" id="date">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->

						

</body>

</html>
