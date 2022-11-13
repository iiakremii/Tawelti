
<?php
session_start();

include '../model/Post.php';
include '../controller/PostC.php';
$error = "";

$Post1 = null;

$PostC = new PostC();





if(
    isset($_POST["titre"])&&
    isset($_POST["contenu"])&&
    isset($_POST["image"])
    )
    {
        if(
            !empty($_POST["titre"])&&
            isset($_POST["contenu"])&&
            !empty($_POST["image"])
            ){
        $Post1 = new Post(
           
            $_POST["titre"],
            $_POST["contenu"], 
            $_POST["image"],
        );
        $PostC->ajouterPost($Post1);
        header('Location:PostView.php');
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
					<h1>Add a new pOST</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_blog container">
						<form  name="myForm" method="POST" action="" >
 
							<section>
								<h2>Basics</h2>
							
								<div class="f-row">
									<div class="third"><input type="text" placeholder="titre" id="titre" name="titre" /></div>
								</div>
							
							</section>
							
							<section>
								<h2>contenu</h2>
								<div class="f-row">
									<div class="full"><textarea placeholder="contenu" id="contenu" name="contenu"></textarea></div>
								</div>
							</section>	
					
							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" id="image" name="image" />
								</div>
							</section>	
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitblog" value="Publish this post" />
							</div>
						</form>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->

						

</body>

</html>

