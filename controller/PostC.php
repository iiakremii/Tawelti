<?php
 include "../config.php";
 require_once '../Model/Post.php';

 
 
 
 class PostC
  {
		
                 function ajouterpost($post)
                 {
                    $sql="INSERT INTO post ( titre , contenu ,image) 
                    VALUES ( :titre , :contenu , :image  )";
                    $db = config::getConnexion();
                    try
                    {
                       $query = $db->prepare($sql);
         
                       $query->execute([
                      'titre' => $post->gettitre(),
                       'contenu' => $post->getcontenu(),
                       'image' => $post->getimage(),
                      ]);		
		

                    }
                    catch (Exception $e)
                    {
                       echo 'Erreur: '.$e->getMessage();
                    }			
                  }

                          /* *********************** */

                          public function afficherpost()
                          {
			
                           
                            try
                              { $pdo=config::getConnexion();
                                $query= $pdo ->prepare(
                                  'SELECT * FROM post'
                              );
                              $query->execute();
                              $result = $query->fetchAll();

                                return $result;
                              }
                              catch (PDOException $e)
                              {
                                die('Erreur: '.$e->getMessage());
                              }
                           } 
                      


                           public function afficherpostid($user)
                           {
       
                            
                             try
                               { $pdo=config::getConnexion();
                                 $query= $pdo ->prepare(
                                   'SELECT id FROM post WHERE user = :user'
                               );
                               $query->execute(['user'=> $user]);
 
                                 return $query;
                               }
                               catch (PDOException $e)
                               {
                                 die('Erreur: '.$e->getMessage());
                               }
                            } 



                      /* ****************************** */
                      
                      function supprimerPost($id)
                      {
                          try
                           {
                               $pdo = config::getConnexion();
                                $query = $pdo->prepare(
                                'DELETE FROM post WHERE id = :id' );
                                $query->execute([
                                'id' => $id ]);
                            }
                              catch (Exception $e)
                           {
                               die('Erreur: '.$e->getMessage());
                           }
                       }
                       
                       
          
                       /* **************************** */

                       
                       function modifierpost($post, $id){
			
                        echo 'test modif C' ;
                          $db = config::getConnexion();
                          $query = $db->prepare(
                            'UPDATE post SET                     
                              nom = :nom, 
                              titre = :titre, 
                                          contenu = :contenu, 
                                          image= :image  	
                            WHERE id = :id '
                          );
                          $query->bindValue('nom' , $post->getnom()) ;
                          $query->bindValue('titre' , $post->gettitre());
                          $query->bindValue('contenu' , $post->getcontenu());
                          $query->bindValue('image' , $post->getimage());
                          $query->bindValue('id' , $id);
                          try {
                          $query->execute();
                          echo "test" ;
                          echo $query->rowCount() . " records UPDATED successfully <br>";
                        } catch (PDOException $e) {
                          echo $e->getMessage();
                        }
                      }

                        function recupererpost($id){
                          $sql="SELECT * from  post where id=$id";
                          $db = config::getConnexion();
                          try{
                              $query=$db->prepare($sql);
                              $query->execute();
                  
                              $post=$query->fetch();
                              return $post;
                          }
                          catch (Exception $e){
                              die('Erreur: '.$e->getMessage());
                          }
                      }
                    




                     /*  **************************** */
                      function getUserbyname($username) {
                        try {
                            $pdo = config::getConnexion();
                            $query = $pdo->prepare(
                                'SELECT * FROM user WHERE username = :username'
                            );
                            $query->execute([
                                'username' => $username
                            ]);
                            return $query->fetch();
                        } catch (Exception $e) {
                            $e->getMessage();
                        }
                    }

                    function rechercher ($mot){
		
                      $q = array('motclef' => $mot. '%' );
                      $sqlQuery = "SELECT * FROM post WHERE titre like :motclef";
                      $db=config::getConnexion();
                      $liste=$db->prepare($sqlQuery);
                      $liste->execute($q);
                      return $liste;	
                    }
  }
?>