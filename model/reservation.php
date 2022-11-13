<?php
class Reservation
{
    private  $id_reser=null;
    private  $date=null ;
    private  $nb_place =null;
    private  $nom_resto=null;
    private  $nom=null;
    private  $prenom=null;
    private  $mail=null;
    
  

    public function __construct(int $id_reser,DateTime $date,int $nb_place, string $nom_resto,string $nom,string $prenom,string $mail)
    {
        
        $this->id_reser=$is_reser;
        $this->date=$date;
        $this->nb_place=$nb_place;
         
        $this->nom_reto=$nom_resto;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mail=$mail;

    }
    function getid():int{
		return $this->id_reser;
	}
    function getdate():DateTime{
		return $this->date;
	}
	function getnbplace():int{
		return $this->nb_place;
	}
	function getnomresto():string{
		return $this->nom_reto;
	}
	function getnom():string{
		return $this->nom;
	}
    function getprenom():string{
		return $this->prenom;
	}
	function getmail():string{
		return $this->mail;
	}






	function setid($id_reser):void{
		$this->id_reser=$id_reser;
	}
	function setdate($date):void{
		$this->date=$date;
	}
	function setnbplace($nb_place):void{
		$this->nb_place=$nb_place;
	}
	function setnomresto($nom_resto):void{
		$this->nom_resto=$nom_resto;
	}
	function setnom($nom):void{
		$this->nom=$nom;
	}
	function setprenom($prenom):void{
		$this->prenom=$prenom;
	}
	function setmail($mail):void{
		$this->mail=$mail;
	}
	


}
?>