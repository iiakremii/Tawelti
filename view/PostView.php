<?php

session_start();
include "../controller/PostC.php";


$PostC = new PostC();

$listePost=$PostC->afficherpost();

?>

<!DOCTYPE html>
<html>
<body>

	<main class="main" role="main">
		<div class="wrap clearfix">
	
			<div class="row">
				<header class="s-title">
					<h1>Post</h1>
				</header>

				</section>

				<section class="content three-fourth">
					  
				
				<?php
           			foreach($listePost as $Post){
        		?>
				<article class="post">
						<div class="entry-meta">
							
							<div class="avatar">
								 <span> <?php echo $Post ["titre"] ?> </span> 
							</div>
						</div>
						<div class="container">
							<div class="entry-featured"><a href="blog_single.php"><img src="../image/<?php echo $Post['image'];?>" Style="height:250px; width:300px;"  /></a></div>
							<div class="entry-content">
								<h2><a href="blog_single.php"><?php echo $Post['titre'];?></a></h2>
								<p><?php echo $Post['contenu'];?> </p>
							</div>
							<div class="more"> <?php echo "<a  href=PostUpdate.php?id=" .$Post['id'].">";   ?>  modifier</a></div>

							<form method="POST" action="DeletePost.php">
                                    <input type="submit" name="supprimer" value="supprimer">
	                                <input type="hidden" value="<?PHP echo $Post['id']; ?>" name="id">
									</form>
							<div class="actions">
								
								
							</div>
						</div>
			
					</article>
                    <?php 
					}
						
					?>
				</section>

			

			</div>
		</div>
	</main>

</body>

</html>


