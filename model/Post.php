<?php
class Post
{
    private  $id=null;
    private  $titre=null ;
    private  $contenu =null;
    private  $image=null;
    private  $user=null;
    private  $date=null;


    public function __construct(string $titre,string $contenu,string $image)
    {
        
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->image=$image;


    }
    function getidPost():int{
		return $this->id;
	}
    function getcontenu():string{
		return $this->contenu;
	}
	function gettitre():string{
		return $this->titre;
	}
	function getdate():string{
		return $this->date;
	}
	function getimage():string{
		return $this->image;
	}






	function settitre($titre):void{
		$this->titre=$titre;
	}
	function setcontenu($contenu):void{
		$this->contenu=$contenu;
	}
	function setimage($image):void{
		$this->image=$image;
	}
	function setuser($user):void{
		$this->user=$user;
	}
	


}
?>