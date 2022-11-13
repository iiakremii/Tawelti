<?php
session_start();
include '../controller/postC.php';
include_once '../model/post.php';

$error = "";
$PostC = new PostC();


if(
    isset($_POST["titre"])&&
    isset($_POST["contenu"])&&
    isset($_POST["image"])

    )
            {
        $blog1 = new Post(
            $_POST["contenu"],
			$_POST["titre"],
            $_POST["image"],

        );
        $PostC->modifierPost($blog1, $_GET['id']);   
             header('location: PostView.php ');
	}

    else
        $error= "missing info";
    

?>


<!DOCTYPE html>
<html>


<body>

	<main class="main" role="main">
		
		<div class="wrap clearfix">
		
			<div class="row">
				<header class="s-title">
					<h1>Update post </h1>
				</header>
					
				<section class="content full-width">

<div class="submit_post container">
				<?php

	$blog1 = $PostC->recupererpost($_GET['id']);
	
	?>
	               
         
						<form name="myForm"  method="POST" >

                            <section>
						
								
								<h2>titre</h2>
								<div class="f-row ">
								<div class="full"><input type="text" placeholder=" titre" id="titre" name="titre" value="<?php echo $blog1['titre']; ?>" /></div>
								</div>
								
							</section>
							
							<section>
								<h2 for="contenu">Description</h2>
								<div class="f-row full">
								<textarea type="text" name="contenu" id="contenu"  ><?php echo $blog1['contenu']; ?></textarea>
								</div>
							</section>	
							
							<section>
								<h2 for="image">Photo</h2>
								<div class="f-row full">
								<img src="../image/<?php echo $blog1['image'];?>" Style=" display: block; margin-left: auto; margin-right: auto; width: 30%;" />
  <br>
									 <input type="file" id="image" name="image" value="<?php echo $blog1['image']; ?>"/>

								</div>
							</section>	
			
            
						</from>
		

						<div class="f-row full">
						<input type="submit" class="button" id="submitpost" value="Publish post " />
							</div>
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