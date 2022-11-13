<?php
 include "../config.php";
 require_once '../Model/reservation.php';

 
 
 
 class ReservationC
  {
		
                 function ajouterReservation($Reservation)
                 {
                    $sql="INSERT INTO reservation ( date ,nb_place,nom_resto,nom,prenom,mail) 
                    VALUES ( :id_reser , :date , :nb_place , :nom_resto , :nom, :prenom,:mail  )";
                    $db = config::getConnexion();
                    try
                    {
                       $query = $db->prepare($sql);
         
                       $query->execute([
                       
                       'date' => $Reservation->getdate(),
                       'nb_place' => $Reservation->getnbplace(),
                       'nom_resto' => $Reservation->getnomresto(),
                       'nom' => $Reservation->getnom(),
                       'prenom' => $Reservation->getprenom(),
                       'mail' => $Reservation->getmail(),



                      ]);		
		

                    }
                    catch (Exception $e)
                    {
                       echo 'Erreur: '.$e->getMessage();
                    }			
                  }

                          /* *********************** */

                          


                           public function afficherReservation($id)
                           {
                             try
                               { $pdo=config::getConnexion();
                                 $query= $pdo ->prepare(
                                   'SELECT id FROM reservation WHERE id_reser = :id'
                               );
                               $query->execute(['id_reser'=> $id]);
 
                                 return $query;
                               }
                               catch (PDOException $e)
                               {
                                 die('Erreur: '.$e->getMessage());
                               }
                            } 



                      /* ****************************** */
                      
                      function supprimerReservation($id)
                      {
                          try
                           {
                               $pdo = config::getConnexion();
                                $query = $pdo->prepare(
                                'DELETE FROM reservation WHERE id_reser = :id' );
                                $query->execute([
                                'id_reser' => $id ]);
                            }
                              catch (Exception $e)
                           {
                               die('Erreur: '.$e->getMessage());
                           }
                       }
                       
                       
          
                       /* **************************** */

                       
                       function modifierReservation($reservation, $id){
			
                        echo 'test modif C' ;
                          $db = config::getConnexion();
                          $query = $db->prepare(
                            'UPDATE reservation SET   
                              id_reser = :id_reser ,
                              date  = :date , 
                              nb_place = :nb_place , 
                              nom_resto = :nom_resto , 
                              nom  = :nom,
                              prenom  = :prenom,
                              mail = :mail 
                            WHERE id_reser = :id '
                          );
                          $query->bindValue( 'id_reser' , $Reservation->getid()) ;
                          $query->bindValue('date',$Reservation->getdate() );
                          $query->bindValue( 'nb_place', $Reservation->getnbplace());
                          $query->bindValue('nom_resto' ,  $Reservation->getnomresto());
                          $query->bindValue('nom' ,$Reservation->getnom());
                          $query->bindValue('prenom' , $Reservation->getprenom());
                          $query->bindValue('mail',$Reservation->getmail());
                         
                          try {
                          $query->execute();
                          echo "test" ;
                          echo $query->rowCount() . " records UPDATED successfully <br>";
                        } catch (PDOException $e) {
                          echo $e->getMessage();
                        }
                      }

                        function recupererReservation($id){
                          $sql="SELECT * from  reservation where id_reser=$id";
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
                      $sqlQuery = "SELECT * FROM reservation WHERE nom_resto like :motclef";
                      $db=config::getConnexion();
                      $liste=$db->prepare($sqlQuery);
                      $liste->execute($q);
                      return $liste;	
                    }
  }
?>